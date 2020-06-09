import {store} from '../store/index.js'
import {th_validation} from './th_validation.js'
import {register_form} from './component/register_form.js'

new Vue ({
    el: '#app-register',
    store,
    components: {
        'register-form' : register_form
    },
    data () {
        return {
            
        }
    },
    mounted () {
        
    },
    methods: {
        
    },
    computed: {
        
    },
    created () {
        // this.$store.dispatch('loadProducts')
    }
})