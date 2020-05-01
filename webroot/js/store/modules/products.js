import ProductsProvider from '../../httprequest/products_provider.js'
const productService = new ProductsProvider

const state = {
    products: [],
    newProducts: [],
    product_detail: [],
    product_category: [],
    product_push_cart: false,
    loading: true,
    loading_detail: true
}

const getters = {
    products: state => state.products,
    new_product: state => state.newProducts,
    product_detail: state => state.product_detail,
    product_category: state => state.product_category,
    product_push_cart: state => state.product_push_cart,
    loading: state => state.loading,
    loading_detail: state => state.loading_detail
}

const mutations = {
    GET_ALL_PRODUCTS (state, response) {
        state.products = response.data
        // console.log(state.products)
    },
    GET_DETAIL_PRODUCT (state, response) {
        state.product_detail = response.data
        state.product_category = response.data.product_category
        // console.log(state.product_category)
    },
    GET_NEW_PRODUCT (state, response) {
        state.newProducts = response.data
        // console.log(state.newProducts)
    },
    LOADING (state, status) {
        state.loading = status
    },
    LOADING_DETAIL (state, status) {
        state.loading_detail = status
    },
    PUSH_TO_CART (state, status) {
        state.product_push_cart = status
        state.product_push_cart = false
    }
}

const actions = {
    async getAllProducts ({commit}) {
        try{
            await productService.getAllProducts()
            .then((response) => {
                // console.log(response)
                commit('GET_ALL_PRODUCTS', response)
            })
            .finally(() => commit('LOADING', false))
        }catch(e){
            console.log(e)
        }
    },
    async getDetailProduct({commit}, id) {
        try {
            await productService.getDetailProduct(id)
            .then((response) => {
                // console.log(response)
                commit('GET_DETAIL_PRODUCT', response)
            })
            .finally(() => commit('LOADING_DETAIL', false))
        }catch(e){
            console.log(e)
        }
    },
    async getNewProduct({commit}) {
        try{
            await productService.getNewHomeProduct()
            .then((response) => {
                // console.log(response)
                commit('GET_NEW_PRODUCT', response)
            })
            .finally(() => commit('LOADING', false))
        }catch(e){
            console.log(e)
        }
    },
    addToCart ({commit}, itemToAdd) {
        // console.log(itemToAdd)
        if(localStorage.getItem('__u_set_pct')) {
            let itemInCart = []
            itemInCart = JSON.parse(localStorage.getItem('__u_set_pct'))
            let itemIndex = itemInCart.filter(item => item.d1===itemToAdd.d1)
            let isItemInCart = itemIndex.length > 0;

            if(isItemInCart === false) {
                itemInCart.push(itemToAdd)
                localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                commit('PUSH_TO_CART', true)
            }else{
                itemIndex[0].d5 = parseInt(itemIndex[0].d5) + parseInt(itemToAdd.d5)
                localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                commit('PUSH_TO_CART', true)
            }
        }else{
            // console.log('!get __u_set_pct')
            let itemInCart = []
            itemInCart.push(itemToAdd)
            localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
            commit('PUSH_TO_CART', true)
        }
        
        // Vue.prototype.$cookies.set('__u_set_pct', JSON.stringify(items))
        // console.log($cookies.get('__u_set_pct'))
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}