/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    var logged_user = localStorage.getItem('_u_ss_isset');
    logged_user = JSON.parse(logged_user);
    console.log(logged_user);
    if (logged_user !== null) {
        //window.location = siteUrl + 'login';
        logged_user = logged_user.data;

    }
    $.get(siteUrl + 'services/session/' + logged_user, {})
            .done(function (data) {
                console.log(data);


            });

});