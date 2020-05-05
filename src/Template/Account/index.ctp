
<div class="account_page_bg">
    <div class="container">
        <section class="main_content_area">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active">บัญชีผู้ใช้งาน</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">รายการสั่งซื้อ</a></li>

                                <li><a href="#address" data-toggle="tab" class="nav-link">จัดการที่อยู่</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <!-- Tab panes -->
                                <div class="tab-content dashboard_content">
                                    <div class="tab-pane fade show active" id="dashboard">
                                        <h3>บัญชีผู้ใช้งาน </h3>
                                        <div class="login">
                                            <div class="login_form_container">
                                                <div class="account_login_form">
                                                    <form action="#">

                                                        <label>ชื่อ - นามสกุล</label>
                                                        <input type="text" name="fullname" id='fullname' value="<?= $user['fullname'] ?>">

                                                        <label>อีเมล</label>
                                                        <input type="text" name="email-name">
                                                        <label>หมายเลขโทรศัพท์</label>
                                                        <input type="number" name="mobile" id="mobile" value="<?= $user['mobile'] ?>">
                                                        <div class="save_button primary_btn default_button">
                                                            <button type="button">บันทึก</button>
                                                        </div>
                                                        <p>ต้องการ เปลี่บนรหัสผ่าน? <a href="javascript:void(0);" class="link" data-toggle="modal" data-target="#modal-change-password">เปลี่ยน</a></p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="orders">
                                        <h3>รายการสั่งซื้อ</h3>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>

                                                        <th>วันที่สั่งซื้อ</th>
                                                        <th>หมายเลขคำสั่งซื้อ</th>
                                                        <th>สถานะ</th>
                                                        <th>สถานะการชำระเงิน</th>
                                                        <th class="text-right">จำนวนเงิน</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($orders as $index => $order): ?>
                                                        <tr>

                                                            <td><?= $order['docdate'] ?></td>
                                                            <td><?= $this->Html->link($order['docno'], '#') ?></td>
                                                            <td><?= $order['status'] ?></td>
                                                            <td><?= $order['payment_status'] ?></td>
                                                            <td class="text-right"><?= number_format($order['totalamt']) ?></td>

                                                        </tr>

                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="address">

                                        <h4 class="billing-address font-kanit-600">จัดการที่อยู่ </h4>
                                        <a href="javascrip:void(0);" class="link" data-toggle="modal" data-target="#modal-add-address">[เพิ่มที่อยู่ใหม่]</a>
                                        <div class="table-responsive">
                                            <table class="table" id="tb-address">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">#</th>
                                                        <th class="text-left">ที่อยู่</th>
                                                        <th class="text-right"></th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($user['addresses'] as $index => $address): ?>
                                                        <tr id="<?= $address['id'] ?>">
                                                            <td><?= $index + 1 ?></td>
                                                            <td class="text-left"><?= sprintf('%s ต.%s อ.%s จ.%s %s โทร %s', $address['address_line'], $address['subdistrict'], $address['district'], $address['province'], $address['zipcode'], $address['mobile']) ?></td>
                                                            <td>
                                                                <a href="javascrip:void(0);" class="link" data-action="delete-address" data-id="<?= $address['id'] ?>">ลบ</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="modal fade" id="modal-change-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เปลี่ยนรหัสผ่าน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frm-change-password">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก/ปิด</button>
                <button type="button" class="btn btn-primary" id="bt-save-password">บันทึก</button>
            </div>
        </div>
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
                            <input type="text" class="form-control" id="address_line" name="address_line" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subdistrict" class="col-md-3 col-sm-2 col-4 col-form-label">ตำบล</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="subdistrict" name="subdistrict" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="district" class="col-md-3 col-sm-2 col-4 col-form-label">อำเภอ</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="district" name="district" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="province" class="col-md-3 col-sm-2 col-4 col-form-label">จังหวัด</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="province" name="province" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="zipcode" class="col-md-3 col-sm-2 col-4 col-form-label">รหัสไปรษณีย์</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mobile" class="col-md-3 col-sm-2 col-4 col-form-label">โทร</label>
                        <div class="col-md-9 col-sm-10 col-6">
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
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

<script>
    var siteUrl = '<?= SITE_URL ?>';

    $(document).ready(function () {
        $("#frm-address").validate({
            rules: {
                email: {
                    required: true
                },

            },

            // Messages for form validation
            messages: {

            },

            // Do not change code below
            errorPlacement: function (error, element)
            {
                error.insertAfter(element);
            }
        });

        $('#bt-save-address').on('click', function () {
            if ($("#frm-address").valid()) {
                $.post(siteUrl + 'services/save-address', $('#frm-address').serialize(), function (data) {
                    console.log(data);
                    if (data.status === 200) {
                        var address = data.data;
                        var rowHtml = '';
                        rowHtml += '<tr>';
                        rowHtml += '<td></td>';
                        rowHtml += '<td class="text-left">';
                        rowHtml += address.address_line + ' ต.' + address.subdistrict + ' อ.' + address.district + ' จ.' + address.province + ' ' + address.zipcode + ' โทร ' + address.mobile;
                        rowHtml += '</td>';
                        rowHtml += '<td><a href="javascrip:void(0);" class="link" data-action="delete-address" data-id="' + address.id + '">ลบ</a></td>';
                        rowHtml += '</tr>';

                        $('#tb-address tbody').append(rowHtml);
                  
                        $('#modal-add-address').modal('hide');
                        $('#frm-address')[0].reset();
                    }
                });
            }

        });

        $('[data-action="delete-address"]').on('click', function () {
            var address_id = $(this).attr('data-id');

            var formData = new FormData();
            formData.append('address_id', address_id);
            formData.append('isactive', 'N');

            $.ajax({
                type: 'POST',
                url: siteUrl + 'services/update-address',
                data: formData,
                //dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {

                },
                success: function (response) {
                    console.log(response);
                    var address = response.data;
                    removeElementById(address.id);
                }
            });
        });

    });
</script>