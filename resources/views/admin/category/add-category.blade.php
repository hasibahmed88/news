@extends('admin.master')

@section('title')
Add Category
@endsection

@section('body')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <h6 class="text-success">{{ Session::get('message') }}</h6>
                    <form action="{{ route('new-category') }}" method="POST">
                    @csrf
                        <div class="form-group row">
                            <label for="category_name" class="col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <input type="text" id="category_name" name="category_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_description" class="col-md-3">Category Description</label>
                            <div class="col-md-9">
                                <textarea id="category_description" name="category_description" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-3">Status</label>
                            <div class="col-md-9">
                                <label for="publish"><input type="radio" id="publish" name="status" value="1" > Publish </label>
                                <label for="unpublish"><input type="radio" id="unpublish" name="status" value="0" > Unpublish </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category-name" class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" name="btn" class="btn btn-success" value="Save category info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
