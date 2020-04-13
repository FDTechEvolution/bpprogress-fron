import {store} from '../store/index.js'
import {th_validation} from './th_validation.js'

new Vue ({
    el: '#login-frm',
    store,
    data () {
        return {
            phone: null,
            password: null
        }
    },
    mounted () {

    },
    methods: {
        validateBeforeSubmit(e) {
            this.$validator.validateAll().then((result) => {
                if (result) {
                    // let payload = { // set to array for vuex action
                    //     phone: this.user.phone,
                    //     password: this.user.password
                    // }
                    // this.$store.dispatch('getRegisterData', payload)
                    alert('phone : ' + this.phone + 'pass : ' + this.password)
                    return;
                }
                // alert('errors!');
              });

        }
    }
})