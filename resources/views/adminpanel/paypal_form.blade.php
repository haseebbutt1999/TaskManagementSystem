<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
{{--    @if ($message = Session::get('success'))--}}
{{--        <div class="w3-panel w3-green w3-display-container">--}}
{{--        <span onclick="this.parentElement.style.display='none'"--}}
{{--              class="w3-button w3-green w3-large w3-display-topright">&times;</span>--}}
{{--            <p>{!! $message !!}</p>--}}
{{--        </div>--}}
{{--        <?php Session::forget('success');?>--}}
{{--    @endif--}}
{{--    @if ($message = Session::get('error'))--}}
{{--        <div class="w3-panel w3-red w3-display-container">--}}
{{--        <span onclick="this.parentElement.style.display='none'"--}}
{{--              class="w3-button w3-red w3-large w3-display-topright">&times;</span>--}}
{{--            <p>{!! $message !!}</p>--}}
{{--        </div>--}}
{{--        <?php Session::forget('error');?>--}}
{{--    @endif--}}
    <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="/payment/add-funds/paypal">
        {{ csrf_field() }}
        <h2 class="w3-text-blue">Payment Form</h2>
        <p>Demo PayPal form - Integrating paypal in laravel</p>
        <p>
            <label class="w3-text-blue"><b>Enter Amount</b></label>
            <input class="w3-input form-control w3-border" name="amount" type="text"></p>
        <button class="w3-btn btn btn-primary w3-blue">Pay with PayPal</button></p>
    </form>

</div>

</body>
</html>

