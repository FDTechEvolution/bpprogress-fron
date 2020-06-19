import {store} from '../store/index.js'
import {mini_cart} from './component/mini_cart.js'
import {login} from './component/login.js'
import {modal} from '../component/modal.js'

new Vue ({
    el: '#app-header',
    store,
    components: {
        'mini-cart' : mini_cart,
        'login' : login,
        'modal' : modal
    },
    methods: {
        
    },
    computed: {

    }
})