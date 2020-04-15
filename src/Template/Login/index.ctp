<div class="login_page_bg py-0">
    <div class="container">
        <div class="customer_login">
            <div class="row justify-content-md-center">

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div id="login-frm" class="account_form register">
                        <h2>เข้าใช้งาน</h2>
                        <form action="#" @submit.prevent="validateBeforeSubmit">
                            <div class="row pb-2">
                                <div class="col-md-10 offset-md-1">
                                    <label>เบอร์โทรศัพท์ <small v-if="errors.has('mobile')" class="field-text is-danger">{{ errors.first('mobile') }}</small></label>
                                    <input data-vv-name="mobile" v-model="login.mobile" type="text" v-validate="'required|numeric'" :class="{ 'is-danger': errors.has('mobile'), 'is-danger': $store.getters.msgLog != '' }" placeholder="ตัวเลขเท่านั้น">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-10 offset-md-1">
                                    <label>รหัสผ่าน <small v-if="errors.has('password')" class="field-text is-danger">{{ errors.first('password') }}</small></label>
                                    <input data-vv-name="password" v-model="login.password" type="password" v-validate="'required'" :class="{ 'is-danger': errors.has('password'), 'is-danger': $store.getters.msgLog != '' }">
                                </div>
                            </div>
                            <div class="row py-1" v-if="$store.getters.msgLog != ''">
                                <div class="col-12 text-center">
                                    <small class="field-text is-danger text-center">{{ $store.getters.msgLog }}</small>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-md-6 offset-md-3 text-center align-self-center">
                                    <button class="btn btn-block ml-0" type="submit">เข้าสู่ระบบ</button>
                                </div>
                                <div class="col-md-6 offset-md-3 text-center py-3 align-self-center">หรือเข้าสู่ระบบทาง</div>
                                <div class="col-md-6 offset-md-3 text-center align-self-center">
                                    <button class="btn btn-block ml-0 bg-primary" type="button">facebook</button>
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
    .is-danger {
        border-color: #dd0000 !important;
        color: #dd0000 !important;
    }
</style>
<?= $this->Html->script('login/main.js', ['type' => 'module']) ?>