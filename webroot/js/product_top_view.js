/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function tmp_product(id, name, price, spacial_price, imgPath) {
    var view_product_url = siteUrl + 'products/product-details?product=' + id;
    var html = '';
    html += '<article class="recent_product_list">';
    html += '   <figure>';
    html += '       <div class="product_thumb">';
    html += '            <a class="primary_img" href="' + view_product_url + '"><img src="' + imgPath + '" alt="' + name + '"></a>';
    html += '       </div>';
    html += '       <div class="product_content">';
    html += '           <h4><a href="' + view_product_url + '">' + name + '</a></h4>';
    html += '           <div class="product_rating">';
    html += '               <ul>';
    html += '                   <li><a href="#"><i class="ion-android-star"></i></a></li>';
    html += '                   <li><a href="#"><i class="ion-android-star"></i></a></li>';
    html += '                   <li><a href="#"><i class="ion-android-star"></i></a></li>';
    html += '                   <li><a href="#"><i class="ion-android-star"></i></a></li>';
    html += '                   <li><a href="#"><i class="ion-android-star"></i></a></li>';
    html += '               </ul>';
    html += '           </div>';
    html += '           <div class="price_box">';
    html += '               <span class="old_price">' + price + '</span>';
    html += '               <span class="current_price">' + spacial_price + '</span>';
    html += '           </div>';
    html += '       </div>';
    html += '   </figure>';
    html += '</article>';

    return html;
}


$(document).ready(function () {
    var box_top_product = $('#box-top-product');
    if (box_top_product.length > 0) {
        $.get(fullServiceUrl + 'sv-products/get-top-view-product?limit=10', {})
                .done(function (data) {
                    console.log(data);
                    $.each(data.data,function(index,product){
                        let productHtml = tmp_product(product.id,product.name,product.price,product.special_price,product.fullpath);
                        box_top_product.append(productHtml);
                    });

                });
    }


});