@extends('backend.master')
@section('title', 'Update Product')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">Edit Product</div>
                    <div class="panel-body">
                        @include('errors.note')
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-bottom:40px">
                                <div class="col-xs-8">
                                    <div class="form-group" >
                                        <label>Product Name</label>
                                        <input required type="text" name="product_name" class="form-control" value="{{ $product->prod_name }}">
                                    </div>
                                    <div class="form-group" >
                                        <label>Category</label>
                                        <select required name="cate" class="form-control">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->cate_id }}" @if($product->prod_cate == $category->cate_id) selected  @endif>{{ $category->cate_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" >
                                        <label>Product Price</label>
                                        <input required type="number" name="price" class="form-control" value="{{ $product->prod_price }}">
                                    </div>
                                    <div class="form-group" >
                                        <label>Product Image</label>
                                        <input id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
                                        <img id="avatar" width="300px" src="{{ asset('lib/storage/app/avatar/'.$product->prod_img) }}">
                                    </div>
                                    <div class="form-group" >
                                        <label>Condition</label>
                                        <input required type="text" name="condition" class="form-control" value="{{ $product->prod_condition}}">
                                    </div>
                                    <div class="form-group" >
                                        <label>Description</label>
                                        <textarea class="ckeditor" required name="description">{{ $product->prod_description}}</textarea>
                                    </div>
                                    <div class="form-group" >
                                        <label>Featured Product</label><br>
                                        Yes: <input type="radio" name="featured" value="1" @if($product->prod_featured == 1) checked @endif>
                                        No: <input type="radio" name="featured" value="0" @if($product->prod_featured == 0) checked @endif>
                                    </div>
                                    <input type="submit" name="submit" value="Save" class="btn btn-primary">
                                    <a href="{{ asset('admin/product') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
@stop
