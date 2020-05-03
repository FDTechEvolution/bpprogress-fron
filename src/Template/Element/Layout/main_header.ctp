<?= $this->element('Layout/inc_mobile_menu') ?>
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
                                        <?= $this->Html->link('สินค้าทั้งหมด', ['controller' => 'products']) ?>
                                    </li>
                                    <?php if(!$isLogged){?>
                                    <li>
                                        <?= $this->Html->link('สมัครสมาชิก', ['controller' => 'register', 'action' => 'index']) ?>
                                    </li>
                                    <?php }?>

                                    <login/>

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="header_configure_area">
                            <mini-cart></mini-cart>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel end-->

            <!--header bottom satrt-->
            <div class="header_bottom">
                <div class="row align-items-center">
                    <div class="column1 col-lg-3 col-md-6">
                        <div class="categories_menu <?= $CNAME == 'home' ? '' : 'categories_three' ?>">
                            <div class="categories_title">
                                <h2 class="categori_toggle">ประเภทสินค้าทั้งหมด</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    <?php $mores = []; ?>
                                    <?php foreach ($productCategories as $index => $productCategory): ?>
                                        <?php if ($index < 10) { ?>
                                            <li>
                                                <?= $this->Html->link($productCategory['name'], ['controller'=>'products','action'=>'category','title'=>$productCategory['name'],'id'=>$productCategory['id']]) ?>
                                            </li>
                                        <?php } else { ?>
                                            <?php array_push($mores, $productCategory) ?>
                                        <?php } ?>
                                    <?php endforeach; ?>

                                    <li id="cat_toggle" class="has-sub"><a href="#"> More Categories</a>
                                        <ul class="categorie_sub">
                                            <?php foreach ($mores as $index => $productCategory): ?>
                                                <li>
                                                    <?= $this->Html->link($productCategory['name'], ['controller'=>'products','action'=>'category','title'=>$productCategory['name'],'id'=>$productCategory['id']]) ?>
                                                </li>
                                            <?php endforeach; ?>
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