import ProductsProvider from '../../httprequest/products_provider.js'
const productService = new ProductsProvider

const state = {
    products: [],
    product_detail: [],
    product_category: [],
    product_in_cart: [],
    loading: true,
    loading_detail: true
}

const getters = {
    products: state => state.products,
    product_detail: state => state.product_detail,
    product_category: state => state.product_category,
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
    LOADING (state, status) {
        state.loading = status
    },
    LOADING_DETAIL (state, status) {
        state.loading_detail = status
    },
    ADD_TO_CART (state, items) {
        state.product_in_cart.push(items)
        localStorage.setItem('__u_set_pct', JSON.stringify(state.product_in_cart))
        // console.log(localStorage.getItem('__u_set_pct'))
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
    addToCart ({commit}, itemToAdd) {
        let found = false;
        if(localStorage.getItem('__u_set_pct')) {
            let itemInCart = []
            itemInCart = JSON.parse(localStorage.getItem('__u_set_pct'))
            let checkIndex = itemInCart.filter(item => item.d1===itemToAdd.d1)
            let isItemInCart = itemInCart.length > 0;

            if(isItemInCart === false) {
                itemInCart.push(itemToAdd)
                localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
            }else{
                itemInCart[0].d5 += itemToAdd.d5;
            }
        }else{
            console.log('!get __u_set_pct')
            let itemInCart = []
            itemInCart.push(itemToAdd)
            localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
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