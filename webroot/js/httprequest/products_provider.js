import HttpRequest from './http_request.js'

class ProductsProvider extends HttpRequest {
    constructor () {
        super()
    }

    async getAllProducts () {
        const {data} = await this.get('employees')
        return data
    }
}

export default ProductsProvider