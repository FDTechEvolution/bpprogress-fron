export const add_to_cart = {
    methods: {
        addToCart (d1,d2,d3,d4) {
            let cookie_payload = {d1,d2,d3,d4}
            this.$store.dispatch('addToCart', cookie_payload)
            // this.$cookies.set('product', id)
            // console.log($cookies.get('product'))
        }
    },
    template: `<div class="add_to_cart">
                    <a title="Add to cart" @click="addToCart('test1','data1','data2','data3')">Add to cart</a>
                </div>`
}