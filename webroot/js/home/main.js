import {product_card} from '../products/component/product_card.js'
import {store} from '../store/index.js'

new Vue ({
    el: '#app-home',
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
        this.$store.dispatch('getNewProducts')
    }
})