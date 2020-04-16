import {store} from '../store/index.js'
import {th_validation} from './th_validation.js'

new Vue ({
    el: '#app-login',
    store,
    data () {
        return {
            login: {
                mobile: null,
                password: null
            }
        }
    },
    mounted () {

    },
    computed: {
        chkLogin () {
            // console.log(localStorage.getItem('_u_ss_isset'))
            if(this.$store.getters.userLogin == true || localStorage.hasOwnProperty('_u_ss_isset')) {
                if(localStorage.getItem('_u_ss_isset') != '') {
                    let stillUser = this.$store.dispatch('checkStillUser', localStorage.getItem('_u_ss_isset'))
                    console.log(stillUser)
                    if(stillUser === true){
                        localStorage.setItem('_u_ss_ison_t', true)
                    }else{
                        // this.$store.dispatch('logout')
                        console.log('logout')
                    }
                }
            }
            console.log(localStorage.getItem('_u_ss_isset'))
            console.log(localStorage.getItem('_u_ss_ison_t'))
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
                    // alert('phone : ' + this.phone + 'pass : ' + this.password)
                    return;
                }
                // alert('errors!');
              });

        }
    }
})