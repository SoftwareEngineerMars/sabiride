<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Extensions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('user_name') == NULL && $this->session->userdata('password') == NULL) {
            redirect(base_url() . "login");
        }
        $this->load->model('Extensions_model', 'ext');
        $this->load->model('Appsettings_model', 'appset');
        $this->load->model('Dashboard_model', 'dasb');
    }

    public function index()
    {
        $getview['view'] = 'extensions';
        $getview['menu'] = $this->appset->getMenuAdmin();
        $data['product'] = $this->ext->get_data_product()['data'];
        $getview['countnotification'] = $this->dasb->countnotif();
        $this->load->view('includes/header', $getview);
        $this->load->view('extensions/index', $data);
        $this->load->view('includes/footer', $getview);
    }

    public function detail($id)
    {
        $install = $this->ext->get_detail_product($id)['response'];
        if ($install['code'] == 200) {
            $getview['view'] = 'extensions';
            $getview['menu'] = $this->appset->getMenuAdmin();
            $data['product'] = $this->ext->get_detail_product($id)['response']['data'];
            $data['lognew'] = $this->ext->get_detail_product($id)['response']['lognew'];
            $data['logs'] = $this->ext->get_detail_product($id)['response']['loglast'];

            $data['version'] = $this->ext->get_detail_product($id)['version'];
            $data['itemid'] = $this->ext->get_detail_product($id)['itemid'];
            $getview['countnotification'] = $this->dasb->countnotif();
            $this->load->view('includes/header', $getview);
            $this->load->view('extensions/detailextension', $data);
            $this->load->view('includes/footer', $getview);
        } else {
            $this->session->set_flashdata('danger', 'extensions not available!');
            redirect(base_url() . 'extensions/');
        }
    }

    public function install()
    {
        $pcode = $this->input->post('pcode');
        $username = $this->input->post('username');
        $itemid = $this->input->post('itemid');
        $version = $this->input->post('version');
        $install = $this->ext->get_install($pcode, $username, $itemid, $version);

        if (demo == TRUE) {
            $this->session->set_flashdata('demo', 'NOT ALLOWED FOR DEMO');
            redirect(base_url() . 'extensions/detail/' . $itemid);
        } else {
            if ($install['code'] == 200) {
                foreach ($install['data'] as $dta) {
                    foreach ($dta['files'] as $files) {
                        $file = $files['file'];
                        $filename = $files['name_file'];
                        $path = $files['path'] . $filename;
                        if ($files['extensions'] == 'sql') {
                            $temp_line = '';
                            foreach ($file as $line) {
                                if (substr($line, 0, 2) == '--' || $line == '' || substr($line, 0, 1) == '#') {
                                    continue;
                                }
                                $temp_line .= $line;
                                if (substr(trim($line), -1, 1) == ';') {
                                    $this->db->query($temp_line);
                                    $temp_line = '';
                                }
                                $update = [
                                    'set_version' => $dta['version']
                                ];
                                $insert = [
                                    'set_version' => $dta['version'],
                                    'product_id' => $itemid,
                                    'set_name' => $files['name']
                                ];
                                $this->ext->update_version_ext($update, $insert, $itemid);
                            }
                        } else {
                            file_put_contents($path, base64_decode($file));
                            $update = [
                                'set_version' => $dta['version']
                            ];
                            $insert = [
                                'set_version' => $dta['version'],
                                'product_id' => $itemid,
                                'set_name' => $files['name']
                            ];
                            $this->ext->update_version_ext($update, $insert, $itemid);
                        }
                    };
                };
                if ($update) {
                    $this->session->set_flashdata('success', 'APP Has Been Updated');
                    redirect(base_url() . 'extensions/detail/' . $itemid);
                } else {
                    $this->session->set_flashdata('danger', 'Error, please try again!');
                    redirect(base_url() . 'extensions/detail/' . $itemid);
                }
            } else {
                $this->session->set_flashdata('danger', 'Error, please check your purchase code!');
                redirect(base_url() . 'extensions/detail/' . $itemid);
            }
        }
    }
}
