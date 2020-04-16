import {store} from '../store/index.js'
import {th_validation} from './th_validation.js'

Vue.component("modal", {
    template: `<div id="modal-template">
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
                                    <button class="modal-default-button" @click="confirmOTP()">ยืนยันรหัส</button>
                                </slot>
                            </div>
                            </div>
                        </div>
                        </div>
                    </transition>
                </div>`
})

new Vue ({
    el: '#register-frm',
    store,
    data () {
        return {
            user: {
                fullname: '',
                phone: '',
                password: '',
                confirmPassword: ''
            },
            otp_code: '',
            otp_notice: ''
        }
    },
    mounted () {
        
    },
    methods: {
        validateBeforeSubmit(e) {
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
              });

        },
        testToServer () {
            console.log('in test')
            axios.post('https://bpprogress-back.wesales.online/sv-registers/register', {
                fullname: this.user.fullname,
                mobile: this.user.phone,
                password: this.user.password
            })
            .then((response) => {
                console.log(response)
            })
            .catch(e => {
                console.log(e)
            })
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
    computed: {
        ...Vuex.mapState({
            otp: state => state.otp
        })
    },
    created () {
        // this.$store.dispatch('loadProducts')
    }
})