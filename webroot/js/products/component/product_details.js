import {add_to_cart} from './add_to_cart.js'

export const product_details = {
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
    props: ['product_detail', 'product_category'],
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
                                    </div>
                                    <div v-else class="price_box">
                                        <span class="current_price">{{formatNumber(product_detail.price)}} ฿</span>
                                    </div>
                                    <div class="product_desc">
                                        <span v-html="product_detail.short_description">
                                            {{product_detail.short_description}}
                                        </span>
                                    </div>
                                    <div v-if="product_detail.qty > 0" class="product_variant quantity">
                                        <label>จำนวน</label>
                                        <input v-model="qty" min="1" :max="product_detail.qty" type="number">
                                        <add-to-cart
                                            :id = 'product_detail.id'
                                            :name = 'product_detail.name'
                                            :price = 'product_detail.price'
                                            :s_price = 'product_detail.special_price'
                                            :qty = 'qty'
                                        ></add-to-cart>
                                    </div>
                                    <div v-else class="product_variant quantity">
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