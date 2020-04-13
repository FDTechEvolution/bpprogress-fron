import register from './modules/register.js'
import login from './modules/login.js'
import products from './modules/products.js'

export const store = new Vuex.Store({
    modules: {
        register,
        login,
        products
    }
})