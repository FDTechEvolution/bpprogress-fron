import {store} from '../store/index.js'
import {th_validation} from './th_validation.js'
import {login_form} from './component/login_form_v0.1.js'

new Vue ({
    el: '#app-login',
    store,
    components: {
        'login-form' : login_form
    },
    data () {
        return {

        }
    },
    mounted () {

    },
    computed: {

    },
    methods: {
        
    }
})