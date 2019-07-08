<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{asset('js/jquery-3.4.1.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/stripe.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/stripe.css')}}">

</head>
<body>

        <form action="/charge" method="post" id="payment-form">
          <div class="form-row">
            <label for="card-element">
              Credit or debit card
            </label>
            <div id="card-element">
              <!-- A Stripe Element will be inserted here. -->
            </div>
        
            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
          </div>
        
          <button>Submit Payment</button>
        </form>
</body>
</html>