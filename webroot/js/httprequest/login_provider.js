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
}

export default LoginProvider