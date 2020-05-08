<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>

    var order_id = '<?=$orderId?>';
    $(document).ready(function () {

        localStorage.removeItem('__u_set_pct');
        
        window.location.href = siteUrl+'cart/checkout?order='+order_id;

    });
</script>