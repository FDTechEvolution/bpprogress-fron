export const add_to_cart = {
    props : {
        id: String,
        name: String,
        price: Number,
        s_price: Number,
        qty: Number
    },
    methods: {
        addToCart (d1,d2,d3,d4,d5) {
            let cookie_payload = {d1,d2,d3,d4,d5}
            this.$store.dispatch('addToCart', cookie_payload)
            // this.$cookies.set('product', id)
            // console.log($cookies.get('product'))
        }
    },
    template: `<button type="button" class="button" title="เพิ่มลงตะกร้า" @click="addToCart(id,name,price,s_price,qty)">เพิ่มลงตะกร้า</button>`
}