<div id="app-product" class="product_page_bg">
    <div class="container">
        <div class="product_details_wrapper mb-55">

            <!--product details start-->
            <product-details
                :product_detail = '$store.getters.product_detail'
                :product_category = '$store.getters.product_category'
            ></product-details>
            <!--product details end-->

            <!--product info start-->
            <product-info></product-info>
            <!--product info end-->
        </div>
    </div>
</div>

<style>
    .table td, .table th {
        padding: .3rem;
    }
    .btn-sm {
        font-size: .75rem;
    }
    .font-size-7 {
        font-size: .7rem !important;
    }
</style>

<!-- <?= $this->Html->script('libs/plugins.js') ?>
<?= $this->Html->script('libs/main.js') ?> -->

<?= $this->Html->script('products/main.js', ['type' => 'module']) ?>