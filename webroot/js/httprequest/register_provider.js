import HttpRequest from './http_request.js'

class RegisterProvider extends HttpRequest {
    constructor () {
        // if want change another api : super('http://dummy.restapiexample.com/api/v1/')
        super ()
    }

    async getUser () {
        const {data} = await this.get('employees')
        return data
      }

    async createUser (name,mobile,password) {
        const data = await this.create('register',{
            fullname: name,
            mobile: mobile,
            password: password
        })
        return data

    }
}

export default RegisterProvider