import LoginProvider from '../../httprequest/login_provider.js'
const loginService = new LoginProvider

const state = {

}

const getters = {

}

const mutations = {

}

const actions = {
    async getLoginData ({commit}, user_login) {
        try {
            await loginService.logining(user_login.phone, user_login.password)
            .then((response) => {
                console.log(response)
            })
        }catch(e){
            console.log(e)
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