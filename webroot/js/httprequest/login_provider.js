import HttpRequest from './http_request.js'

class LoginProvider extends HttpRequest {
    constructor () {
        // if want change another api : super('http://dummy.restapiexample.com/api/v1/')
        super ()
    }

    async logining (user, pass) {
        const data = await this.create('login', {
            user: user,
            pass: pass
        })
        return data
    }
}

export default LoginProvider