import LoginProvider from '../../httprequest/login_provider.js'
const loginService = new LoginProvider

const state = {
    msg: '',
    login: null,
    loginData: [],
    loginExp: null

}

const getters = {
    msgLog: state => state.msg,
    userLogin: state => state.login,
    userOTP: state => state.loginData,
    userExp: state => state.loginExp
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
    },
    LOGIN_EXP (state, status) {
        state.loginExp = status
        // console.log(state.loginExp)
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
                }else if(response.data.status === 404) {
                    commit('CONFIRM_OTP', response.data.data)
                }else if(response.data.status === 200) {
                    if(response.data.data.type === 'NORMAL') { // ถ้าเป็น user
                        // let setExp = (new Date(Date.now() + 1*24*3600*1000)).getTime() // 1 day
                        let setExp = (new Date(Date.now() + 1*48*3600*1000)).getTime() // 6 hour
                        let usetArray = {
                            data: response.data.data.id,
                            exp: setExp
                        }
                        localStorage.setItem('_u_ss_isset', JSON.stringify(usetArray))
                        localStorage.setItem('_u_ss_ison_t', null)
                        Vue.prototype.$cookies.set('_u_ss_isprop', response.data.data.fullname)
                        commit('LOGIN_SUCCESS', true)
                    }else if(response.data.data.type === 'ADMIN' || response.data.data.type === 'SELLER'){
                        let api = new LoginProvider();
                        window.location.href = api.url + 'login/authen-code?authencode=' + response.data.data.authen_code
                    }
                    // console.log(response)
                }
            })
        }catch(e){
            console.log(e)
        }
    },
    async fbLogin ({commit}, fb_login) {
        try {
            await loginService.fblogining(fb_login.id, fb_login.fullname, fb_login.isfacebook)
            .then((response) => {
                console.log(response)
            })
        }catch(e) {
            console.log(e)
        }
    },
    async logout ({commit}) {
        localStorage.removeItem("_u_ss_isset")
        localStorage.removeItem("_u_ss_ison_t")
        Vue.prototype.$cookies.remove('_u_ss_isprop')
        //setTimeout("window.location.href='/home';", 200)
        setTimeout("window.location.href='/login/verify/';", 200)
    },
    async checkStillUser ({commit}) {
        if(localStorage.getItem('_u_ss_ison_t')){
            let setExp = (new Date(Date.now())).getTime()
            let setExpNew = new Date(Date.now() + 1*6*3600*1000).getTime()
            let getExp = JSON.parse(localStorage.getItem('_u_ss_isset'))

            if(setExp > getExp.exp){
                commit('LOGIN_EXP', true)
            }else{
                let usetArray = {
                    data: getExp.data,
                    exp: setExpNew
                }
                localStorage.setItem('_u_ss_isset', JSON.stringify(usetArray))
                commit('LOGIN_EXP', false)
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