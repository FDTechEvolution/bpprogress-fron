import LoginProvider from '../../httprequest/login_provider.js'
const loginService = new LoginProvider

const state = {
    msg: '',
    login: null,
    loginData: []

}

const getters = {
    msgLog: state => state.msg,
    userLogin: state => state.login,
    userOTP: state => state.loginData
}

const mutations = {
    LOGIN_MSG (state, msg) {
        state.msg = msg
    },
    LOGIN_SUCCESS (state, status) {
        state.login = status
    },
    CONFIRM_OTP (state, data) {
        state.loginData = data
        console.log(state.loginData)
    }
}

const actions = {
    async getLoginData ({commit}, user_login) {
        commit('LOGIN_SUCCESS', null)
        try {
            await loginService.logining(user_login.mobile, user_login.password)
            .then((response) => {
                // console.log(response)
                if(response.data.status === 403) {
                    commit('LOGIN_MSG', response.data.msg)
                    commit('LOGIN_SUCCESS', false)
                }

                if(response.data.status === 404) {
                    commit('CONFIRM_OTP', response.data.data)
                }

                if(response.data.status === 200) {
                    let setExp = (new Date(Date.now() + 1)).getTime()
                    let usetArray = {
                        data: response.data.data.id,
                        exp: setExp,
                        normal: (response.data.data.type == 'NORMAL')?true:'n-true'
                    }
                    localStorage.setItem('_u_ss_isset', JSON.stringify(usetArray))
                    localStorage.setItem('_u_ss_ison_t', null)
                    Vue.prototype.$cookies.set('_u_ss_isprop', response.data.data.fullname)
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
        localStorage.removeItem("_u_ss_ison_t")
        Vue.prototype.$cookies.remove('_u_ss_isprop')
    },
    async checkStillUser ({commit}, uid) {
        // console.log(uid)
        try{
            await loginService.correctUser(uid)
            .then((response) => {
                // console.log(response)
                localStorage.setItem('_u_ss_ison_t', response.data.msg)
                // return response.data.msg
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