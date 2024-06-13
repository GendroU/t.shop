<!DOCTYPE html>
<html>
<head>
    <title>Stripe Checkout</title>
    
</head>
<body>
    <button id="checkout-button">Checkout</button>

    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var checkoutButton = document.getElementById('checkout-button');

        checkoutButton.addEventListener('click', function () {
            fetch('{{ route('checkout.session') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            }).then(function (response) {
                return response.json();
            }).then(function (sessionId) {
                return stripe.redirectToCheckout({ sessionId: sessionId.id });
            }).then(function (result) {
                if (result.error) {
                    alert(result.error.message);
                }
            }).catch(function (error) {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
