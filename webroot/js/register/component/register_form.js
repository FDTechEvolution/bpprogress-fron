export const register_form = {
    data () {
        return {
            user: {
                fullname: '',
                phone: '',
                password: '',
                confirmPassword: ''
            },
            otp_code: '',
            otp_notice: '',
            submitted: false
        }
    },
    methods: {
        validateBeforeSubmit(e) {
            this.submitted = true
            this.$validator.validateAll().then((result) => {
                if (result) {
                    let payload = { // set to array for vuex action
                        fullname: this.user.fullname,
                        phone: this.user.phone,
                        password: this.user.password
                    }
                    this.$store.dispatch('getRegisterData', payload)
                    return
                    // this.testToServer()
                }
                // alert('errors!');
                this.submitted = false
              });

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
        // ...Vuex.mapActions([
        //     'checkFormRegister'
        // ])
    },
    template: `<div class="col-lg-8 col-md-8">
                    <div class="account_form register">
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
                </div>`
}