import ProductsProvider from '../../httprequest/products_provider.js'
const productService = new ProductsProvider

const state = {
    products: [],
    newProducts: [],
    product_detail: [],
    product_category: [],
    category_product: [],
    category_product_check: true,
    product_push_cart: false,
    loading: true,
    loading_detail: true,
    new_to_cart: null,
    modal: {
        show: false,
        header: null,
        body: null,
        footer: null
    }
}

const getters = {
    products: state => state.products,
    new_product: state => state.newProducts,
    product_detail: state => state.product_detail,
    product_category: state => state.product_category,
    category_product: state => state.category_product,
    category_product_check: state => state.category_product_check,
    product_push_cart: state => state.product_push_cart,
    loading: state => state.loading,
    loading_detail: state => state.loading_detail,
    modal: state => state.modal.show,
    header: state => state.modal.header,
    body: state => state.modal.body,
    footer: state => state.modal.footer
}

const mutations = {
    GET_ALL_PRODUCTS (state, response) {
        state.products = response.data
        // console.log(state.products)
    },
    GET_DETAIL_PRODUCT (state, response) {
        state.product_detail = response.data
        state.product_category = response.data.product_category
        // console.log(state.product_category)
    },
    GET_NEW_PRODUCT (state, response) {
        state.newProducts = response.data
        // console.log(state.newProducts)
    },
    GET_PRODUCT_CATEGORY (state, response) {
        state.category_product = response
        // console.log(state.category_product)
    },
    GET_PRODUCT_CATEGORY_CHECK (state, status) {
        state.category_product_check = status
        // console.log(state.category_product_check)
    },
    LOADING (state, status) {
        state.loading = status
    },
    LOADING_DETAIL (state, status) {
        state.loading_detail = status
    },
    PUSH_TO_CART (state, status) {
        state.product_push_cart = status
        state.product_push_cart = false
    },
    CART_PUSHED (state, status) {
        state.product_push_cart = status
    },
    PRODUCT_MODAL (state, modal) {
        state.modal.show = modal.modal_show
        state.modal.header = modal.modal_header
        state.modal.body = modal.modal_body
        state.modal.footer = modal.modal_footer
    },
    REPLACE_TO_CART (state, type) {
        state.new_to_cart = type
    }
}

