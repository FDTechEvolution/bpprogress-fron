<!--product area start-->
<div class="product_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <h2>สินค้ามาใหม่</h2>

                    </div>
                    
                </div>
            </div>
        </div>
        <div id="app-product" class="row no-gutters shop_wrapper">
            <product-card
                v-for='(product, index) in $store.getters.new_product'
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

    </div>
</div>
<!--product area end-->