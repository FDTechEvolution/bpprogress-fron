import {store} from '../store/index.js'
import {mini_cart} from './component/mini_cart.js'
import {login} from './component/login.js'

new Vue ({
    el: '#app-header-top',
    store,
    components: {
        'mini-cart' : mini_cart,
        'login' : login
    },
    methods: {
        
    },
    computed: {

    }
})