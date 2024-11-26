@extends('backend.master')
@section('title', 'Comment List')
@section('main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .comment-item {
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
    .confirm-btn {
        display: flex;
        padding: 7px 12px;
        border: 1px solid #ddd;
        width: fit-content;
        margin: auto;
        border-radius: 5px;
        background: #dc2626;
        color: #fff;
        font-size: 15px;
    }

    .confirm-btn:hover {
        text-decoration: none;
        color: #fff;
        opacity: 0.8;
    }
    .confirmed {
        color: #0ad00a;
        font-size: 15px;
    }
</style>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Review Comments</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Pending Comments List
                    </div>
                    <div class="panel-body">
                        @foreach($comment_not_confirm as $comment)
                        <div class="comment-item">
                            <a href="{{ asset('admin/comment/delete/' . $comment->com_id) }}" onclick="return confirm('Are you sure you want to delete this comment?')"><i class="fa fa-times close-btn" aria-hidden="true"></i></a>
                            <label class="customer-email">Customer ID: </label>
                            {{ $comment->user_id }}
                            <br>
                            <label class="customer-email">Customer Name: </label>
                                {{ $comment->com_name }}
                            <br>
                            <label class="customer-email">Product ID: </label>
                            {{ $comment->com_product }}
                            <br>
                            <label class="customer-phone">Comment: </label>
                                {{ $comment->com_content }}
                            <br>
                            <a class="confirm-btn" href="{{ asset('admin/comment/confirm-comment/' . $comment->com_id) }}"
                                onclick="return confirm('Are you sure you want to approve this comment?')">
                                    Approve
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-5 col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Approved Comments List
                    </div>
                    <div class="panel-body">
                        @foreach($comment_confirmed as $comment)
                        <div class="comment-item">
                            <a href="{{ asset('admin/comment/delete/' . $comment->com_id) }}" onclick="return confirm('Are you sure you want to delete this comment?')"><i class="fa fa-times close-btn" aria-hidden="true"></i></a>
                            <label class="customer-email">Customer ID: </label>
                            {{ $comment->user_id }}
                            <br>
                            <label class="customer-email">Customer Name: </label>
                                {{ $comment->com_name }}
                            <br>
                            <label class="customer-email">Product ID: </label>
                            {{ $comment->com_product }}
                            <br>
                            <label class="customer-phone">Comment: </label>
                                {{ $comment->com_content }}
                            <br>
                            <label class="customer-phone">Status: </label>
                            <span class="confirmed">
                                    Approved
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
