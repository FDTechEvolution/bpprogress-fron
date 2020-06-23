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
            let  itemInCart = JSON.parse(localStorage.getItem('__u_set_pct'))
            if(itemInCart){
                let cartPreorder = this.ispreorder(itemInCart[0].po,d7)
                // console.log(cartPreorder)
                if(cartPreorder) {
                    this.payloadToStore(d1,d2,d3,d4,d5,d6,d7,d8)
                }else{
                    this.$store.dispatch('cartTypeNotMatch')
                }
            }else{
                this.payloadToStore(d1,d2,d3,d4,d5,d6,d7,d8)
            }
        },
        ispreorder (po,d7) {
            if(d7 && po === 1 || !d7 && po === 0) {
                return true
            }else{
                return false
            }
        },
        payloadToStore (d1,d2,d3,d4,d5,d6,d7,d8) {
            let cookie_payload = {d1,d2,d3,d4,d5,d6,d7,d8}
            this.$store.dispatch('addToCart', cookie_payload)
        }
    },
    template: `<button type="button" class="button" title="เพิ่มลงตะกร้า" @click="addToCart(id,name,price,qty,img,wholesale,preorder,maxqty)">เพิ่มลงตะกร้า</button>`
}