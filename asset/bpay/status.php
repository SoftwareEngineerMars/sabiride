<?php
header('Content-type: Application/json');
    // Generate nonce string

$hostname = 'localhost'; // specify host domain or IP, i.e. 'localhost' or '127.0.0.1' or server IP 'xxx.xxxx.xxx.xxx'
$database = 'mchajcby_codevety_work'; // specify database name
$db_user = 'mchajcby_codevety_work'; // specify username
$db_pass = 'mchajcby_codevety_work'; // specify password
$connection = mysqli_connect("$hostname" , "$db_user" , "$db_pass", "$database");
if(!$connection){
    die("Database connection Error");
}
$query="SELECT * FROM bpay_settings WHERE `id`='1'";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);

$bpay_api=$row['api_key'];
$bpay_secret=$row['secret_key'];
$bpay_enabled=$row['enable'];
$fcm=$row['fcm_key'];

if(isset($_POST['enable'])){

    $result=array(
       "api"=>$bpay_api,
       "secret"=>$bpay_secret,
       "status"=>$bpay_enabled,
       "fcm"=>$fcm
    );

    echo json_encode($result);
    

}


    if(isset($_POST['status'])){


        $prepay_id=$_POST['prepay_id'];
        

    if($prepay_id){

    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $nonce = '';

    for($i=1; $i <= 32; $i++)

    {

        $pos = mt_rand(0, strlen($chars) - 1);

        $char = $chars[$pos];

        $nonce .= $char;

    }

    $ch = curl_init();

    $timestamp = round(microtime(true) * 1000);

    // Request body

     $request = array(

       "env" => array(

             "terminalType" => "APP" 

          ), 

       "merchantTradeNo" => mt_rand(982538,9825382937292), 

       "orderAmount" => 0.01, 

       "currency" => "BUSD", 

       "goods" => array(

                "goodsType" => "01", 

                "goodsCategory" => "D000", 

                "referenceGoodsId" => "7876763A3B", 

                "goodsName" => "Ice Cream", 

                "goodsDetail" => "Greentea ice cream cone" 

             ) 

    ); 



    $status=array(

            "merchantTradeNo"=> null,

            //189326573440327680

            //"prepayId"=> 189326573440327680

            "prepayId"=> $prepay_id

        );



    $paymentEndpoint="https://bpay.binanceapi.com/binancepay/openapi/v2/order";

    $statusEndpoint="https://bpay.binanceapi.com/binancepay/openapi/v2/order/query";



    if($bpay_api!=""){
        $api_key=$bpay_api;
    }else{
        $api_key="q7tbgg7di0nx7gkf9xmwvyttcuwawskkwsngm3yj2inefbp3osup4qm0xtfety7y";
    }
    if($bpay_secret!=""){
        $secret_key=$bpay_secret;
    }else{
        $secret_key="cgobrhnbnf11mjgd2nw8rxyeu7i5ropmpjm85uuncs7lnqf6aq76rzvycw8j3l4s";
    }



    // $binance_pay_key = "v2shxwqydx6gvrjkqq5t6ygyrwkmn6ldev6nfktgifvmsbopcca36voxfpucs3kj";

    // $binance_pay_secret = "rvmrvy4zdfi7uf7t19hzhpme2ern0adjtn7knlod5gobb7mmq3gvky9vm9wdnpxo";





 

    $json_request = json_encode($status);

    $payload = $timestamp."\n".$nonce."\n".$json_request."\n";

    $binance_pay_key = $api_key;

    $binance_pay_secret = $secret_key;

    $signature = strtoupper(hash_hmac('SHA512',$payload,$binance_pay_secret));

    $headers = array();

    $headers[] = "Content-Type: application/json";

    $headers[] = "BinancePay-Timestamp: $timestamp";

    $headers[] = "BinancePay-Nonce: $nonce";

    $headers[] = "BinancePay-Certificate-SN: $binance_pay_key";

    $headers[] = "BinancePay-Signature: $signature";



    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($ch, CURLOPT_URL,$statusEndpoint );

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_request);



    $result = curl_exec($ch);

    if (curl_errno($ch)) { echo 'Error:' . curl_error($ch); }

    curl_close ($ch);


echo $result;
    }
}
    

    //Redirect user to the payment page



?>