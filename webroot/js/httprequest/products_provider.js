import HttpRequest from './http_request.js'

class ProductsProvider extends HttpRequest {
    constructor () {
        super()
        // http://dummy.restapiexample.com/api/v1/
        // https://bpprogress-back.wesales.online/sv-registers/register
        // https://office.mapcii.com/api-assets/getlistasset
    }

    async getAllProducts () {
        const {data} = await this.get('sv-products/get-all-products')
        return data
    }

    async getDetailProduct (id) {
        const {data} = await this.get('sv-products/get-detail-product?product=' + id)
        return data
    }

    async getNewHomeProduct () {
        const {data} = await this.get('sv-products/get-new-products')
        return data
    }

    async getCategoryProduct (id) {
        const {data} = await this.get('sv-products/get-product-category?id=' + id)
        return data
    }

    async checkStatProduct (id) {
        const {data} = await this.get('sv-products/check-product?id=' + id)
        return data
    }

}

export default ProductsProvider