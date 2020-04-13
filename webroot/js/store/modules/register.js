import RegisterProvider from '../../httprequest/register_provider.js'
const regService = new RegisterProvider

const state = {
    employee: []
}

const getters = {
    employee: state => state.employee
}

const mutations = {
    LOAD_PRODUCTS (state, response) {
        state.employee = response
        // console.log(state.employee)
    }
}

const actions = {
    async loadProducts ({commit}) {
        await regService.getUser()
        .then((response) => {
            commit('LOAD_PRODUCTS', response)
        })
    },
    async getRegisterData ({commit}, user_register) {
        await regService.createUser(user_register.fullname, user_register.phone, user_register.password)
        .then((response) => {
            console.log(response)
        })
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}