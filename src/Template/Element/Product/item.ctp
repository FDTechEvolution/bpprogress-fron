<article class="single_product">
    <figure>

        <div class="product_thumb">
            <a class="primary_img" href="<?= SITE_URL ?>products/product-details?product=<?= $product['id'] ?>" title="<?= $product['name'] ?>" alt="<?= $product['name'] ?>">
                <img src="<?= $product['image'] ?>" alt="">
            </a>
            <div class="label_product">
                <span class="label_sale">Sale</span>
            </div>

        </div>
        <div class="product_content">
            <div class="product_content_inner">
                <h4 class="product_name"><a href="<?= SITE_URL ?>products/product-details?product=<?= $product['id'] ?>" title="<?= $product['name'] ?>" alt="<?= $product['name'] ?>"><?= iconv_substr($product['name'],0,30,'UTF-8'); ?>..</a></h4>
                <div class="price_box">
                    <?php if ($product['iswholesale'] == 'Y') { ?>
                    
                    <span class="current_price"><?=$product['wholesale_price']?></span>
                    <?php } else { ?>
                        <span class="old_price"><?= number_format($product['price']) ?></span>
                        <span class="current_price"><?= number_format($product['special_price']) ?></span>
                    <?php } ?>

                </div>
            </div>
        </div>
    </figure>
</article>