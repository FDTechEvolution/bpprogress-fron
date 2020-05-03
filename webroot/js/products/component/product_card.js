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
                                <a class="primary_img" :href="'products/product-details?product=' + product.id"><img :src="product.images" alt=""></a>
                                <a class="secondary_img" :href="'products/product-details?product=' + product.id"><img :src="product.images" alt=""></a>
                                <div v-if="product.special_price !== 0" class="label_product">
                                    <span class="label_sale">Sale</span>
                                </div>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                        <li class="compare"><a href="#" title="Add to Compare"><i class="ion-ios-settings-strong"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_content_inner">
                                    <h4 class="product_name"><a :href="'products/product-details?product=' + product.id">{{product.name}}</a></h4>
                                    <div v-if="product.special_price !== 0" class="price_box">
                                        <span class="old_price">{{formatNumber(product.price)}}฿</span>
                                        <span class="current_price">{{formatNumber(product.special_price)}}฿</span>
                                    </div>
                                    <div v-else class="price_box">
                                        <span class="current_price">{{formatNumber(product.price)}}฿</span>
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