<!doctype html>
<html class="no-js" lang="en">
    <head>
        <?= $this->element('Layout/head_tag') ?>

    </head>
    <body>
        <?= $this->element('Layout/main_header') ?>



        <div class="shop_area" style="padding-top: 10px;">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 col-md-12">

                        <!--shop banner area start-->
                        <div class="shop_banner_area mb-30">
                            <div class="row">
                                <div class="col-12">
                                    <div class="shop_banner_thumb">
                                        <?=$this->Html->image('banners/banner-02.jpg')?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--shop banner area end-->
                        <!--shop toolbar start-->
                        <div class="shop_toolbar_wrapper">
                            <div class="shop_toolbar_btn">
                                <button data-role="grid_4" type="button" class=" active btn-grid-4" data-toggle="tooltip" title="4"></button>
                                <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
                            </div>
                            
                            <div class="page_amount">
                                <p></p>
                            </div>
                        </div>
                        <!--shop toolbar end-->

                        <?= $this->fetch('content') ?>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <!--sidebar widget start-->
                        <aside class="sidebar_widget">
                            
                           
                            <div class="widget_list">
                                <h3>สินค้าแนะนำ</h3>
                                <div class="recent_product_container" id="box-top-product">
                                    
                                </div>
                            </div>
                           
                        </aside>
                        <!--sidebar widget end-->
                    </div>
                </div>
            </div>
        </div>
        <!--shop  area end-->

        
        <?= $this->element('Layout/footer') ?>
    </body>
    <?= $this->Html->script('product_top_view.js') ?>
    <!-- Plugins JS -->
    <?= $this->Html->script("/css/assets/js/plugins.js") ?>

    <!-- Main JS -->
    <?= $this->Html->script("/css/assets/js/main.js") ?>
    
    
</html>