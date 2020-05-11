<div class="row no-gutters shop_wrapper">
    <?php foreach ($products as $product) : ?>
        <div class="col-lg-3 col-md-4 col-12 ">
            <?=$this->element('Product/item',['product'=>$product])?>
        </div>
    <?php endforeach; ?>
</div>