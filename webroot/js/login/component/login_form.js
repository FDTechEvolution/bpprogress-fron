export const login_form = {
    data () {
        return {
            login: {
                mobile: null,
                password: null
            },
            otp_code: '',
            otp_notice: '',
            submitted: false
        }
    },
    computed: {
        chkLogin () {
            if(this.$store.getters.userLogin) { //เช็คการ login ใหม่
                localStorage.setItem('_u_ss_ison_t', true) // ยืนยันการ login
                if(JSON.parse(localStorage.getItem('_u_ss_isset')).normal){ // ตรวจสอบสถานะผู้ login
                    setTimeout("window.location.href=\"home\";", 200) // ถ้าเป็น user
                }else if(JSON.parse(localStorage.getItem('_u_ss_isset')).normal === 'n-true'){
                    // ถ้าเป็น admin / seller
                }
            }else{
                this.submitted = false
            }
        }
    },
    methods: {
        validateBeforeSubmit(e) {
            this.$validator.validateAll().then((result) => {
                if (result) {
                    let payload = { // set to array for vuex action
                        mobile: this.login.mobile,
                        password: this.login.password
                    }
                    this.$store.dispatch('getLoginData', payload)
                    this.submitted = true
                    // alert('phone : ' + this.phone + 'pass : ' + this.password)
                    return;
                }
                // alert('errors!');
            });
            this.submitted = false
        },
        confirmOTP (id, otp_ref) {
            if(this.otp_code == '') {
                this.otp_notice = 'กรุณากรอกรหัส OTP'
            }else{
                let payload = {
                    id: id,
                    otp_ref: otp_ref,
                    otp_code: this.otp_code
                }
                this.$store.dispatch('confirmOTP', payload)
                this.otp_code = '',
                this.otp_notice = ''
                return
            }
        }
    },
    template: `<div class="col-lg-6 col-md-6">
                {{chkLogin}}
                    <div v-if="localStorage.getItem('_u_ss_ison_t')" class="account_form register">
                        <div class="row py-3">
                            <div class="col-md-10 offset-md-1 text-center">
                                <h2>เข้าสู่ระบบแล้ว</h2>
                                <p>กรุณารอซักครู่ . . .</p>
                            </div>
                        </div>
                    </div>
                    <div v-else class="account_form register">
                        <h2>เข้าสู่ระบบ</h2>
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
                            <div v-if="submitted" class="row pt-1">
                                <div class="col-md-6 offset-md-3 text-center align-self-center">
                                    <div class="loadingio-spinner-pulse-0xjpjhx0lbxl text-center">
                                        <div class="ldio-7znirwuftg4">
                                            <div></div>
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-else class="row pt-3">
                                <div class="col-md-6 offset-md-3 text-center align-self-center">
                                    <button class="btn btn-block ml-0" type="submit">เข้าสู่ระบบ</button>
                                </div>
                                <div class="col-md-6 offset-md-3 text-center py-3 align-self-center">หรือเข้าสู่ระบบทาง</div>
                                <div class="col-md-6 offset-md-3 text-center align-self-center">
                                    <button class="btn btn-block ml-0 bg-primary" type="button">facebook</button>
                                </div>
                            </div>
                        </form>

                        <div id="modal-template" v-if="$store.getters.userOTP[0]" @close="$store.getters.userOTP[0] = false">
                            <transition name="modal">
                                <div class="modal-mask">
                                <div class="modal-wrapper">
                                    <div class="modal-container">

                                    <div class="modal-body text-center">
                                        <slot name="body">
                                            ทางระบบได้ส่งรหัส OTP ไปยังหมายเลขที่คุณลงทะเบียนไว้<br/>
                                            กรุณายืนยันการลงทะเบียนก่อนเข้าใช้งาน<br/>
                                            <strong>รหัสอ้างอิง :</strong> {{$store.getters.userOTP[2]}}<br/>
                                            <input type="text" v-model="otp_code" :class="{ 'is-danger': otp_notice != '' }">
                                            <small v-if="otp_notice != ''" class="field-text is-danger">{{otp_notice}}</small>
                                        </slot>
                                    </div>

                                    <div class="modal-footer">
                                        <slot name="footer">
                                            <button class="modal-default-button" @click="confirmOTP($store.getters.userOTP[1],$store.getters.userOTP[2])">ยืนยันรหัส</button>
                                        </slot>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </transition>
                        </div>

                    </div>
                </div>`
}