@extends('backend.master')
@section('title', 'Order Details')
@section('main')
<style>
    .order-item {
        border: 1px solid #337AB7;
        padding: 11px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15) !important;
        margin-bottom: 10px;
        border-radius: 4px;
    }
    .close-btn {
        font-size: 21px !important;
        color: #f44336;
        float: right;
        cursor: pointer;
    }
    .update-status {
        background: #e04135;
        color: #fff;
        border: navajowhite;
        border-radius: 5px;
        cursor: pointer;
        padding: 5px 16px;
    }
    .transport {
        background: #337ab7;
        color: #fff;
        border: navajowhite;
        border-radius: 5px;
        cursor: pointer;
        padding: 5px 16px;
    }
    .transport:hover {
        opacity: 0.9;
        text-decoration: none;
        color: #fff;
    }
    .update-status:hover {
        opacity: 0.9;
        text-decoration: none;
        color: #fff;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order Details</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-6">
                <div class="panel panel-primary">
                    <div style=" @if($order->order_status == 'Completed') background: #62b700 @elseif($order->order_status == 'Pending Confirmation') background: #e04135 @elseif($order->order_status == 'Confirmed') background: #337ab7; @else background: #ff9800  @endif"  class="panel-heading">
                        <a href="{{ asset('admin/order') }}"><i style="color: #fff !important;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        View order details #{{ $order->id }}
                    </div>
                    <div class="panel-body">
                        <div class="order-item">
                            <a href="{{ asset('admin/order/delete/' . $order->id) }}" onclick="return confirm('Are you sure you want to delete this order?')"><i class="fa fa-times close-btn" aria-hidden="true"></i></a>
                            <label for="">Order ID: </label>
                                {{ $order->id }}
                            <br>
                            <label class="customer-name">Customer Name: </label>
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
                            <span style=" @if($order->order_status == 'Completed') color: #62b700 @elseif($order->order_status == 'Pending Confirmation') color: #e04135 @elseif($order->order_status == 'Confirmed') color: #337ab7 @else color: #ff9800  @endif; font-weight: 700;">
                                {{ $order->order_status }}
                            </span>
                            @if($order->order_status != 'Completed')
                            <div style="display: flex; gap: 10px;">
                                @if($order->order_status == 'Pending Confirmation') <a href="{{ asset('admin/order/confirm/' . $order->id) }}" class="update-status">Confirm</a> @endif
                                @if($order->order_status == 'Confirmed') <a href="{{ asset('admin/order/transport/' . $order->id) }}" class="transport">Transport</a> @endif
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
