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
                let cartPreorder = (d7 && itemInCart[0].po === 1 || !d7 && itemInCart[0].po === 0) ? true : false
                if(cartPreorder) {
                    this.payloadToStore(d1,d2,d3,d4,d5,d6,d7,d8)
                }else{
                    let typeInCart = (itemInCart[0].po === 1) ? 1 : (itemInCart[0].po === 0) ? 0 : null
                    let cartnotmatch_payload = {typeInCart,d1,d2,d3,d4,d5,d6,d7,d8}
                    this.$store.dispatch('cartTypeNotMatch',cartnotmatch_payload)
                }
            }else{
                this.payloadToStore(d1,d2,d3,d4,d5,d6,d7,d8)
            }
        },
        payloadToStore (d1,d2,d3,d4,d5,d6,d7,d8) {
            let cookie_payload = {d1,d2,d3,d4,d5,d6,d7,d8}
            this.$store.dispatch('addToCart', cookie_payload)
        }
    },
    template: `<button type="button" class="button" title="เพิ่มลงตะกร้า" @click="addToCart(id,name,price,qty,img,wholesale,preorder,maxqty)">เพิ่มลงตะกร้า</button>`
}