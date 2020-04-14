import ProductsProvider from '../../httprequest/products_provider.js'
const productService = new ProductsProvider

const state = {
    products: []
}

const getters = {
    products: state => state.products
}

const mutations = {
    GET_ALL_PRODUCTS (state, response) {
        state.products = response.data
        // console.log(state.products)
    }
}

const actions = {
    async getAllProducts ({commit}) {
        try{
            await productService.getAllProducts()
            .then((response) => {
                commit('GET_ALL_PRODUCTS', response)
            })
        }catch(e){
            console.log(e)
        }
    },
    addToCart ({commit}, id) {
        Vue.prototype.$cookies.set('product', id)
        console.log($cookies.get('product'))
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}