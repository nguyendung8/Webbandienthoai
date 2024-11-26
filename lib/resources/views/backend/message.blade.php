@extends('backend.master')
@section('title', 'Message List')
@section('main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .message-item {
        border: 1px solid #337AB7;
        padding: 11px;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15) !important;
        margin-bottom: 10px;
        border-radius: 4px;
    }
    .close-btn {
        font-size: 21px;
        color: #337ab7;
        float: right;
        cursor: pointer;
    }
</style>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customer Messages</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Question List
                    </div>
                    <div class="panel-body">
                        @foreach($messages as $message)
                        <div class="message-item">
                            <a href="{{ asset('admin/message/delete/' . $message->id) }}" onclick="return confirm('Are you sure you want to delete this message?')"><i class="fa fa-times close-btn" aria-hidden="true"></i></a>
                            <label class="customer-name">Customer Name: </label>
                            {{ $message->name }}
                            <br>
                            <label class="customer-phone">Contact Phone Number: </label>
                            {{ $message->phone_number }}
                            <br>
                            <label class="customer-question">Question: </label>
                            {{ $message->question }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
