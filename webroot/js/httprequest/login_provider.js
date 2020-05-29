import HttpRequest from './http_request.js'

class LoginProvider extends HttpRequest {
    constructor () {
        // if want change another api : super('http://dummy.restapiexample.com/api/v1/')
        super ()
    }

    async logining (mobile, password) {
        const data = await this.create('sv-login/login', {
            mobile: mobile,
            password: password
        })
        return data
    }

    async fblogining (id, fullname, isfacebook) {
        const data = await this.create('sv-login/login', {
            id: id,
            fullname: fullname,
            isfacebook: isfacebook
        })
        return data
    }

    async correctUser (uid) {
        const data = await this.get('sv-login/onlogged', {
            uid: uid
        })
        return data
    }

    async userAuthen (authenCode) {
        const data = await this.create('login/authen-code', {
            authencode: authenCode
        })
        return data
    }
}

export default LoginProvider