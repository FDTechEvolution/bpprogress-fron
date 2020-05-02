<div class="cart_page_bg">
    <div class="container">
        <div class="shopping_cart_area">
            <?= $this->Form->create('checkout', ['id' => 'checkout']) ?>
            <?php $amount = 0; ?>
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
                                    <?php foreach ($order['order_lines'] as $index => $line): ?>
                                        <tr>
                                            <td>
                                                <image src="<?= $line['product']['product_images'][0]['image']['fullpath'] ?>" width="70" />
                                            </td>
                                            <td><?= $line['product']['name'] ?></td>
                                            <td><?= $line['unit_price'] ?></td>
                                            <td><?= $line['qty'] ?></td>
                                            <td><?= $line['amount'] ?></td>
                                        </tr>
                                        <?php $amount += $line['amount']; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-12 text-right">
                    <h4>ราคารวม <?= number_format($amount) ?></h4>
                    <h4>ค่าส่ง <?= number_format(0) ?></h4>
                    <h4 class="text-danger">รวมทั้งหมด <?= number_format($order['totalamt']) ?></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-12">
                    <h4>ที่อยู่สำหรับจัดส่ง</h4>
                    <hr/>
                    <div class="row">
                        <?php if (sizeof($user['addresses']) == 0) { ?>
                            <div class="col-12">
                                <p>**** ยังไม่มีข้อมูลที่อยู่ ****</p>
                                <button class="btn btn-secondary" type="button">เพิ่มที่อยู่สำหรับจัดส่ง</button>
                            </div>
                        <?php } else { ?>
                            <div class="col-12">

                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <h4>รูปแบบการชำระเงิน</h4>
                    <hr/>
                    <div class="row text-center">
                        <div class="col-4 border border-secondary rounded p-3 mouse" data-type="box-payment-method" data-value="transfer">
                            <h4>โอนเงิน</h4>
                        </div>
                        <div class="col-4 border border-secondary rounded p-3 mouse" data-type="box-payment-method" data-value="creditcard">
                            <h4>บัตรเครดิต</h4>
                        </div>
                        <div class="col-4 border border-secondary rounded p-3 mouse" data-type="box-payment-method" data-value="cod">
                            <h4>เก็บเงินปลายทาง</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-right">
                    <button class="btn btn-primary btn-lg" disabled="disabled" id="bt-save">ยืนยันการสั่งซื้อ</button>
                </div>
            </div>
          

        </div>
        <?= $this->Form->hidden('payment_method', ['id' => 'payment_method']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    var apiUrl = '<?= SITE_API ?>';
    $(document).ready(function () {
        $('[data-type="box-payment-method"]').on('click', function () {
            $('[data-type="box-payment-method"]').removeClass('bg-secondary');
            $('[data-type="box-payment-method"]').addClass('border-secondary');
            $(this).addClass('bg-secondary');
            $(this).removeClass('border-secondary');

            $('#payment_method').val($(this).attr('data-value'));
            $('#bt-save').prop('disabled', false);
        });


    });
</script>