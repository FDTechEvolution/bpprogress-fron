<?= $this->Html->css('/js/bootstrap-datepicker-thai-thai/css/datepicker.css') ?>
<div class="error_page_bg">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <?= $this->Form->create('payment', ['enctype' => 'multipart/form-data', 'id' => 'frm-payment']) ?>
                <?= $this->Form->hidden('order_id', ['value' => $order['id'], 'id' => 'order_id']) ?>
                <?= $this->Form->hidden('payment_id', ['value' => $order['payments'][0]['id'], 'id' => 'payment_id']) ?>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <h3>ยอดสำหรับการโอนเงิน</h3>
                        <hr/>
                        <h4 class="text-danger">ยอดชำระ <?= number_format($order['totalamt']) ?> บาท</h4>

                        <h4>บริษัท บีพี โปรเกรส อินเตอร์เนชั่นแนล จำกัด</h4>
                        <h4>ธนาคารกสิกรไทย</h4>
                        <h3 class="text-success">999-9-99999-9</h3>
                    </div>
                    <div class="col-md-6 col-12">
                        <h3>แจ้งการโอนเงิน</h3>
                        <hr/>
                        <div class="row">
                            <div class="col-3 text-right">
                                <label for="amount">ยอดเงินที่โอน *</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="number" class="form-control" id="amount" name="amount" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 text-right">
                                <label>วันที่โอน *</label>

                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="text" name="docdate" value="" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-language="th" class="form-control" readonly required>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-3 text-right">
                                <label>เวลาที่โอน *</label>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="text" name="transfertime" id="transfertime" class="form-control" placeholder="12:00" required/>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-3 text-right">
                                <label for="">หลักฐานการโอนเงิน *</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="file" name="image_file" id="image_file" accept="image/png, image/jpeg" class="form-control-file" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 text-right">
                                <label for="">หมายเหตุ</label>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <input type="text" name="description" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-12 text-right">
                        <button class="btn btn-primary" type="button" id="bt-save">ยืนยันการโอนเงิน</button>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>

        </div>

    </div>
</div>
<?= $this->Html->script('bootstrap-datepicker-thai-thai/js/bootstrap-datepicker.js') ?>
<?= $this->Html->script('bootstrap-datepicker-thai-thai/js/bootstrap-datepicker-thai.js') ?>
<?= $this->Html->script('bootstrap-datepicker-thai-thai/js/locales/bootstrap-datepicker.th.js') ?>
<script>
    $(document).ready(function () {
        $('#docdate').datepicker({
            autoClose: true,
            todayHighlight: true
        });
        
        $("#frm-payment").validate({
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
        
        $('#bt-save').on('click', function () {
            if ($("#frm-payment").valid()) {
                $("#frm-payment").submit();
            }

        });
    });
</script>