export const add_to_cart = {
    props : {
        id: String,
        name: String,
        price: Number,
        qty: Number,
        img: String,
        wholesale: Array,
        preorder: Array,
        maxqty: Number
    },
    methods: {
        addToCart (d1,d2,d3,d4,d5,d6,d7,d8) {
            let cookie_payload = {d1,d2,d3,d4,d5,d6,d7,d8}
            this.$store.dispatch('addToCart', cookie_payload)
            // this.$cookies.set('product', id)
            // console.log($cookies.get('product'))
        }
    },
    template: `<button type="button" class="button" title="เพิ่มลงตะกร้า" @click="addToCart(id,name,price,qty,img,wholesale,preorder,maxqty)">เพิ่มลงตะกร้า</button>`
}