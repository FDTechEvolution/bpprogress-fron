import {product_card} from './component/product_card.js'
import {product_details} from './component/product_details.js'
import {product_info} from './component/product_info.js'
import {product_category} from './component/product_category.js'
import {pagination_allproduct, pagination_category} from './component/pagination.js'
import {store} from '../store/index.js'

new Vue ({
    el: '#app-product',
    store,
    components: {
        'product-card' : product_card,
        'product-details' : product_details,
        'product-info' : product_info,
        'product-category' : product_category,
        'pagination-allproduct' : pagination_allproduct,
        'pagination-category' : pagination_category
    },
    data () {
        return {
            __category : null
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

        const queryString = window.location.search
        const urlParams = new URLSearchParams(queryString)
        const name = urlParams.get('title')
        this.__category = name
        const id = urlParams.get('id')
        this.$store.dispatch('getProductCategory', id)
    }
})