
<div class="error_page_bg">
    <div class="container">
        <div class="error_section">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="">
                        <h3>ชำระเงินด้วยบัตรเครดิตของคุณ</h3>
                        <h2>ยอดชำระ <?= number_format($order['totalamt'])?> บาท</h2>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=THB" data-sdk-integration-source="button-factory"></script>
<script>
  paypal.Buttons({
      style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'pay',
          
      },
      createOrder: function(data, actions) {
          return actions.order.create({
              purchase_units: [{
                  amount: {
                      value: '<?=$order['totalamt']?>'
                  }
              }]
          });
      },
      onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
              alert('Transaction completed by ' + details.payer.name.given_name + '!');
          });
      }
  }).render('#paypal-button-container');
</script>