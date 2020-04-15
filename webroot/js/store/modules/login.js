import LoginProvider from '../../httprequest/login_provider.js'
const loginService = new LoginProvider

const state = {
    msg: '',
    login: false

}

const getters = {
    msgLog: state => state.msg,
    userLogin: state => state.login
}

const mutations = {
    LOGIN_MSG (state, msg) {
        state.msg = msg
    },
    LOGIN_SUCCESS (state, status) {
        state.login = status
    }
}

const actions = {
    async getLoginData ({commit}, user_login) {
        try {
            await loginService.logining(user_login.mobile, user_login.password)
            .then((response) => {
                if(response.data.status == 403) {
                    commit('LOGIN_MSG', response.data.msg)
                }

                if(response.data.status == 200) {
                    localStorage.setItem('_u_ss_isset', response.data.data.id)
                    commit('LOGIN_SUCCESS', true)
                    // console.log(response)
                }
            })
        }catch(e){
            console.log(e)
        }
    },
    async logout ({commit}) {
        localStorage.removeItem("_u_ss_isset")
    }
}


export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}