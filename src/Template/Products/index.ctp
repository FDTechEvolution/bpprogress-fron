<!--shop wrapper start-->
<div id="app-product" class="row no-gutters shop_wrapper">
    <product-card
        v-for='(product, index) in $store.getters.products'
        :product = 'product'
        ></product-card>
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



<?= $this->Html->script('products/main.js', ['type' => 'module']) ?>