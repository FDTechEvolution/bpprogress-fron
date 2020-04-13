import {store} from '../store/index.js'
import {th_validation} from './th_validation.js'

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
            }
        }
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
                    return;
                }
                // alert('errors!');
              });

        },
        // ...Vuex.mapActions([
        //     'checkFormRegister'
        // ])
    },
    computed: {
        ...Vuex.mapState({
            employee: state => state.employee
        })
    },
    created () {
        // this.$store.dispatch('loadProducts')
    }
})