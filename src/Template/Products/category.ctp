<!--shop wrapper start-->
<div class="product_icon text-right">
    <i class="fa fa-boxes mr-1 text-danger"></i> <small>= สินค้ามีราคาขายส่ง</small> , <i class="fa fa-product-hunt ml-1 text-danger"></i> <small>= สินค้ามีราคาพรีออเดอร์</small>
</div>
<div id="app-product" class="row no-gutters shop_wrapper">
    <div class="col-12 px-3 pt-3 pb-2">
        <h3 v-if="$store.getters.loading == false">{{__category}}</h3>
    </div>
    <product-card
        v-for='(product, index) in $store.getters.category_product'
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

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<?= $this->Html->script('products/main.js', ['type' => 'module']) ?>