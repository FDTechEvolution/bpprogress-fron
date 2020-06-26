import {add_to_cart} from './add_to_cart.js'

export const product_card = {
    props: ['product'],
    components: {
        'add-to-cart' : add_to_cart
    },
    data () {
        return {
            qty: 1
        }
    },
    methods: {
        formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
    },
    template: `<div class="col-lg-3 col-md-3 col-sm-1 mb-3 px-1">
                    <article class="single_product">
                        <figure>
                            <div class="product_thumb">
                                <a class="primary_img" :href="'/products/product-details?product=' + product.id"><img :src="product.image" alt=""></a>
                                <a class="secondary_img" :href="'/products/product-details?product=' + product.id"><img :src="product.image" alt=""></a>
                                <div v-if="product.isretail === 'Y'" class="label_product">
                                    <span v-if="product.special_price !== 0" class="label_sale">Sale</span>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_content_inner">
                                    <h4 class="product_name">
                                        <a :href="'/products/product-details?product=' + product.id" :title="product.name" :alt="product.name">{{product.name}}</a> 
                                        <i v-if="product.iswholesale === 'Y'" class="fa fa-boxes ml-1 text-danger" title="สินค้ามีราคาขายส่ง"></i> 
                                        <i v-if="product.ispreorder === 'Y'" class="fa fa-product-hunt ml-1 text-danger" title="สินค้ามีรายการพรีออเดอร์"></i>
                                    </h4>
                                    <div v-if="product.iswholesale === 'Y'" class="price_box">
                                        <slot v-if="product.isretail === 'Y'">
                                            <slot v-if="product.special_price !== 0">
                                                <span class="old_price">{{formatNumber(product.price)}}฿</span>
                                                <span class="current_price">{{formatNumber(product.special_price)}}฿</span>
                                            </slot>
                                            <slot v-else>
                                                <span class="current_price">{{formatNumber(product.price)}}฿</span>
                                            </slot>
                                        </slot>
                                        <slot v-else>
                                            <span class="current_price">{{product.wholesale_price}}฿</span>
                                        </slot>
                                    </div>
                                    <div v-else class="price_box">
                                        <slot v-if="product.isretail === 'Y'">
                                            <slot v-if="product.special_price !== 0">
                                                <span class="old_price">{{formatNumber(product.price)}}฿</span>
                                                <span class="current_price">{{formatNumber(product.special_price)}}฿</span>
                                            </slot>
                                            <slot v-else>
                                                <span class="current_price">{{formatNumber(product.price)}}฿</span>
                                            </slot>
                                        </slot>
                                        <slot v-else>
                                            <span class="current_price" v-if="product.ispreorder === 'Y'"><small>(สินค้าพรีออเดอร์เท่านั้น)</small></span>
                                        </slot>
                                    </div>
                                </div>
                                <div v-if="product.qty === 0" class="add_to_cart">
                                    <span class="text-danger">สินค้าหมด</span>
                                </div>
                            </div>
                        </figure>
                    </article>
                </div>`
}