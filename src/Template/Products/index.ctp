<!--shop wrapper start-->
<div id="app-product">
    <div class="product_icon row mb-2">
        <div class="col-4 text-left">
            <i class="fa fa-boxes mr-1 text-danger"></i> <small>= สินค้ามีราคาขายส่ง</small> , <i class="fa fa-product-hunt ml-1 text-danger"></i> <small>= สินค้ามีราคาพรีออเดอร์</small>
        </div>
        <div class="col-8 text-right">
            <pagination-allproduct></pagination-allproduct>
        </div>
    </div>
    <div class="row no-gutters shop_wrapper mb-0">
        <product-card
            v-for='product in $store.getters.products'
            :product = 'product'
        ></product-card>
        <div v-if="$store.getters.loading_product == true" class="col-12 text-center">
            <div class="loadingio-spinner-pulse-0xjpjhx0lbxl">
                <div class="ldio-7znirwuftg4">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="product_icon row mt-2">
        <div class="col-4 text-left">
            <i class="fa fa-boxes mr-1 text-danger"></i> <small>= สินค้ามีราคาขายส่ง</small> , <i class="fa fa-product-hunt ml-1 text-danger"></i> <small>= สินค้ามีราคาพรีออเดอร์</small>
        </div>
        <div class="col-8 text-right">
            <pagination-allproduct></pagination-allproduct>
        </div>
    </div>
</div>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<?= $this->Html->script('products/main.js', ['type' => 'module']) ?>