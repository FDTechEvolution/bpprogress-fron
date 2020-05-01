export const mini_cart = {
    props: [''],
    data () {
        return {
            productInCart: []
        }
    },
    methods: {
        formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        },
        totalPerProduct (qty, price) {
            return (qty*price).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        },
        deleteProductInCart (id) {
            this.$store.dispatch('deleteFromCart', id)
        }
    },
    computed: {
        pushCart () {
            this.$store.getters.product_push_cart
        },
        countInCart () {
            let inCart = []
            if(JSON.parse(localStorage.getItem('__u_set_pct'))) {
                inCart = JSON.parse(localStorage.getItem('__u_set_pct'))
                if(!this.$store.getters.product_push_cart) {
                    return inCart.length
                }
            }
        },
        totalPriceInCart () {
            let itemInCart = []
            if(JSON.parse(localStorage.getItem('__u_set_pct'))) {
                let totalPrice = 0
                itemInCart = JSON.parse(localStorage.getItem('__u_set_pct'))
                if(!this.$store.getters.product_push_cart) {
                    itemInCart.forEach(item => {
                        if(item.d4 !== 0) {
                            totalPrice += (item.d4*item.d5)
                        }else if(item.d4 === 0){
                            totalPrice += (item.d3*item.d5)
                        }
                    })
                }
                return totalPrice.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
            }
        }
    },
    template: `<div class="mini_cart_wrapper">
                    {{pushCart}}
                    <a href="javascript:void(0)">
                        <i class="fa fa-shopping-bag"></i>
                        <span v-if="localStorage.getItem('__u_set_pct')" class="cart_price">{{totalPriceInCart}} ฿<i class="ion-ios-arrow-down"></i></span>
                        <span v-else class="cart_price">0 ฿<i class="ion-ios-arrow-down"></i></span>
                        <span v-if="localStorage.getItem('__u_set_pct')" class="cart_count">{{countInCart}}</span>
                        <span v-else class="cart_count">0</span>
                    </a>

                    <!--mini cart-->
                    <div class="mini_cart">
                        <div v-if="localStorage.getItem('__u_set_pct')" class="mini_cart_inner">
                            <div v-for="(product, index) in JSON.parse(localStorage.getItem('__u_set_pct'))" class="cart_item">
                                <div class="cart_img">
                                    <a :href="'products/product-details?product=' + product.d1"><img :src="product.d6" alt=""></a>
                                </div>
                                <div class="cart_info">
                                    <a :href="'products/product-details?product=' + product.d1">{{product.d2}}</a>
                                    <p v-if="product.d4 !== 0">จำนวน : <span>{{product.d5}}</span> x <span> {{product.d4}} ฿</span> - <span>{{totalPerProduct(product.d5, product.d4)}} ฿</span></p>
                                    <p v-else>จำนวน : <span>{{product.d5}}</span> x <span> {{product.d3}} ฿</span> - <span>{{totalPerProduct(product.d5, product.d3)}} ฿</span></p>
                                </div>
                                <div class="cart_remove">
                                    <a title="ลบ" @click="deleteProductInCart(product.d1)"><i class="ion-android-close"></i></a>
                                </div>
                            </div>
                        </div>
                        <div v-else class="mini_cart_inner">
                            <div class="cart_item">
                                <p style="margin: 0 auto;">ไม่มีสินค้าในตะกร้า...</p>
                            </div>
                        </div>
                        <div class="mini_cart_table">
                            <div class="cart_total mt-10">
                                <span>ราคารวม : </span>
                                <span v-if="localStorage.getItem('__u_set_pct')" class="price">{{totalPriceInCart}} ฿</span>
                                <span v-else class="price">0 ฿</span>
                            </div>
                        </div>
                        <div class="mini_cart_footer">
                            <div class="cart_button">
                                <a href="cart.html">ตะกร้าสินค้า</a>
                            </div>
                        </div>
                    </div>
                    <!--mini cart end-->

                </div>`
}