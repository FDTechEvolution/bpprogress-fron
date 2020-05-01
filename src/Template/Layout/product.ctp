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
                                        <img src="css/assets/img/bg/banner16.jpg" alt="">
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
                                <div class="recent_product_container">
                                    <article class="recent_product_list">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="img/products/product-01.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img src="img/products/product-01.jpg" alt=""></a>
                                            </div>
                                            <div class="product_content">
                                                <h4><a href="product-details.html">Aliquam lobortis pellentesque</a></h4>
                                                <div class="product_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="old_price">$70.00</span>
                                                    <span class="current_price">$65.00</span>
                                                </div>
                                            </div>
                                        </figure>
                                    </article>
                                    <article class="recent_product_list">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="img/products/product-01.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img src="img/products/product-01.jpg" alt=""></a>
                                            </div>
                                            <div class="product_content">
                                                <h4><a href="product-details.html">Convallis quam sit vitae sodales</a></h4>
                                                <div class="product_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="old_price">$70.00</span>
                                                    <span class="current_price">$65.00</span>
                                                </div>
                                            </div>
                                        </figure>
                                    </article>
                                    <article class="recent_product_list">
                                        <figure>
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.html"><img src="img/products/product-01.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.html"><img src="img/products/product-01.jpg" alt=""></a>
                                            </div>
                                            <div class="product_content">
                                                <h4><a href="product-details.html">Cillum dolore nisl fermentum</a></h4>
                                                <div class="product_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="price_box">
                                                    <span class="old_price">$70.00</span>
                                                    <span class="current_price">$65.00</span>
                                                </div>
                                            </div>
                                        </figure>
                                    </article>
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
    <!-- Plugins JS -->
    <?= $this->Html->script("/css/assets/js/plugins.js") ?>

    <!-- Main JS -->
    <?= $this->Html->script("/css/assets/js/main.js") ?>
</html>