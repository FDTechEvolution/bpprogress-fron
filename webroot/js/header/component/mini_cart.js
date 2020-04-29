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
        }
    },
    computed: {
        productCart () {
            this.productInCart = this.$store.getters.product_in_cart
        }
    },
    template: `<div class="mini_cart_wrapper">

                    <a href="javascript:void(0)">
                        <i class="fa fa-shopping-bag"></i>
                        <span class="cart_price">$152.00 <i class="ion-ios-arrow-down"></i></span>
                        <span class="cart_count">2</span>
                    </a>

                    <!--mini cart-->
                    <div class="mini_cart">
                        <div v-if="localStorage.getItem('__u_set_pct')" class="mini_cart_inner">
                            <div v-for="(product, index) in JSON.parse(localStorage.getItem('__u_set_pct'))" class="cart_item">
                                <div class="cart_img">
                                    <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
                                </div>
                                <div class="cart_info">
                                    <a href="#">{{product.d2}}</a>
                                    <p>Qty: {{product.d5}} X <span> {{product.d3}} ฿</span></p>
                                </div>
                                <div class="cart_remove">
                                    <a href="#"><i class="ion-android-close"></i></a>
                                </div>
                            </div>
                        </div>
                        <div v-else class="mini_cart_inner">
                            <div class="cart_item">
                                <p style="margin: 0 auto;">ไม่มีสินค้าในตะกร้า...</p>
                            </div>
                        </div>
                        <div class="mini_cart_table">
                            <div class="cart_total">
                                <span>Sub total:</span>
                                <span class="price">$138.00</span>
                            </div>
                            <div class="cart_total mt-10">
                                <span>total:</span>
                                <span class="price">$138.00</span>
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