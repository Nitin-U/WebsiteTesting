//const amountElement = document.getElementById("amount")
//console.log(amountElement.value)

paypal.Buttons({
	style: {
		color: 'blue',
		shape: 'pill',
		label: 'checkout'
	},
	createOrder:function(data,actions){
		return actions.order.create({
			purchase_units:[{
				amount:{
					value: total
				}
			}]
		});
	},
	onApprove: function(data, actions) {
    // This function captures the funds from the transaction.
    return actions.order.capture().then(function(details) {
      // This function shows a transaction success message to your buyer.
      alert('Transaction completed by ' + details.payer.name.given_name);
    });
  },
	onCancel:function(data){
		window.location.href="fail.php";
	}
}).render('#paypal-payment-button');



