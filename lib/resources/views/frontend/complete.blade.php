@extends('frontend.master')
@section('title', 'Cart')
@section('main')
    <link rel="stylesheet" href="css/complete.css">
    <div id="wrap-inner">
        <div id="complete">
            <p class="info">You have successfully placed an order!</p>
            <p>• Your purchase invoice has been sent to the Email address in the Customer Information section of our system.</p>
            <p>• Your product will be delivered to the address in the Customer Information section of our system within 2 to 3 days from now.</p>
            <p>• The delivery staff will contact you via Phone number 24 hours before delivery.</p>
            <p>• Headquarters: No. 51/42 - Alley 85 Ha Dinh - Thanh Xuan - Hanoi</p>
            <p>Thank you for using our company's products!</p>
        </div>
        <p class="text-right return"><a href="{{ asset('/') }}">Return to homepage</a></p>
    </div>
@stop
