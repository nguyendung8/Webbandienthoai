@extends('backend.master')
@section('title', 'Order List')
@section('main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .order-item {
        border: 1px solid #337AB7;
        padding: 11px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15) !important;
        margin-bottom: 10px;
        border-radius: 4px;
    }
    .close-btn {
        font-size: 21px;
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
    .detail-btn {
        background: #baab25;
        color: #fff;
        border: navajowhite;
        border-radius: 5px;
        cursor: pointer;
        padding: 5px 16px;
    }
    .detail-btn:hover {
        opacity: 0.8;
        text-decoration: none;
        color: #fff;
    }
</style>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Orders</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-6">
                <div class="panel panel-primary">
                    <div style="background: #e04135;" class="panel-heading">
                        Pending Orders
                    </div>
                    <form action="" method="post" class="panel-body">
                        @csrf
                        @foreach($wait_confirm as $order)
                        <div class="order-item">
                            <a href="{{ asset('admin/order/delete/' . $order->id) }}" onclick="return confirm('Are you sure you want to delete this order?')"><i class="fa fa-times close-btn" aria-hidden="true"></i></a>
                            <label for="">Order ID: </label>
                                {{ $order->id }}
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
                            <label class="customer-phone">Order Status: </label>
                            <span style="color: #e04135; font-weight: 700;">{{ $order->order_status }} </span>
                            <div style="display: flex; gap: 10px;">
                               <a href="{{ asset('admin/order/confirm/' . $order->id) }}" class="update-status">Confirm</a>
                               <a href="{{ asset('admin/order/detail/' . $order->id) }}" class="detail-btn">View Details</a>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-5 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Confirmed Orders
                    </div>
                    <form action="" method="post" class="panel-body">
                        @csrf
                        @foreach($confirmed as $order)
                        <div class="order-item">
                            <a href="{{ asset('admin/order/delete/' . $order->id) }}" onclick="return confirm('Are you sure you want to delete this order?')"><i class="fa fa-times close-btn" aria-hidden="true"></i></a>
                            <label for="">Order ID: </label>
                                {{ $order->id }}
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
                            <label class="customer-phone">Order Status: </label>
                             <span style="color: #337ab7; font-weight: 700;">{{ $order->order_status }} </span>
                            <div style="display: flex; gap: 10px;">
                                <a href="{{ asset('admin/order/transport/' . $order->id) }}" class="transport">Transport</a>
                                <a href="{{ asset('admin/order/detail/' . $order->id) }}" class="detail-btn">View Details</a>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-5 col-lg-6">
                <div class="panel panel-primary">
                    <div style="background: #ff9800;" class="panel-heading">
                        Orders in Transit
                    </div>
                    <form action="" method="post" class="panel-body">
                        @csrf
                        @foreach($transforming as $order)
                        <div class="order-item">
                            <a href="{{ asset('admin/order/delete/' . $order->id) }}" onclick="return confirm('Are you sure you want to delete this order?')"><i class="fa fa-times close-btn" aria-hidden="true"></i></a>
                            <label for="">Order ID: </label>
                                {{ $order->id }}
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
                            <label class="customer-phone">Order Status: </label>
                            <span style="color: #ff9800; font-weight: 700;"> {{ $order->order_status }} </span>
                            <div style="display: flex; gap: 10px;">
                                <a href="{{ asset('admin/order/detail/' . $order->id) }}" class="detail-btn">View Details</a>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-md-5 col-lg-6">
                <div class="panel panel-primary">
                    <div style="background: #62b700" class="panel-heading">
                        Completed Orders
                    </div>
                    <form action="" method="post" class="panel-body">
                        @csrf
                        @foreach($done as $order)
                        <div class="order-item">
                            <a href="{{ asset('admin/order/delete/' . $order->id) }}" onclick="return confirm('Are you sure you want to delete this order?')"><i class="fa fa-times close-btn" aria-hidden="true"></i></a>
                            <label for="">Order ID: </label>
                                {{ $order->id }}
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
                            <label class="customer-phone">Order Status: </label>
                                <span style="color: #62b700; font-weight: 700;"> {{ $order->order_status }} </span>
                            <div style="display: flex; gap: 10px;">
                                <a href="{{ asset('admin/order/detail/' . $order->id) }}" class="detail-btn">View Details</a>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
