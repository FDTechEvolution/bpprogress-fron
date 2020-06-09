<div class="error_page_bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-12">
                <div class="card">
                    <div class="card-body">
                        <?= $this->Form->create('resetpassword', ['url'=>['controller'=>'forgot','action'=>'reset'],'enctype' => 'multipart/form-data', 'id' => 'frm-resetpassword']) ?>
                        <?= $this->Form->hidden('user_id', ['id' => 'user_id','value'=>$postData['user_id']]) ?>
                        <?= $this->Form->hidden('ischange', ['id' => 'ischange','value'=>'Y']) ?>
                        <div class="row">
                            <div class="col-12">
                                <h3>แก้ไขรหัสผ่าน</h3>
                               
                            </div>
                            <div class="col-12">
                                <label>รหัสผ่านใหม่:</label>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="password"/>
                                </div>
                                 <label>ยืนยันรหัสผ่าน:</label>
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password"/>
                                </div>
                                 <div class="form-group">
                                     <button class="btn btn-primary" type="submit">เปลี่ยนรหัสผ่าน</button>
                                 </div>
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
       
    });
</script>