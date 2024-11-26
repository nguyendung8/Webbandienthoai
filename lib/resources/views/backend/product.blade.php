@extends('backend.master')
@section('title', 'Product List')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Product List</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <div class="table-responsive">
                                <a href="{{ asset('admin/product/create') }}" class="btn btn-primary">Add Product</a>
                                <table class="table table-bordered" style="margin-top:20px;">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>ID</th>
                                            <th width="30%">Product Name</th>
                                            <th>Product Price</th>
                                            <th width="20%">Product Image</th>
                                            <th>Category</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product_list as $product)
                                        <tr>
                                            <td>{{ $product->prod_id }}</td>
                                            <td>{{ $product->prod_name }}</td>
                                            <td>{{ number_format($product->prod_price,0,',','.')}} VND</td>
                                            <td class="img-product">
                                                <img height="150px" src="{{ asset('lib/storage/app/avatar/'.$product->prod_img) }}">
                                            </td>
                                            <td>{{ $product->cate_name }}</td>
                                            <td>
                                                <a href="{{ asset('admin/product/edit/' . $product->prod_id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                <a onclick="return confirm('Are you sure you want to delete this product?')" href="{{ asset('admin/product/delete/' . $product->prod_id) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
    <style>
        .img-product {
            display: flex;
            justify-content: center;
        }
    </style>
@stop
