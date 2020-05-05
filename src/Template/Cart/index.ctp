<!--shopping cart area start -->
<div class="cart_page_bg">
    <div class="container">
        <div class="shopping_cart_area">
            <?= $this->Form->create('cart',['id'=>'cart']) ?>
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
                                        <th class="product_remove">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>สรุปผลการสั่งซื้อ</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>ราคารวม</p>
                                    <p class="cart_amount" id="subtotal"></p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>ค่าส่ง</p>
                                    <p class="cart_amount" id="shippingamt">0</p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>รวมทั้งหมด</p>
                                    <p class="cart_amount" id="totalamt"></p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="#" id="bt-save">บันทึกและชำระเงิน</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
            <?= $this->Form->hidden('user_id', ['value' => '', 'id' => 'user_id']) ?>
            <?= $this->Form->hidden('shop_id', ['value' => '0']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<!--shopping cart area end -->
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    var apiUrl = '<?=SITE_API?>';
    $(document).ready(function () {

        console.log(localStorage.getItem('__u_set_pct'));
        console.log(localStorage.getItem('_u_ss_isset'));
        var user = JSON.parse(localStorage.getItem('_u_ss_isset'));
        var products = JSON.parse(localStorage.getItem('__u_set_pct'));

        var totalamt = 0;
        $.each(products, function (index, product) {
            var product_id = product.pr;
            var qty = parseInt(product.qt);
            var price = parseInt(product.pi);
            var amount = qty * price;
            totalamt += amount;
            var rowHtml = '';
            rowHtml += '<tr id="'+product_id+'">';
            rowHtml += '<td class="product_thumb">';
            rowHtml += '<image src="' + product.im + '" width="70" />';
            rowHtml += '<input type="hidden" name="order_lines[' + index + '][product_id]" value="' + product_id + '"/>';
            rowHtml += '<input type="hidden" name="order_lines[' + index + '][qty]" value="' + qty + '"/>';
            rowHtml += '</td>';
            rowHtml += '<td class="product_name">' + product.ne + '</td>';
            rowHtml += '<td class="product-price">' + price + '</td>';
            rowHtml += '<td class="product_quantity">' + qty + '</td>';
            rowHtml += '<td class="product_total">' + amount + '</td>';
            rowHtml += '<td class="product_remove"><a href="javascript:void(0);" onclick="removeElementById(\''+product_id+'\')"><i class="fa fa-trash-o"></i></a></td>';

            rowHtml += '</tr>';

            $('#tb-list-product tbody').append(rowHtml);
        });
        $('#subtotal').text(totalamt);
        $('#totalamt').text(totalamt);
        if(user !== null){
             $('#user_id').val(user.data);
        }
       


        $('#_bt-checkout').on('click', function () {
            console.log('click');
            $.post('https://cors-anywhere.herokuapp.com/'+apiUrl+'sv-orders/save', $('#cart').serialize(), function (data) {
               console.log(data);
            });
        });
        
        $('#bt-save').on('click',function(){
            $('#cart').submit();
        });

    });
</script>