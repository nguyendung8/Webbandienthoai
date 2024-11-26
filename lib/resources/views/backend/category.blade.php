@extends('backend.master')
@section('title', 'Product Categories')
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
                            Add Category
                        </div>
                        <div class="panel-body">
                            @include('errors.note')
                            <form role="form" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name:</label>
                                    <input type="text" name="category_name" class="form-control" placeholder="Category Name..." required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add New">
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="col-xs-12 col-md-7 col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">Category List</div>
                    <div class="panel-body">
                        <div class="bootstrap-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                      <th>Category Name</th>
                                      <th style="width:30%">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)

                                    <tr>
                                        <td>{{ $category->cate_name }}</td>
                                        <td>
                                            <a href="{{ asset('admin/category/edit/' . $category->cate_id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                            <a href="{{ asset('admin/category/delete/' . $category->cate_id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                                    @endforeach
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
    </div>
@stop
