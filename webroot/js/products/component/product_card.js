export const product_card = {
    props: ['name','price'],
    template: `<article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="#"><img src="assets/img/product/product1.jpg" alt=""></a>
                            <a class="secondary_img" href="#"><img src="assets/img/product/product2.jpg" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                    <li class="compare"><a href="#" title="Add to Compare"><i class="ion-ios-settings-strong"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="#">{{name}}</a></h4>
                                <div class="price_box">
                                    <span class="old_price">{{price}}</span>
                                    <span class="current_price">{{price}}</span>
                                </div>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="Add to cart">Add to cart</a>
                            </div>
                        </div>
                    </figure>
                </article>`
}