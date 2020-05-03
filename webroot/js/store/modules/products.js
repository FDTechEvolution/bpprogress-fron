import ProductsProvider from '../../httprequest/products_provider.js'
const productService = new ProductsProvider

const state = {
    products: [],
    newProducts: [],
    product_detail: [],
    product_category: [],
    category_product: [],
    category_product_check: true,
    product_push_cart: false,
    loading: true,
    loading_detail: true
}

const getters = {
    products: state => state.products,
    new_product: state => state.newProducts,
    product_detail: state => state.product_detail,
    product_category: state => state.product_category,
    category_product: state => state.category_product,
    category_product_check: state => state.category_product_check,
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
    GET_PRODUCT_CATEGORY (state, response) {
        state.category_product = response
        // console.log(state.category_product)
    },
    GET_PRODUCT_CATEGORY_CHECK (state, status) {
        state.category_product_check = status
        // console.log(state.category_product_check)
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
    },
    CART_PUSHED (state, status) {
        state.product_push_cart = status
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
    async getProductCategory ({commit}, id) {
        try{
            await productService.getCategoryProduct(id)
            .then((response) => {
                // console.log(response)
                if(response.status === 400) {
                    commit('GET_PRODUCT_CATEGORY_CHECK', false)
                }else if(response.status === 200) {
                    commit('GET_PRODUCT_CATEGORY', response.data)
                }
                
            })
            .finally(() => commit('LOADING', false))
        }catch(e){
            console.log(e)
        }
    },
    addToCart ({commit}, itemToAdd) {
        // console.log(itemToAdd)
        let itemInCart = []
        if(localStorage.getItem('__u_set_pct')) {
            itemInCart = JSON.parse(localStorage.getItem('__u_set_pct'))
            let itemIndex = itemInCart.filter(item => item.pr===itemToAdd.d1)
            let isItemInCart = itemIndex.length > 0;

            if(isItemInCart === false) {
                let itemToCart = []
                itemToCart = {
                    pr : itemToAdd.d1,
                    ne : itemToAdd.d2,
                    pi : itemToAdd.d3,
                    qt : itemToAdd.d4,
                    im : itemToAdd.d5
                }
                itemInCart.push(itemToCart)
                localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                commit('PUSH_TO_CART', true)
            }else{
                let newQty = parseInt(itemIndex[0].qt) + parseInt(itemToAdd.d4)
                if(itemToAdd.d6){
                    if(newQty < itemToAdd.d6[0].startqty) {
                        itemIndex[0].qt = newQty
                        localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                        commit('PUSH_TO_CART', true)
                    }else{
                        if(newQty <= itemToAdd.d6.slice(-1)[0].endqty){
                            let wholesale_price = itemToAdd.d6.find(item => item.endqty >= (parseInt(newQty)))
                            itemIndex[0].qt = newQty
                            itemIndex[0].pi = wholesale_price.price
                            localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                            commit('PUSH_TO_CART', true)
                        }else{
                            let wholesale_price = itemToAdd.d6.slice(-1)[0]
                            itemIndex[0].pi = wholesale_price.price
                            itemIndex[0].qt = newQty
                            localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                            commit('PUSH_TO_CART', true)
                        }
                    }
                }else{
                    itemIndex[0].qt = newQty
                    localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                    commit('PUSH_TO_CART', true)
                }
            }
        }else{
            let itemToCart = []
            itemToCart = {
                pr : itemToAdd.d1,
                ne : itemToAdd.d2,
                pi : itemToAdd.d3,
                qt : itemToAdd.d4,
                im : itemToAdd.d5
            }
            itemInCart.push(itemToCart)
            localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
            commit('PUSH_TO_CART', true)
        }
    },
    deleteFromCart ({commit}, id) {
        let itemInCart = []
        let itemIndex = []
        itemInCart = JSON.parse(localStorage.getItem('__u_set_pct'))
        itemIndex = itemInCart.filter(item => item.pr===id)
        let isItemInCart = itemIndex.length > 0;

        if(isItemInCart === true) {
            if(itemInCart.length === 1){
                localStorage.removeItem('__u_set_pct')
                commit('PUSH_TO_CART', true)
            }else{
                itemInCart.splice(0,1)
                localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                commit('PUSH_TO_CART', true)
            }
        }
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}