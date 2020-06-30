<!--shop wrapper start-->
<div id="app-product">
    <div class="product_icon row mb-2">
        <div class="col-4 text-left">
            <i class="fa fa-boxes mr-1 text-danger"></i> <small>= สินค้ามีราคาขายส่ง</small> , <i class="fa fa-product-hunt ml-1 text-danger"></i> <small>= สินค้ามีราคาพรีออเดอร์</small>
        </div>
        <div class="col-8 text-right">
            <pagination-category></pagination-category>
        </div>
    </div>
    <div class="row no-gutters shop_wrapper mb-0">
        <div class="col-12 px-3 pt-3 pb-2">
            <h3 v-if="$store.getters.loading_category == false">{{__category}}</h3>
        </div>
        <slot v-if="!$store.getters.category_product_check">
            <article class="single_product col-lg-12 col-md-12 col-sm-1 py-5 text-center">
                <p>ขออภัย...ไม่มีรายการสินค้าอยู่ในประเภทนี้</p>
            </article>
        </slot>
        <slot v-else>
            <product-card
                v-for='product in $store.getters.category_product'
                :product = 'product'
            ></product-card>
        </slot>
        <div v-if="$store.getters.loading_category == true" class="col-12 text-center">
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
            <pagination-category></pagination-category>
        </div>
    </div>
</div>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<?= $this->Html->script('products/main.js', ['type' => 'module']) ?>