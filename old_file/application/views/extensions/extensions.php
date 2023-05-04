<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-thumb-view" class="data-thumb-view-header">

                <!-- news category Table starts -->
                <div class="table-responsive">
                    <table class="table data-thumb-view">
                        <thead>
                            <tr>

                                <th>Image</th>
                                <th>name</th>
                                <th>item name</th>
                                <th>Sales</th>
                                <th>Rating</th>
                                <th>Rating Count</th>
                                <th>Developer</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($product as $pro) { ?>
                                <tr>
                                    <td class="product-img"><img src="<?= $pro['item_image']; ?>"></td>
                                    <td class="product-name"><?= $pro['name']; ?></td>
                                    <td class="product-name"><?= $pro['item_name']; ?></td>
                                    <td class="product-name"><?= $pro['sales']; ?></td>
                                    <td class="product-name"><?= $pro['rating']; ?></td>
                                    <td class="product-name"><?= $pro['rating_count']; ?></td>
                                    <td class="product-name"><?= $pro['author']; ?></td>
                                    <td>
                                        <a class="btn btn-success mb-1 text-white" href="#">Show</a>
                                    </td>
                                <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
                <!-- news category data Table ends -->

                <!-- add new sidebar starts -->

                <!-- add new sidebar ends -->
            </section>
            <!-- Data list view end -->
        </div>
    </div>
</div>
<!-- END: Content-->