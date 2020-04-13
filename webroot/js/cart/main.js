import {store} from '../store/index.js'
import {mini_cart} from './component/mini_cart.js'

new Vue ({
    el: '#app-cart',
    store,
    components: {
        'mini-cart' : mini_cart
    }
})