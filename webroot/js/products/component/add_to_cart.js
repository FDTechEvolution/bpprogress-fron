export const add_to_cart = {
    methods: {
        addToCart (id) {
            this.$store.dispatch('addToCart', id)
            // this.$cookies.set('product', id)
            // console.log($cookies.get('product'))
        }
    },
    template: `<div class="add_to_cart">
                    <a title="Add to cart" @click="addToCart('test1')">Add to cart</a>
                </div>`
}