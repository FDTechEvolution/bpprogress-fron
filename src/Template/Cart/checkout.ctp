<div class="cart_page_bg">
    <div class="container">
        <div class="shopping_cart_area">
            <?= $this->Form->create('checkout', ['id' => 'checkout']) ?>
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table id="tb-list-product">
                                <thead>
                                    <tr>

                                        <th class="product_thumb">รูปสินค้า</th>
                                        <th class="product_name">ชื่อสินค้า</th>
                                        <th class="product-price">ราคา</th>
                                        <th class="product_quantity">จำนวน</th>
                                        <th class="product_total">ราคารวม</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    
                </div>
                <div class="col-md-6 col-12">
                    
                </div>
            </div>
            
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>