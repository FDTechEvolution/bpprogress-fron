import HttpRequest from './http_request.js'

class ProductsProvider extends HttpRequest {
    constructor () {
        super('http://dummy.restapiexample.com/api/v1/')
    }

    async getAllProducts () {
        const {data} = await this.get('employees')
        return data
    }
}

export default ProductsProvider