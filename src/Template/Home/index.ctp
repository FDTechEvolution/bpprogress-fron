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
        <div class="tab-content">
            <div class="tab-pane fade show active" id="" role="tabpanel">
                <div class="product_carousel product_style product_column5 owl-carousel"  id="app-product">
                    <?php foreach ($lastProducts as $product):?>
                    <?=$this->element('Product/item',['product'=>$product])?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <h2>สินค้ายอดนิยม</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="" role="tabpanel">
                <div class="product_carousel product_style product_column5 owl-carousel"  id="app-product">
                    <?php foreach ($topProducts as $product):?>
                    <?=$this->element('Product/item',['product'=>$product])?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product area end-->
<?=''// $this->Html->script('products/main.js', ['type' => 'module']) ?>