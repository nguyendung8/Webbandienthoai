@extends('frontend.master')
@section('title', 'Danh sách đơn hàng')
@section('main')
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/category.css">
<style>
    .order-item {
        border: 1px solid #337AB7;
        padding: 11px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15) !important;
        margin-bottom: 10px;
        border-radius: 4px;
        font-size: 19px;
    }
    .list-item {
        margin-top: 20px;
    }
    .title {
        text-align: center;
        color: #2262e9f2;
    }
    .received-btn {
        display: flex;
        margin: auto;
        padding: 5px 12px;
        border: none;
        border-radius: 6px;
        background: #2262e9f2;
    }
    .received-btn:hover {
        opacity: 0.9;
    }
    .received-btn a {
        color: #fff !important;
    }
    .empty {
        margin-top: 30px;
        color: orange;
        text-align: center;
    }
</style>
    <div id="wrap-inner">
        @if(count($orders) >=1)
        <div class="list-item">
            <h1 class="title">My Order List</h1>
            @foreach($orders as $order)
            <div class="order-item">
                <label class="customer-name">Recipient Name: </label>
                    {{ $order->name }}
                <br>
                <label class="customer-name">Email: </label>
                {{ $order->email }}
                <br>
                <label class="customer-phone">Contact Phone: </label>
                    {{ $order->phone }}
                <br>
                <label class="customer-phone">Address: </label>
                    {{ $order->address }}
                <br>
                <label class="customer-phone">Products: </label>
                    {{ $order->total_products }}
                <br>
                <label class="customer-question">Total Price: </label>
                    <?php
                        $so = intval(str_replace(',', '', $order->total_price));
                        $so_moi = number_format($so, 0, '.', ',');
                    ?>
                    {{  $so_moi }} đ
                <br>
                <label class="customer-phone">Order Date: </label>
                {{ $order->placed_order_date }}
                <br>
                <label class="customer-phone">Order Status: </label>
                    <span style='@if($order->order_status == 'Pending Confirmation') color: red; @elseif($order->order_status == 'Confirmed') color: blue; @elseif($order->order_status == 'Shipping') color: orange; @else color: #2fd01b  @endif'>
                        {{ $order->order_status }}
                    </span>
                <br>
                @if($order->order_status == 'Shipping')
                    <button style="@if($order->order_status == 'Completed') background: #2fd01b; @endif" class="received-btn">
                        <a href="{{ asset('list-order/received/' . $order->id) }}">{{$order->order_status == 'Completed' ? 'Completed' : 'Received'}}</a>
                    </button>
                @endif
            </div>
            @endforeach
        </div>
        <div id="pagination">
            {{ $orders->links('vendor.pagination.default') }}
        </div>
        @else
        <h2 class="empty">Your order list is empty!</h2>
        @endif
    </div>
@stop
