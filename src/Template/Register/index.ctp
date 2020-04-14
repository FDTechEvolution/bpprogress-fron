<div class="login_page_bg py-0">
    <div class="container">
        <div class="customer_login">
            <div class="row justify-content-md-center">

                <!--register area start-->
                <div class="col-lg-8 col-md-8">
                    <div id="register-frm" class="account_form register">
                        <h2>สมัครเข้าใช้งาน</h2>
                        <form action="#" @submit.prevent="validateBeforeSubmit">
                            <div class="row pb-2">
                                <div class="form-group col-md-6">
                                    <label>ชื่อ - สกุล <span>*</span> <small v-if="errors.has('fullname')" class="field-text is-danger">{{ errors.first('fullname') }}</small></label>
                                    <input data-vv-name="fullname" v-model="user.fullname" type="text" v-validate="'required'" :class="{ 'is-danger': errors.has('fullname') }">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>เบอร์โทรศัพท์ <span>*</span> <small v-if="errors.has('phone')" class="field-text is-danger">{{ errors.first('phone') }}</small></label>
                                    <input data-vv-name="phone" v-model="user.phone" type="text" v-validate="'required|numeric|min:10|max:10'" :class="{ 'is-danger': errors.has('phone') }" placeholder="ตัวเลขเท่านั้น">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="form-group col-md-6">
                                    <label>รหัสผ่าน <span>*</span> <small v-if="errors.has('password')" class="field-text is-danger">{{ errors.first('password') }}</small></label>
                                    <input data-vv-name="password" v-model="user.password" type="password" v-validate="'required|min:8'" :class="{ 'is-danger': errors.has('password') }" placeholder="ต้องมี 8 ตัวขึ้นไป">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>ยืนยันรหัสผ่าน <span>*</span> <small v-if="errors.has('confirmPassword')" class="field-text is-danger">{{ errors.first('confirmPassword') }}</small></label>
                                    <input data-vv-name="confirmPassword" v-model="user.confirmPassword" type="password" v-validate="{is:user.password}" :class="{ 'is-danger': errors.has('confirmPassword') }" placeholder="ต้องมี 8 ตัวขึ้นไป">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-12 text-center">
                                    เมื่อกด "ลงทะเบียน" ถือว่ายอมรับตาม <a class="text-danger" href="#">ข้อกำหนดการใช้งาน</a> และ <a class="text-danger" href="#">นโยบายความเป็นส่วนตัว</a>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-6 offset-md-3 text-center align-self-center">
                                    <button class="btn btn-block ml-0" type="submit">ลงทะเบียน</button>
                                </div>
                                <div class="col-md-6 offset-md-3 text-center py-3 align-self-center">หรือลงทะเบียนทาง</div>
                                <div class="col-md-6 offset-md-3 text-center align-self-center">
                                    <button class="btn btn-block ml-0 bg-primary" type="submit">facebook</button>
                                </div>
                            </div>
                        </form>

                        <div id="modal-template" v-if="$store.getters.modalOtp" @close="$store.getters.modalOtp = false">
                            <transition name="modal">
                                <div class="modal-mask">
                                <div class="modal-wrapper">
                                    <div class="modal-container">

                                    <div class="modal-body text-center">
                                        <slot name="body">
                                            ทางระบบได้ส่งรหัส OTP ไปยังหมายเลขที่คุณลงทะเบียนไว้<br/>
                                            อาจจะใช้เวลาส่งประมาณ 3 - 5 นาที<br/>
                                            <strong>รหัสอ้างอิง :</strong> {{$store.getters.otp[1]}}<br/>
                                            <input type="text" v-model="otp_code" :class="{ 'is-danger': otp_notice != '' }">
                                            <small v-if="otp_notice != ''" class="field-text is-danger">{{otp_notice}}</small>
                                        </slot>
                                    </div>

                                    <div class="modal-footer">
                                        <slot name="footer">
                                            <button class="modal-default-button" @click="confirmOTP($store.getters.otp[0],$store.getters.otp[1])">ยืนยันรหัส</button>
                                        </slot>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </transition>
                        </div>

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
    .is-danger {
        border-color: #dd0000 !important;
        color: #dd0000 !important;
    }
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: table;
        transition: opacity 0.3s ease;
    }
    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }
    .modal-container {
        width: 300px;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
        transition: all 0.3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }
    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }
    .modal-body {
        margin: 20px 0;
    }
    .modal-default-button {
        float: right;
    }
    .modal-enter {
        opacity: 0;
    }
    .modal-leave-active {
        opacity: 0;
    }
    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
</style>

<?= $this->Html->script('register/main.js', ['type' => 'module']) ?>