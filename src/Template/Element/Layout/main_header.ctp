<?=$this->element('Layout/inc_mobile_menu')?>
<!--header area start-->
<header>
    <div class="main_header">
        <div class="container">
            <!--header middel start-->
            <div id="app-header" class="header_middle sticky-header">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <?= $this->Html->link($this->Html->image('logo/logo.png'), ['controller' => 'home'], ['escape' => false]) ?>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="main_menu menu_position text-right">
                            <nav>
                                <ul>
                                    <li>
                                        <?= $this->Html->link('หน้าหลัก', ['controller' => 'home']) ?>
                                    </li>
                                    <li>
                                        <?= $this->Html->link('สินค้าทั้งหมด', ['controller' => 'home']) ?>
                                    </li>
                                   
                                    <li>
                                        <?= $this->Html->link('สมัครสมาชิก', ['controller' => 'register', 'action' => 'index']) ?>
                                    </li>

                                    <login/>

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2">
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

            <!--header bottom satrt-->
            <div class="header_bottom">
                <div class="row align-items-center">
                    <div class="column1 col-lg-3 col-md-6">
                        <div class="categories_menu <?=$CNAME=='home'?'':'categories_three'?>">
                            <div class="categories_title">
                                <h2 class="categori_toggle">ประเภทสินค้าทั้งหมด</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    <li class="menu_item_children"><a href="#">Brake Parts <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu">
                                            <li class="menu_item_children"><a href="#">Dresses</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Sweater</a></li>
                                                    <li><a href="">Evening</a></li>
                                                    <li><a href="">Day</a></li>
                                                    <li><a href="">Sports</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Handbags</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Shoulder</a></li>
                                                    <li><a href="">Satchels</a></li>
                                                    <li><a href="">kids</a></li>
                                                    <li><a href="">coats</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">shoes</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Ankle Boots</a></li>
                                                    <li><a href="">Clog sandals </a></li>
                                                    <li><a href="">run</a></li>
                                                    <li><a href="">Books</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Clothing</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Coats Jackets </a></li>
                                                    <li><a href="">Raincoats</a></li>
                                                    <li><a href="">Jackets</a></li>
                                                    <li><a href="">T-shirts</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Wheels & Tires <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_3">
                                            <li class="menu_item_children"><a href="#">Chair</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Dining room</a></li>
                                                    <li><a href="">bedroom</a></li>
                                                    <li><a href=""> Home & Office</a></li>
                                                    <li><a href="">living room</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Lighting</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Ceiling Lighting</a></li>
                                                    <li><a href="">Wall Lighting</a></li>
                                                    <li><a href="">Outdoor Lighting</a></li>
                                                    <li><a href="">Smart Lighting</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Sofa</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Fabric Sofas</a></li>
                                                    <li><a href="">Leather Sofas</a></li>
                                                    <li><a href="">Corner Sofas</a></li>
                                                    <li><a href="">Sofa Beds</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Furnitured & Decor <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                            <li class="menu_item_children"><a href="#">Brake Tools</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Driveshafts</a></li>
                                                    <li><a href="">Spools</a></li>
                                                    <li><a href="">Diesel </a></li>
                                                    <li><a href="">Gasoline</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Emergency Brake</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Dolls for Girls</a></li>
                                                    <li><a href="">Girls' Learning Toys</a></li>
                                                    <li><a href="">Arts and Crafts for Girls</a></li>
                                                    <li><a href="">Video Games for Girls</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Turbo System <i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                            <li class="menu_item_children"><a href="#">Check Trousers</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Building</a></li>
                                                    <li><a href="">Electronics</a></li>
                                                    <li><a href="">action figures </a></li>
                                                    <li><a href="">specialty & boutique toy</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Calculators</a>
                                                <ul class="categorie_sub_menu">
                                                    <li><a href="">Dolls for Girls</a></li>
                                                    <li><a href="">Girls' Learning Toys</a></li>
                                                    <li><a href="">Arts and Crafts for Girls</a></li>
                                                    <li><a href="">Video Games for Girls</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#"> Lighting</a></li>
                                    <li><a href="#"> Accessories</a></li>
                                    <li><a href="#">Body Parts</a></li>
                                    <li><a href="#">Networking</a></li>
                                    <li><a href="#">Perfomance Filters</a></li>
                                    <li><a href="#"> Engine Parts</a></li>
                                    <li id="cat_toggle" class="has-sub"><a href="#"> More Categories</a>
                                        <ul class="categorie_sub">
                                            <li><a href="#">Hide Categories</a></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="column2 col-lg-9 ">
                        <div class="search_container">
                            <form action="#">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori2">
                                        <option selected value="1">ทุกประเภทสินค้า</option>
                                        <option value="2">Accessories</option>
                                        <option value="3">Accessories & More</option>
                                        <option value="4">Butters & Eggs</option>
                                        <option value="5">Camera & Video </option>
                                        <option value="6">Mornitors</option>
                                        <option value="7">Tablets</option>
                                        <option value="8">Laptops</option>
                                        <option value="9">Handbags</option>
                                        <option value="10">Headphone & Speaker</option>
                                        <option value="11">Herbs & botanicals</option>
                                        <option value="12">Vegetables</option>
                                        <option value="13">Shop</option>
                                        <option value="14">Laptops & Desktops</option>
                                        <option value="15">Watchs</option>
                                        <option value="16">Electronic</option>
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="ค้นหาสินค้า..." type="text">
                                    <button type="submit">ค้นหา</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="column3 col-lg-3 col-md-6">
                        <div class="header_bigsale">
                            <a href="#">BIG SALE BLACK FRIDAY</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div>
    </div>
</header>
<!--header area end-->

<?= $this->Html->script('header/main.js', ['type' => 'module']) ?>