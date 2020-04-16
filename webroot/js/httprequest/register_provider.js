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
        const data = await this.create('sv-registers/register',{
            fullname: name,
            mobile: mobile,
            password: password
        })
        console.log(data)
        return data
    }

    async otpConfirm (id, otp_ref, otp_code) {
        const data = await this.create('sv-registers/check-otp', {
            id: id,
            otp_ref: otp_ref,
            otp_code: otp_code
        })
        return data
    }
}

export default RegisterProvider