const actions = {
    async getAllProducts ({commit}) {
        try{
            await productService.getAllProducts()
            .then((response) => {
                // console.log(response)
                commit('GET_ALL_PRODUCTS', response)
            })
            .finally(() => commit('LOADING', false))
        }catch(e){
            console.log(e)
        }
    },
    async getDetailProduct({commit}, id) {
        try {
            await productService.getDetailProduct(id)
            .then((response) => {
                // console.log(response)
                commit('GET_DETAIL_PRODUCT', response)
            })
            .finally(() => commit('LOADING_DETAIL', false))
        }catch(e){
            console.log(e)
        }
    },
    async getNewProduct({commit}) {
        try{
            await productService.getNewHomeProduct()
            .then((response) => {
                // console.log(response)
                commit('GET_NEW_PRODUCT', response)
            })
            .finally(() => commit('LOADING', false))
        }catch(e){
            console.log(e)
        }
    },
    async getProductCategory ({commit}, id) {
        try{
            await productService.getCategoryProduct(id)
            .then((response) => {
                // console.log(response)
                if(response.status === 400) {
                    commit('GET_PRODUCT_CATEGORY_CHECK', false)
                }else if(response.status === 200) {
                    commit('GET_PRODUCT_CATEGORY', response.data)
                }
            })
            .finally(() => commit('LOADING', false))
        }catch(e){
            console.log(e)
        }
    },
    async checkProductInCart ({commit, dispatch}, products) {
        try {
            await products.forEach((item,index) => {
                productService.checkStatProduct(item.pr)
                .then((response) => {
                    // console.log(response)
                    if(response.status === 200 && response.data.isactive === 'Y') {
                        if(item.po === 1) {
                            if(response.data.ispreorder === 'Y'){
                                return
                            }else{
                                dispatch('removeFromCart', products)
                                let modal_show = true
                                let modal_header = '<i class="fa fa-exclamation-circle text-danger"></i> รายการสินค้าในตะกร้าถูกลบแล้ว'
                                let modal_body = 'รายการสินค้า "' + response.data.name + '" ถูกลบออกไป เนื่องจากผู้ขายปิดการ พรีออเดอร์ แล้ว...'
                                let modal_footer = null
                                let modal_preorder_payload = {modal_show, modal_header, modal_body, modal_footer}
                                commit('PRODUCT_MODAL', modal_preorder_payload)
                            }
                        }else if(item.po === 0 || item.po === 2){
                            let priceInCart = item.pi
                            if(response.data.iswholesale === 'Y'){
                                response.data.wholesale_rates.forEach(wholesale => {
                                    if(item.qt > wholesale.startqty && item.qt < wholesale.endqty) {
                                        if(item.pi !== wholesale.price) {
                                            let modal_show = true
                                            let modal_header = '<i class="fa fa-exclamation-circle text-danger"></i> รายการสินค้าในตะกร้ามีการเปลี่ยนแปลง'
                                            let modal_body = 'รายการสินค้า "' + response.data.name + '" มีการเปลี่ยนแปลงด้านราคา จาก ' + priceInCart + ' -> ' + wholesale.price + ' <br>เนื่องจากผู้ขายเปิดการสั่งแบบ ราคาส่ง...'
                                            let modal_footer = null
                                            let modal_enable_wholesale_payload = {modal_show, modal_header, modal_body, modal_footer}
                                            commit('PRODUCT_MODAL', modal_enable_wholesale_payload)
                                        }

                                        item.pi = wholesale.price
                                        item.po = 2
                                        localStorage.setItem('__u_set_pct', JSON.stringify(products))
                                        commit('PUSH_TO_CART', true)
                                    }
                                })
                            }else{
                                let inPrice = (response.data.special_price === 0) ? response.data.price : response.data.special_price
                                if(item.pi < inPrice) {
                                    item.pi = inPrice
                                    item.po = 0
                                    localStorage.setItem('__u_set_pct', JSON.stringify(products))
                                    commit('PUSH_TO_CART', true)

                                    let modal_show = true
                                    let modal_header = '<i class="fa fa-exclamation-circle text-danger"></i> รายการสินค้าในตะกร้ามีการเปลี่ยนแปลง'
                                    let modal_body = 'รายการสินค้า "' + response.data.name + '" มีการเปลี่ยนแปลงด้านราคา จาก ' + priceInCart + ' -> ' + inPrice + ' <br>เนื่องจากผู้ขายปิดการสั่งแบบ ราคาส่ง...'
                                    let modal_footer = null
                                    let modal_disable_wholesale_payload = {modal_show, modal_header, modal_body, modal_footer}
                                    commit('PRODUCT_MODAL', modal_disable_wholesale_payload)
                                }
                            }
                        }
                    }else{
                        if(response.status === 404) {
                            dispatch('removeFromCart', products)
                            let modal_show = true
                            let modal_header = '<i class="fa fa-exclamation-circle text-danger"></i> รายการสินค้าในตะกร้าถูกลบแล้ว'
                            let modal_body = 'รายการสินค้า "' + response.data.name + '" ถูกลบออกไป เนื่องจากผู้ขายลบรายการสินค้าแล้ว...'
                            let modal_footer = null
                            let modal_product_delete_payload = {modal_show, modal_header, modal_body, modal_footer}
                            commit('PRODUCT_MODAL', modal_product_delete_payload)
                        }else if(response.data.isactive === 'N') {
                            dispatch('removeFromCart', products)
                            let modal_show = true
                            let modal_header = '<i class="fa fa-exclamation-circle text-danger"></i> รายการสินค้าในตะกร้าถูกลบแล้ว'
                            let modal_body = 'รายการสินค้า "' + response.data.name + '" ถูกลบออกไป เนื่องจากผู้ขายปิดการขายรายการสินค้านี้อยู่...'
                            let modal_footer = null
                            let modal_product_delete_payload = {modal_show, modal_header, modal_body, modal_footer}
                            commit('PRODUCT_MODAL', modal_product_delete_payload)
                        }
                    }
                })
            })
        }catch(e){
            console.log(e)
        }
    },
    removeFromCart({commit}, products) {
        if(products.length === 1){
            localStorage.removeItem('__u_set_pct')
            commit('PUSH_TO_CART', true)
        }else{
            products.splice(index,1)
            localStorage.setItem('__u_set_pct', JSON.stringify(products))
            commit('PUSH_TO_CART', true)
        }
    },
    addToCart ({commit}, itemToAdd) {
        // console.log(itemToAdd)
        let itemInCart = []
        if(localStorage.getItem('__u_set_pct')) {
            itemInCart = JSON.parse(localStorage.getItem('__u_set_pct'))           
            let itemIndex = itemInCart.filter(item => item.pr===itemToAdd.d1)
            let isItemInCart = itemIndex.length > 0;
            let maxQty = itemToAdd.d8

            if(isItemInCart === false) {
                let ispo = 0
                if(itemToAdd.d7){ ispo = 1 }
                else if(itemToAdd.d6 && itemToAdd.d4 >= itemToAdd.d6[0].startqty) { ispo = 2}
                let itemToCart = []
                itemToCart = {
                    pr : itemToAdd.d1,
                    ne : itemToAdd.d2,
                    pi : itemToAdd.d3,
                    qt : itemToAdd.d4,
                    im : itemToAdd.d5,
                    po : ispo
                }
                itemInCart.push(itemToCart)
                localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                commit('PUSH_TO_CART', true)
            }else{
                let newQty = parseInt(itemIndex[0].qt) + parseInt(itemToAdd.d4)
                if(newQty > maxQty) {
                    let modal_show = true
                    let modal_header = '<i class="fa fa-exclamation-circle text-danger"></i> ไม่สามารถเพิ่มสินค้าลงตะกร้าได้'
                    let modal_body = 'จำนวนสินค้าในรายการที่คุณสั่งซื้อ เกินกว่าที่มีอยู่ในสต๊อค...'
                    let modal_footer = null
                    let modal_overstock_payload = {modal_show, modal_header, modal_body, modal_footer}
                    // console.log(modal_payload)
                    commit('PRODUCT_MODAL', modal_overstock_payload)
                    // alert("จำนวนสินค้าในรายการที่คุณสั่งซื้อ เกินกว่าที่มีอยู่ในสต๊อค...")
                }else{
                    if(itemToAdd.d6){
                        if(newQty < itemToAdd.d6[0].startqty) {
                            itemIndex[0].qt = newQty
                            itemIndex[0].po = 0
                            localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                            commit('PUSH_TO_CART', true)
                        }else{
                            if(newQty <= itemToAdd.d6.slice(-1)[0].endqty){
                                let wholesale_price = itemToAdd.d6.find(item => item.endqty >= (parseInt(newQty)))
                                itemIndex[0].qt = newQty
                                itemIndex[0].pi = wholesale_price.price
                                itemIndex[0].po = 2
                                localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                                commit('PUSH_TO_CART', true)
                            }else{
                                let wholesale_price = itemToAdd.d6.slice(-1)[0]
                                itemIndex[0].pi = wholesale_price.price
                                itemIndex[0].qt = newQty
                                itemIndex[0].po = 2
                                localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                                commit('PUSH_TO_CART', true)
                            }
                        }
                    }else if(itemToAdd.d7){
                        if(newQty < itemToAdd.d7[0].startqty) {
                            itemIndex[0].qt = newQty
                            itemIndex[0].po = 1
                            localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                            commit('PUSH_TO_CART', true)
                        }else{
                            if(newQty <= itemToAdd.d7.slice(-1)[0].endqty){
                                let preorder_price = itemToAdd.d7.find(item => item.endqty >= (parseInt(newQty)))
                                itemIndex[0].qt = newQty
                                itemIndex[0].pi = preorder_price.price
                                itemIndex[0].po = 1
                                localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                                commit('PUSH_TO_CART', true)
                            }else{
                                let preorder_price = itemToAdd.d7.slice(-1)[0]
                                itemIndex[0].pi = preorder_price.price
                                itemIndex[0].qt = newQty
                                itemIndex[0].po = 1
                                localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                                commit('PUSH_TO_CART', true)
                            }
                        }
                    }else{
                        itemIndex[0].qt = newQty
                        localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                        commit('PUSH_TO_CART', true)
                    }
                }
            }
        }else{
            let ispo = 0
            if(itemToAdd.d7){ ispo = 1 }
            else if(itemToAdd.d6 && itemToAdd.d4 >= itemToAdd.d6[0].startqty) { ispo = 2}
            let itemToCart = []
            itemToCart = {
                pr : itemToAdd.d1,
                ne : itemToAdd.d2,
                pi : itemToAdd.d3,
                qt : itemToAdd.d4,
                im : itemToAdd.d5,
                po : ispo
            }
            itemInCart.push(itemToCart)
            localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
            commit('PUSH_TO_CART', true)
        }
    },
    cartTypeNotMatch ({commit}, type) {
        let typeInCart = null
        let typeToAdd = null
        let btntxt = 'แทนที่'
        if(type.typeInCart === 1) {
            typeInCart = 'ประเภทสินค้าพรีออเดอร์ <i class="fa fa-product-hunt text-danger" title="สัญลักษณ์สินค้ารายการพรีออเดอร์"></i>'
            typeToAdd = 'ประเภทสินค้าทั่วไป'
        }else{
            typeInCart = 'ประเภทสินค้าทั่วไป'
            typeToAdd = 'ประเภทสินค้าพรีออเดอร์ <i class="fa fa-product-hunt text-danger" title="สัญลักษณ์สินค้ารายการพรีออเดอร์"></i>'
        }
        let modal_show = true
        let modal_header = '<i class="fa fa-exclamation-circle text-danger"></i> ไม่สามารถเพิ่มสินค้าลงตะกร้าได้'
        let modal_body = 'ประเภทรายการสินค้าไม่ถูกต้อง เนื่องจาก...<br>สินค้าในตะกร้าสินค้าเป็น <u><strong>' + typeInCart + '</strong></u> และสินค้าที่เพิ่มเข้ามาเป็น <u><strong>' + typeToAdd + '</strong></u><br>กรุณาเลือกการสั่งซื้อแบบใดแบบหนึ่ง หรือกดปุ่ม <u>' + btntxt + '</u> เพื่อแทนที่ประเภทสินค้า<br><small class="text-danger">( โปรดระวัง!!...การแทนที่สินค้ารายการในตะกร้าจะถูกลบทั้งหมดและเพิ่มสินค้าตัวนี้แทน... )</small>'
        let modal_footer = {
            iscall : 'replaceType',
            istext : btntxt
        }

        let modal_carttype_payload = {modal_show, modal_header, modal_body, modal_footer}
        commit('PRODUCT_MODAL', modal_carttype_payload)
        commit('REPLACE_TO_CART', type)
    },
    replaceType ({commit, dispatch}) {
        localStorage.removeItem('__u_set_pct')
        commit('PUSH_TO_CART', true)
        dispatch('addToCart',state.new_to_cart)
        commit('PRODUCT_MODAL', false, null, null)
    },
    deleteFromCart ({commit}, id) {
        let itemInCart = []
        itemInCart = JSON.parse(localStorage.getItem('__u_set_pct'))

        itemInCart.forEach((item,index) => {
            if(item.pr === id) {
                if(itemInCart.length === 1){
                    localStorage.removeItem('__u_set_pct')
                    commit('PUSH_TO_CART', true)
                }else{
                    itemInCart.splice(index,1)
                    localStorage.setItem('__u_set_pct', JSON.stringify(itemInCart))
                    commit('PUSH_TO_CART', true)
                }
            }
        })
    },
    closeModal ({commit}) {
        commit('PRODUCT_MODAL', false, null, null)
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}