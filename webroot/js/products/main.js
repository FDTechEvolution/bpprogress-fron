import {product_card} from './component/product_card.js'
import {store} from '../store/index.js'

new Vue ({
    el: '#app-product',
    store,
    components: {
        'product-card' : product_card
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
        // this.$store.dispatch('getAllProducts')
        this.$store.dispatch('getAllRegister')
    }
})