<div class="cart_page_bg">
    <div class="container">
        <div class="shopping_cart_area">
            <?= $this->Form->create('checkout', ['id' => 'checkout']) ?>
            <?= $this->Form->hidden('order_id',['value'=>$order['id']])?>
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
                                            <td><?= number_format($line['unit_price']) ?></td>
                                            <td><?= $line['qty'] ?></td>
                                            <td><?= number_format($line['amount']) ?></td>
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
                    <h4>ที่อยู่สำหรับจัดส่ง <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-add-address" class="text-primary"> [เพิ่มที่อยู่สำหรับจัดส่ง]</a></h4>
                    <hr/>
                    <div class="row">
                        <?php if (sizeof($user['addresses']) == 0) { ?>
                            <div class="col-12">
                                <p>**** ยังไม่มีข้อมูลที่อยู่ ****</p>

                            </div>
                        <?php } else { ?>
                            <div class="col-12 pl-4 mb-3">
                                <?php foreach ($user['addresses'] as $index => $address): ?>
                                    <div class="form-check p-2 pl-4">
                                        <input class="form-check-input" type="radio" name="address_id" id="<?= $address['id'] ?>" value="<?= $address['id'] ?>" <?= $index == 0 ? 'checked' : '' ?> />
                                        <label class="form-check-label" for="<?= $address['id'] ?>">
                                            <strong><?=$user['fullname']?></strong>
                                            <?= sprintf('%s ต.%s อ.%s จ.%s %s โทร.%s', $address['address_line'], $address['subdistrict'], $address['district'], $address['province'], $address['zipcode'], $address['mobile']) ?>
                                        </label>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        <?php } ?>


                    </div>

                </div>
                <div class="col-md-6 col-12">
                    <h4>รูปแบบการชำระเงิน</h4>
                    <hr/>
                    <div class="row text-center">
                        <div class="col-4 border border-light p-3 mouse" data-type="box-payment-method" data-value="transfer">
                            <h4>โอนเงิน</h4>
                        </div>
                        <div class="col-4 border border-light p-3 mouse" data-type="box-payment-method" data-value="creditcard">
                            <h4>บัตรเครดิต</h4>
                        </div>
                        <div class="col-4 border border-light p-3 mouse" data-type="box-payment-method" data-value="cod">
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

<div class="modal fade" id="modal-add-address" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มที่อยู่ใหม่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-address">
                    <input type="hidden" name="user_id" id="user_id" value="<?= $user['id'] ?>" />
                    <div class="form-group row">
                        <label for="address_line" class="col-md-3 col-sm-2 col-4 col-form-label">บ้านเลขที่/อาคาร/หมู่บ้าน/ถนน/หมู่ที่</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="address_line" name="address_line" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subdistrict" class="col-md-3 col-sm-2 col-4 col-form-label">ตำบล</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="district" class="col-md-3 col-sm-2 col-4 col-form-label">อำเภอ</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="district" name="district" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="province" class="col-md-3 col-sm-2 col-4 col-form-label">จังหวัด</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="province" name="province" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="zipcode" class="col-md-3 col-sm-2 col-4 col-form-label">รหัสไปรษณีย์</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mobile" class="col-md-3 col-sm-2 col-4 col-form-label">โทร</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก/ปิด</button>
                <button type="button" class="btn btn-primary" id="bt-save-address">บันทึก</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

<script>
    var siteUrl = '<?= SITE_URL ?>';
    $(document).ready(function () {


        $('[data-type="box-payment-method"]').on('click', function () {
            $('[data-type="box-payment-method"]').removeClass('bg-secondary text-white');
            $('[data-type="box-payment-method"]').addClass('border-light');
            $(this).addClass('bg-secondary text-white');
            $(this).removeClass('border-secondary');

            $('#payment_method').val($(this).attr('data-value'));
            $('#bt-save').prop('disabled', false);
        });

        $('#bt-save-address').on('click', function () {
            $.post(siteUrl + 'services/save-address', $('#frm-address').serialize(), function (data) {
                console.log(data);
                if (data.status === 200) {
                    location.reload();
                }
            });
        });

    });
</script>