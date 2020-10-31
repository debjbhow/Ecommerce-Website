<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
var amt = parseFloat(window.prompt("Enter The Amount in USD:"));
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AaYwGJma1PMSfl7rtRlGf4dIz9CJk-RMH7y9IOPwxOtBlX9VLpkpluGZdwzh7pha1Ga3pUub0yYGvK_Z',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'medium',
      color: 'white',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: amt,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
        window.location.href='http://localhost/ecommerce/index.php'
      });
    }
  }, '#paypal-button');
</script>