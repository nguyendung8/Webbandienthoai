@extends('backend.master')
@section('title', 'Edit Category')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Categories</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-12 col-md-5 col-lg-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Category
                        </div>
                        <div class="panel-body">
                            @include('errors.note')
                            <form role="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name:</label>
                                    <input type="text" name="category_name" class="form-control" placeholder="Category Name..." value="{{ $category->cate_name }}" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                    <a href="{{ asset('admin/category') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div><!--/.row-->
    </div>
@stop
