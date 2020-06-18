<!--shopping cart area start -->
<div class="cart_page_bg">
    <div class="container">
        <div class="shopping_cart_area">
            <?= $this->Form->create('cart', ['id' => 'cart']) ?>
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="cart_page table-responsive">
                            <table id="tb-list-product">
                                <thead>
                                    <tr>

                                        <th class="product_thumb">รูปสินค้า</th>
                                        <th class="product_name">ชื่อสินค้า</th>
                                        <th class="product-price text-right">ราคา</th>
                                        <th class="product_quantity">จำนวน</th>
                                        <th class="product_total text-right">ราคารวม</th>
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
            <div class="coupon_area" id="box-sumary">
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
                                    <button id="bt-save" class="btn btn-primary btn-lg">บันทึกและชำระเงิน</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
            <?= $this->Form->hidden('user_id', ['value' => '', 'id' => 'user_id']) ?>
            <?= $this->Form->hidden('shop_id', ['value' => '0']) ?>
            <?= $this->Form->hidden('ispreorder', ['value' => '', 'id' => 'ispreorder']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<!--shopping cart area end -->

<script>

    let ispreorder = false;

    function recal() {
        if(ispreorder == true) {
            return
        }
        //console.log($('#tb-list-product tbody tr').length);
        let totalamt = 0;
        $('#bt-save').prop('disabled', false);
        $.each($('#tb-list-product tbody tr'), function (index, row) {
            $('#loader').show();
            let product_id = $(row).attr('data-row');
            let qty = $('#qty-' + product_id).val();
            if (qty < 1) {
                qty = 1;
                $('#qty-' + product_id).val(qty);
            }

            $.get(fullServiceUrl + 'sv-products/calculate-price?product=' + product_id + '&qty=' + qty + '&ispreorder=N', {})
                    .done(function (data) {

                        data = data.data;
                        //console.log(data);
                        //verify qty
                        if (data.product.iswholesale === 'Y' && data.product.isretail === 'N') {
                            //console.log(data.min_wholesale.startqty);
                            if (qty < data.min_wholesale.startqty) {
                                // let old_qty = $('#_qty-' + product_id).val();
                                qty = parseInt(data.min_wholesale.startqty);
                                $('#qty-' + product_id).val(qty);
                                $('#loader').hide();
                                recal();
                            }
                        }

                        let amount = parseInt(qty) * parseInt(data.unit_price);
                        totalamt += parseInt(amount);



                        $('#price-' + product_id).text(Number(data.unit_price).toLocaleString('en'));
                        $('#amt-' + product_id).text(Number(amount).toLocaleString('en'));

                        $('#subtotal').text('฿' + Number(totalamt).toLocaleString('en'));
                        $('#totalamt').text('฿' + Number(totalamt).toLocaleString('en'));

                        //Check qty
                        if (parseInt(qty) > parseInt(data.product.qty)) {
                            $('#msg-' + product_id).text('เกินจำนวนสินค้าที่มี [' + data.product.qty + ']');
                            $('#bt-save').prop('disabled', true);
                        } else {
                            $('#msg-' + product_id).text('');
                        }
                        $('#loader').hide();
                    });
        });



    }

    $(document).ready(function () {

        // console.log(localStorage.getItem('__u_set_pct'));
        // console.log(localStorage.getItem('_u_ss_isset'));
        var user = JSON.parse(localStorage.getItem('_u_ss_isset'));
        var products = JSON.parse(localStorage.getItem('__u_set_pct'));

        if (products == null) {
            console.log('cart is null.');
            $('#box-sumary').hide();
            var html = '';
            html += '<tr>';
            html += '<td colspan="6">';
            html += '<h3>ยังไม่มีสินค้าในตะกร้า</h3>';
            html += '<p>เลือกซื้อสินค้าหลากหลายได้ที่ <a href="' + siteUrl + 'products">สินค้าทั้งหมด</a></p>';
            html += '</td>';
            html += '</tr>';
            $('#tb-list-product tbody').append(html);
        }
        var totalamt = 0;
        $.each(products, function (index, product) {
            var product_id = product.pr;
            var qty = parseInt(product.qt);
            var price = parseInt(product.pi);
            var amount = qty * price;
            let preorder = '';
            if(product.po === 1){
                ispreorder = true
                $('#ispreorder').val('Y');
                preorder = '<i class="fa fa-product-hunt ml-1 text-danger" title="สินค้ารายการพรีออเดอร์"></i>';
            }
            totalamt += amount;
            var rowHtml = '';
            rowHtml += '<tr data-row="' + product_id + '" id="' + product_id + '">';
            rowHtml += '<td class="product_thumb">';
            rowHtml += '<image src="' + product.im + '" width="70" />';
            rowHtml += '<input type="hidden" name="order_lines[' + index + '][product_id]" value="' + product_id + '" data-type="product_line" data-id="' + product_id + '" data-qty="' + qty + '"/>';

            rowHtml += '</td>';
            rowHtml += '<td class="product_name">' + product.ne + '' + preorder + '</td>';
            rowHtml += '<td class="product-price" id="price-' + product_id + '">' + Number(price).toLocaleString('en') + '</td>';
            rowHtml += '<td class="product_quantity text-left">';
            rowHtml += '<span id="msg-' + product_id + '" class="text-danger"></span>';
            rowHtml += '<input type="number" id="qty-' + product_id + '" class="form-control" name="order_lines[' + index + '][qty]" value="' + qty + '" onchange="recal();" onkeyup="recal();"/>';
            rowHtml += '<input type="hidden" id="_qty-' + product_id + '" value="' + qty + '"/>';

            rowHtml += '</td>';
            rowHtml += '<td class="product_total text-right" id="amt-' + product_id + '">' + Number(amount).toLocaleString('en') + '</td>';
            rowHtml += '<td class="product_remove"><a href="javascript:void(0);" onclick="removeElementById(\'' + product_id + '\')"><i class="fa fa-trash-o"></i></a></td>';

            rowHtml += '</tr>';

            $('#tb-list-product tbody').append(rowHtml);
            recal();
        });
        $('#subtotal').text('฿' + Number(totalamt).toLocaleString('en'));
        $('#totalamt').text('฿' + Number(totalamt).toLocaleString('en'));
        if (user !== null) {
            $('#user_id').val(user.data);
        }

        $('#bt-save').on('click', function () {
            /*
             var product_line = $('[data-type="product_line"]');
             var is_ok = true;
             
             $.each(product_line, function (index, product) {
             let product_id = $(product).attr('data-id');
             let qty = $(product).attr('data-qty');
             
             $.ajax({
             url: fullServiceUrl + 'sv-orders/check-stock-by-product?se=1',
             type: "get", //send it through get method
             data: {
             product: product_id,
             qty: qty
             },
             success: function (response) {
             console.log(response);
             response = response.data;
             if(response.status === false){
             is_ok = false;
             }
             },
             error: function (xhr) {
             //Do Something to handle error
             }
             });
             });
             * 
             */

            $('#cart').submit();
        });

    });
</script>