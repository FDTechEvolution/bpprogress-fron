<div id="app-product" class="product_page_bg">
    <div class="container">
        <h2>{{__category}}</h2>
        
        <product-category
            v-for='(product, index) in $store.getters.category_product'
            :product = 'product'
        ></product-category>
        <div v-if="$store.getters.loading == true" class="col-12 text-center">
            <div class="loadingio-spinner-pulse-0xjpjhx0lbxl">
                <div class="ldio-7znirwuftg4">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->Html->script('products/main.js', ['type' => 'module']) ?>