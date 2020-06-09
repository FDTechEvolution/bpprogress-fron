<div class="error_page_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-12">
                <div class="card">
                    <div class="card-body">
                        <?= $this->Form->create('resetpassword', ['url'=>['controller'=>'forgot','action'=>'reset'],'enctype' => 'multipart/form-data', 'id' => 'frm-resetpassword']) ?>
                        <?= $this->Form->hidden('user_id', ['id' => 'user_id']) ?>
                        <div class="row">
                            <div class="col-12">
                                <h3>ลืมรหัสผ่าน</h3>
                                <p>ระบุหมายเลขโทรศัพท์ของคุณ</p>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="mobile" name="mobile" class="form-control" id="mobile"/>
                                </div>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-block" type="button" id="bt-send-otp">Send OTP</button>
                            </div>
                            <div class="col-12" id="t-result">

                            </div>
                        </div>
                        <div class="row" style="display: none;" id="box-type-otp">
                            <div class="col-12">
                                <p id="t-ref"></p>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="mobile" name="otp" class="form-control" id="otp"/>
                                    <input type="hidden" name="ref" class="form-control" id="ref"/>
                                    <span class="text-danger" id="t-verify-err"></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-block" type="button" id="bt-verify-otp">ตรวจสอบ</button>
                            </div>
                        </div>

                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#bt-send-otp').on('click', function () {
            $('#t-result').empty();
            $('#t-ref').empty();
            let mobile = $('#mobile').val();
            $.get(fullServiceUrl + 'sv-registers/request-otp/' + mobile, {})
                    .done(function (data) {
                        console.log(data);

                        if (data.status == 200) {
                            $('#box-type-otp').show();
                            $('#t-ref').text('ระบุรหัส OTP : รหัสอ้างอิง ' + data.data[1]);
                            $('#ref').val(data.data[1]);
                            
                        } else {
                            $('#box-type-otp').hide();
                            $('#t-result').html('<p class="text-danger">' + data.msg + '</p>');
                        }
                    });
        });

        $('#bt-verify-otp').on('click', function () {
            let ref = $('#ref').val();
            let otp_code = $('#otp').val();
            $('#t-verify-err').empty();
            $.get(fullServiceUrl + 'sv-registers/verify-otp/' + ref + '/' + otp_code, {})
                    .done(function (data) {
                        console.log(data);

                        if (data.status == 200) {
                            $('#user_id').val(data.data.user_id);
                            $('#frm-resetpassword').submit();
                        } else {
                            $('#t-verify-err').text('ไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง');
                        }
                    });
        });
    });
</script>