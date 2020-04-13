<!--header top start-->
<div class="header_top">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <div class="antomi_message">
                <p>Get free shipping – Free 30 day money back guarantee</p>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="header_top_settings text-right">
                <ul>
                    <li><a href="#">Store Locations</a></li>
                    <li><a href="#">Track Your Order</a></li>
                    <li>Hotline: <a href="tel:+(012)800456789">(012) 800 456 789 </a></li>
                    <li><?= $this->Html->link('เข้าสู่ระบบ', ['controller' => 'login', 'action' => 'index']) ?> | <?= $this->Html->link('สมัครสมาชิก', ['controller' => 'register', 'action' => 'index']) ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--header top start-->

<!--header middel start-->
<div class="header_middle sticky-header">
    <div class="row align-items-center">
        <div class="col-lg-2 col-md-6">
            <div class="logo">
                <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
            </div>
        </div>
        <div class="col-lg-7 col-md-12">
            <div class="main_menu menu_position text-center">
                <nav>
                    <ul>
                        <li><a href="index.html">home<i class="fa fa-angle-down"></i></a>
                            <ul class="sub_menu">
                                <li><a href="index.html">Home shop 1</a></li>
                                <li><a href="index-2.html">Home shop 2</a></li>
                                <li><a href="index-3.html">Home shop 3</a></li>
                                <li><a href="index-4.html">Home shop 4</a></li>
                                <li><a href="index-5.html">Home shop 5</a></li>
                                <li><a href="index-6.html">Home shop 6</a></li>
                            </ul>
                        </li>
                        <li class="mega_items"><a href="shop.html">shop<i class="fa fa-angle-down"></i></a>
                            <div class="mega_menu">
                                <ul class="mega_menu_inner">
                                    <li><a href="#">Shop Layouts</a>
                                        <ul>
                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                            <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                            <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                            <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                            <li><a href="shop-list.html">List View</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">other Pages</a>
                                        <ul>
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="my-account.html">my account</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Product Types</a>
                                        <ul>
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="product-sidebar.html">product sidebar</a></li>
                                            <li><a href="product-grouped.html">product grouped</a></li>
                                            <li><a href="variable-product.html">product variable</a></li>
                                            <li><a href="product-countdown.html">product countdown</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                            <ul class="sub_menu pages">
                                <li><a href="blog-details.html">blog details</a></li>
                                <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                <li><a href="blog-no-sidebar.html">blog no sidebar</a></li>
                            </ul>
                        </li>
                        <li><a class="active" href="#">pages <i class="fa fa-angle-down"></i></a>
                            <ul class="sub_menu pages">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="faq.html">Frequently Questions</a></li>
                                <li><a href="privacy-policy.html">privacy policy</a></li>
                                <li><a href="contact.html">contact</a></li>
                                <li><a href="login.html">login</a></li>
                                <li><a href="404.html">Error 404</a></li>
                                <li><a href="compare.html">compare</a></li>
                                <li><a href="coming-soon.html">coming soon</a></li>
                            </ul>
                        </li>

                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html"> Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="header_configure_area">
                <div class="header_wishlist">
                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>
                        <span class="wishlist_count">3</span>
                    </a>
                </div>
                <div id="app-cart" class="mini_cart_wrapper">
                    <a href="javascript:void(0)">
                        <i class="fa fa-shopping-bag"></i>
                        <span class="cart_price">$152.00 <i class="ion-ios-arrow-down"></i></span>
                        <span class="cart_count">2</span>
                    </a>
                    <!--mini cart-->
                    <div class="mini_cart">
                        <div class="mini_cart_inner">
                            <mini-cart/>
                        </div>
                        <div class="mini_cart_footer">
                            <div class="cart_button">
                                <a href="cart.html">View cart</a>
                            </div>
                            <div class="cart_button">
                                <a href="checkout.html">Checkout</a>
                            </div>
                        </div>
                    </div>
                    <!--mini cart end-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--header middel end-->

<?= $this->Html->script('cart/main.js', ['type' => 'module']) ?>