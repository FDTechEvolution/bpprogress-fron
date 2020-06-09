import RegisterProvider from '../../httprequest/register_provider.js'
const regService = new RegisterProvider

const state = {
    employee: [],
    otp: [],
    modalOtp: false,
    msg: ''
}

const getters = {
    employee: state => state.employee,
    otp: state => state.otp,
    modalOtp: state => state.modalOtp,
    msgRegister: state => state.msg
}

const mutations = {
    LOAD_PRODUCTS (state, response) {
        state.employee = response
        // console.log(state.employee)
    },
    GET_OTP (state, response) {
        state.otp = response
        // console.log(state.otp)
    },
    MODAL_OTP (state, status) {
        state.modalOtp = status
        // console.log(state.modalOtp)
    },
    SUBMITED (state, msg) {
        state.msg = msg
        // console.log(state.submited)
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
            // console.log(response)
            if(response.data.status == 403) {
                // alert(response.data.msg)
                commit('SUBMITED', response.data.msg)
            }

            if(response.data.status == 400) {
                // alert(response.data.msg)
                commit('SUBMITED', response.data.msg)
            }

            if(response.data.status == 200) {
                commit('GET_OTP', response.data.data)
                commit('MODAL_OTP', true)
                // window.location.href = window.location.protocol + window.location.hostname + '/login'
                // console.log(response)
            }
        })
    },
    async confirmOTP ({commit}, otp) {
        await regService.otpConfirm(otp.id, otp.otp_ref, otp.otp_code)
        .then((response) => {
            if(response.data.status == 400) {
                alert(response.data.msg)
            }

            if(response.data.status == 200) {
                setTimeout("window.location.href='/login/verify/';", 0)
                // window.location.href = 'http://localhost/git/bpprogress-fron/login'
            }
        })
    },
    setNewMsg ({commit}) {
        commit('SUBMITED', '')
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
}