/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $.ajax({
        type: 'GET',
        url: apiurl + 'sv-product-categories/',
        //data: formData,
        //dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {

        },
        success: function (response) {
            console.log(response);
           
        }
    });
});