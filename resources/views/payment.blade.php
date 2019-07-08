<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    .form{
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 id="title"></h1>
    <div class="form">
      <form style="float:right;" action="{{ route('payment.pay') }}" method="POST" >
        {{ csrf_field() }}
          <script 
                  src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
                  data-key="{{ env('STRIPE_PUB_KEY') }}"
                  data-amount="{{ 9 }}*100"
                  data-name="Easycoach"
                  data-description="Pay using Credit Card"
                  data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                  data-locale="auto"
                  data-currency="kes">
          </script>
          <input type="hidden" name="amount" value="{{900 }}">
      </form>
    </div>
  </div>
</body>
</html>