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
    .font-size-8 {
        font-size: .8rem !important;
    }
    label.preorder_check {
        cursor: pointer;
        margin: 0;
    }
    .ispreorder {
        padding-top: 10px;
        padding-bottom: 10px;
        background-color: #c5e1ff;
        border-radius: 5px;
    }
    input[type=checkbox] {
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.5); /* IE */
        -moz-transform: scale(1.5); /* FF */
        -webkit-transform: scale(1.5); /* Safari and Chrome */
        -o-transform: scale(1.5); /* Opera */
        transform: scale(1.5);
        padding: 10px;
    }
    .line-height_16 {
        line-height: 16px;
    }
</style>

<!-- <?= $this->Html->script('product_gallery/plugins.js') ?> -->
<!-- <?= $this->Html->script('product_gallery/main.js') ?> -->

<?= $this->Html->script('products/main.js', ['type' => 'module']) ?>

<?= $this->Html->script('product_view_count.js') ?>