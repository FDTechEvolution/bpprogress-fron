<div id="app-product" class="product_page_bg">
    <div class="container">
        <div class="product_details_wrapper mb-55">
            <div class="product_details">
                
                <div class="row">
                    <!--product details start-->
                    <div class="col-lg-5 col-md-6">
                        <div class="product-details-tab">
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="#">
                                    <img id="zoom1" :src="$store.getters.product_detail.images" :data-zoom-image="$store.getters.product_detail.images" alt="big-1">
                                </a>
                            </div>
                            <div class="single-zoom-thumb">
                                <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                    <slot v-for="(gallery, index) in $store.getters.product_detail.gallery">
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" :data-image="gallery.image.fullpath" :data-zoom-image="gallery.image.fullpath">
                                                <img :src="gallery.image.fullpath" alt="zo-th-1" />
                                            </a>
                                        </li>
                                    </slot>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <product-details
                        :product_detail = '$store.getters.product_detail'
                        :product_category = '$store.getters.product_category'
                    ></product-details>
                    <!--product details end-->
                </div>
            </div>

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

<?= $this->Html->script('product_gallery/plugins.js') ?>
<?= $this->Html->script('product_gallery/main.js') ?>

<?= $this->Html->script('products/main.js', ['type' => 'module']) ?>

<?= $this->Html->script('product_view_count.js') ?>