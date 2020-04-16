<!--header middel start-->
<div id="app-header" class="header_middle sticky-header">
    <div class="row align-items-center">
        <div class="col-lg-2 col-md-6">
            <div class="logo">
                <?=$this->Html->link($this->Html->image('logo/logo.png'),['controller'=>'home'],['escape'=>false])?>
               
            </div>
        </div>
        <div class="col-lg-7 col-md-12">
            <div class="main_menu menu_position text-center">
                <nav>
                    <ul>
                        <li>
                            <?=$this->Html->link('หน้าหลัก',['controller'=>'home'])?>
                        </li>
                        <li class="mega_items"><a href="shop.html">shop<i class="fa fa-angle-down"></i></a>
                            <div class="mega_menu">
                                <ul class="mega_menu_inner">
                                    
                                </ul>
                            </div>
                        </li>
                        

                        <li>
                            <?= $this->Html->link('เข้าสู่ระบบ', ['controller' => 'login', 'action' => 'index']) ?>
                        </li>
                        <li>
                            <?= $this->Html->link('สมัครสมาชิก', ['controller' => 'register', 'action' => 'index']) ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="header_configure_area">
                
                <div class="mini_cart_wrapper">
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
                        <div class="mini_cart_table">
                            <div class="cart_total">
                                <span>Sub total:</span>
                                <span class="price">$138.00</span>
                            </div>
                            <div class="cart_total mt-10">
                                <span>total:</span>
                                <span class="price">$138.00</span>
                            </div>
                        </div>
                        <div class="mini_cart_footer">
                            <div class="cart_button">
                                <a href="cart.html">ตะกร้าสินค้า</a>
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

<?= $this->Html->script('header/main.js', ['type' => 'module']) ?>