import {add_to_cart} from './add_to_cart.js'

export const product_details = {
    props: ['product_detail', 'product_category'],
    components: {
        'add-to-cart' : add_to_cart
    },
    data () {
        return {
            qty: 1
        }
    },
    created () {
        const queryString = window.location.search
        const urlParams = new URLSearchParams(queryString)
        const product = urlParams.get('product')
        this.$store.dispatch('getDetailProduct', product)
    },
    methods: {
        formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
    },
    computed: {
        calculatePrice() {
            let product_detail = this.$store.getters.product_detail
            if(product_detail.special_price !== 0) {
                if(product_detail.iswholesale === 'Y'){
                    if(this.qty < product_detail.wholesale_rate[0].startqty) {
                        return (parseInt(this.qty) * parseInt(product_detail.special_price))
                    }else{
                        if(this.qty <= product_detail.wholesale_rate.slice(-1)[0].endqty){
                            let wholesale_price = product_detail.wholesale_rate.find(item => item.endqty >= (parseInt(this.qty)))
                            return (parseInt(this.qty) * parseInt(wholesale_price.price))
                        }else{
                            let wholesale_price = product_detail.wholesale_rate.slice(-1)[0]
                            return (parseInt(this.qty) * parseInt(wholesale_price.price))
                        }
                    }
                }else{
                    return (parseInt(this.qty) * parseInt(product_detail.special_price))
                }
            }else{
                if(product_detail.iswholesale === 'Y'){
                    if(this.qty < product_detail.wholesale_rate[0].startqty) {
                        return (parseInt(this.qty) * parseInt(product_detail.price))
                    }else{
                        if(this.qty <= product_detail.wholesale_rate.slice(-1)[0].endqty){
                            let wholesale_price = product_detail.wholesale_rate.find(item => item.endqty >= (parseInt(this.qty)))
                            return (parseInt(this.qty) * parseInt(wholesale_price.price))
                        }else{
                            let wholesale_price = product_detail.wholesale_rate.slice(-1)[0]
                            return (parseInt(this.qty) * parseInt(wholesale_price.price))
                        }
                    }
                }else{
                    return (parseInt(this.qty) * parseInt(product_detail.price))
                }
            }
        },
        wholesalePrice() {
            let product_detail = this.$store.getters.product_detail
            if(product_detail.special_price !== 0) {
                if(product_detail.iswholesale === 'Y'){
                    if(this.qty < product_detail.wholesale_rate[0].startqty) {
                        return parseInt(product_detail.special_price)
                    }else{
                        if(this.qty <= product_detail.wholesale_rate.slice(-1)[0].endqty){
                            let wholesale_price = product_detail.wholesale_rate.find(item => item.endqty >= (parseInt(this.qty)))
                            return parseInt(wholesale_price.price)
                        }else{
                            let wholesale_price = product_detail.wholesale_rate.slice(-1)[0]
                            return parseInt(wholesale_price.price)
                        }
                    }
                }else{
                    return parseInt(product_detail.special_price)
                }
            }else{
                if(product_detail.iswholesale === 'Y'){
                    if(this.qty < product_detail.wholesale_rate[0].startqty) {
                        return parseInt(product_detail.price)
                    }else{
                        if(this.qty <= product_detail.wholesale_rate.slice(-1)[0].endqty){
                            let wholesale_price = product_detail.wholesale_rate.find(item => item.endqty >= (parseInt(this.qty)))
                            return parseInt(wholesale_price.price)
                        }else{
                            let wholesale_price = product_detail.wholesale_rate.slice(-1)[0]
                            return parseInt(wholesale_price.price)
                        }
                    }
                }else{
                    return parseInt(product_detail.price)
                }
            }
        },
        pricePerProduct() {
            let product_detail = this.$store.getters.product_detail
            if(product_detail.special_price !== 0) {
                if(product_detail.iswholesale === 'Y'){
                    if(this.qty < product_detail.wholesale_rate[0].startqty) {
                        return parseInt(product_detail.special_price)
                    }else{
                        if(this.qty <= product_detail.wholesale_rate.slice(-1)[0].endqty){
                            let wholesale_price = product_detail.wholesale_rate.find(item => item.endqty >= (parseInt(this.qty)))
                            return parseInt(wholesale_price.price)
                        }else{
                            let wholesale_price = product_detail.wholesale_rate.slice(-1)[0]
                            return parseInt(wholesale_price.price)
                        }
                    }
                }else{
                    return parseInt(product_detail.special_price)
                }
            }else{
                if(product_detail.iswholesale === 'Y'){
                    if(this.qty < product_detail.wholesale_rate[0].startqty) {
                        return parseInt(product_detail.price)
                    }else{
                        if(this.qty <= product_detail.wholesale_rate.slice(-1)[0].endqty){
                            let wholesale_price = product_detail.wholesale_rate.find(item => item.endqty >= (parseInt(this.qty)))
                            return parseInt(wholesale_price.price)
                        }else{
                            let wholesale_price = product_detail.wholesale_rate.slice(-1)[0]
                            return parseInt(wholesale_price.price)
                        }
                    }
                }else{
                    return parseInt(product_detail.price)
                }
            }
        }
    },
    template: `<div class="product_details">

                    <div v-if="$store.getters.loading_detail == true" class="col-12 text-center">
                        <div class="loadingio-spinner-pulse-0xjpjhx0lbxl">
                            <div class="ldio-7znirwuftg4">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    
                    <div v-if="$store.getters.loading_detail == false" class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="product-details-tab">
                                <div id="img-1" class="zoomWrapper single-zoom">
                                    <a href="#">
                                        <img id="zoom1" :src="product_detail.images" data-zoom-image="product_detail.images" alt="big-1">
                                    </a>
                                </div>
                                <div class="single-zoom-thumb">
                                    <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg" data-zoom-image="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg">
                                                <img src="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg" alt="zo-th-1" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg" data-zoom-image="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg">
                                                <img src="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg" alt="zo-th-1" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg" data-zoom-image="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg">
                                                <img src="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg" alt="zo-th-1" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg" data-zoom-image="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg">
                                                <img src="http://localhost/git/bpprogress-fron/webroot/img/products/product-01.jpg" alt="zo-th-1" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="product_d_right">
                                <form action="#">

                                    <h3>{{product_detail.name}}</h3>

                                    <div v-if="product_detail.special_price !== 0" class="price_box">
                                        <span class="old_price">{{formatNumber(product_detail.price)}} ฿</span>
                                        <span class="current_price">{{formatNumber(product_detail.special_price)}} ฿</span>
                                        <span> / ชิ้น</span>
                                    </div>
                                    <div v-else class="price_box">
                                        <span class="current_price">{{formatNumber(product_detail.price)}} ฿ / ชิ้น</span>
                                    </div>
                                    <div v-if="product_detail.iswholesale === 'Y'" class="mb-3">
                                        <div class="w-75" id="multiCollapseExample1">
                                            <div class="card card-body">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" scope="col">#</th>
                                                            <th class="text-center" scope="col">จำนวนสินค้า</th>
                                                            <th class="text-center" scope="col">ราคา/ชิ้น</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(rate, index) in product_detail.wholesale_rate" style="border-bottom: 1px solid #ddd;">
                                                            <td class="text-center">{{index+1}}.</td>
                                                            <td class="text-center">{{rate.startqty}} - {{rate.endqty}} ชิ้น</td>
                                                            <td class="text-center">{{rate.price}} ฿</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_desc">
                                        <span v-html="product_detail.short_description">
                                            {{product_detail.short_description}}
                                        </span>
                                    </div>
                                    <div v-if="product_detail.qty > 0" class="product_variant quantity mb-1">
                                        <label>จำนวน</label>
                                        <input v-model="qty" min="1" :max="product_detail.qty" type="number">
                                        <add-to-cart
                                            :id = 'product_detail.id'
                                            :name = 'product_detail.name'
                                            :price = 'pricePerProduct'
                                            :qty = 'qty'
                                            :img = 'product_detail.images'
                                            :wholesale = 'product_detail.wholesale_rate'
                                        ></add-to-cart>
                                    </div>
                                    <div v-if="product_detail.qty === 0" class="mb-2">
                                        <label class="text-danger">สินค้าหมด</label>
                                    </div>
                                    <div class="product_meta mb-1">
                                        <span>จำนวนสินค้าคงเหลือ : <span :class="{'text-success' : product_detail.qty >= 20, 'text-danger' : product_detail.qty <= 20}">{{formatNumber(product_detail.qty)}}</span> ชิ้น</span>
                                    </div>
                                    <div class="product_meta">
                                        <span>ประเภทสินค้า : <a href="#">{{product_category.name}}</a></span>
                                    </div>
                                </form>
                                <div class="priduct_social">
                                    <ul>
                                        <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                        <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                        <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                        <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                        <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>`
}