<div class="login_page_bg">
    <div class="container">
        <div class="customer_login">
            <div class="row justify-content-md-center">

                <!--register area start-->
                <div class="col-lg-8 col-md-8">
                    <div id="register-frm" class="account_form register">
                        <h2>Register</h2>
                        <form action="#">
                            <div class="row pb-2">
                                <div class="col-md-6">
                                    <label>ชื่อ - สกุล <span>*</span></label>
                                    <input v-model="name" type="text">
                                    <span>{{notice.name}}</span>
                                </div>
                                <div class="col-md-6">
                                    <label>เบอร์โทรศัพท์ <span>*</span></label>
                                    <input v-model="phone" type="number" placeholder="ตัวเลขเท่านั้น">
                                    <span>{{notice.phone}}</span>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <label>รหัสผ่าน <span>*</span></label>
                                    <input v-model="password" type="password" placeholder="ต้องมี 8 ตัวขึ้นไป">
                                    <span>{{notice.password}}</span>
                                </div>
                                <div class="col-md-6">
                                    <label>ยืนยันรหัสผ่าน <span>*</span></label>
                                    <input v-model="cnf_password" type="password" placeholder="ต้องมี 8 ตัวขึ้นไป">
                                    <span>{{notice.cnf_password}}</span>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col-12 text-center">
                                    <div class="form-check">
                                        <input v-model="accept" type="checkbox" class="form-check-input" id="accept" checked>
                                        <label class="form-check-label" for="accept">ยอมรับเงื่อนไข</label>
                                        <span>{{notice.accept}}</span>
                                    </div>
                                    เมื่อกด "ลงทะเบียน" ถือว่ายอมรับตาม <a class="text-danger" href="#">ข้อกำหนดการใช้งาน</a> และ <a class="text-danger" href="#">นโยบายความเป็นส่วนตัว</a>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-lg-5 text-center">
                                    <button class="btn btn-block ml-0" type="button" @click="checkFormRegister()">ลงทะเบียน</button>
                                </div>
                                <div class="col-lg-2 text-center">หรือ</div>
                                <div class="col-lg-5 text-center">
                                    <button class="btn btn-block ml-0 bg-primary" type="submit">facebook</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->

            </div>
        </div>
    </div>
</div>
<style>
    .account_form input.form-check-input {
        height: 17px;
        position: relative;
        width: 30px;
    }
    .account_form span {
        color: #dd0000;
    }
</style>
<?= $this->Html->script('register/main.js') ?>