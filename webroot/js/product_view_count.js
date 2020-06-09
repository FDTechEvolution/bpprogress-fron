/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    let searchParams = new URLSearchParams(window.location.search);
    if (searchParams.has('product')) {
        let productId = searchParams.get('product');
        console.log(productId);
        $.get(fullServiceUrl+'sv-products/update-view?product='+productId, {})
                .done(function (data) {
                    // console.log(data);


                });
    }

});