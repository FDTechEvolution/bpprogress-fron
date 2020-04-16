import HttpRequest from './http_request.js'

class ProductsProvider extends HttpRequest {
    constructor () {
        super('https://bpprogress-back.wesales.online/')
        // http://dummy.restapiexample.com/api/v1/
        // https://bpprogress-back.wesales.online/sv-registers/register
        // https://office.mapcii.com/api-assets/getlistasset
    }

    async getAllProducts () {
        const {data} = await this.get('employees')
        return data
    }

    async getAllRegister () {
        const {data} = await this.get('sv-registers/register')
        return data
    }
}

export default ProductsProvider