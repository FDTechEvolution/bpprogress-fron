import {product_card} from './component/product_card.js'
import {product_details} from './component/product_details.js'
import {product_info} from './component/product_info.js'
import {store} from '../store/index.js'

new Vue ({
    el: '#app-product',
    store,
    components: {
        'product-card' : product_card,
        'product-details' : product_details,
        'product-info' : product_info
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
        this.$store.dispatch('getAllProducts')
        this.$store.dispatch('getNewProduct')
    }
})