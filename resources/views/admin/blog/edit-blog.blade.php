@extends('admin.master')

@section('title')
Edit Blog
@endsection

@section('body')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Blog</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('manage-blog') }}">Manage Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                    <h6 class="text-success">{{ Session::get('message') }}</h6>
                    <form action="{{ route('update-blog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id" value="{{ $blog->id }}">
                        <div class="form-group row">
                            <label for="category_id" class="col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <select id="category_id" name="category_id" class="form-control">
                                    <option value="">Select</option>
                                @foreach($categories as $category)
                                    <option {{ $category->id == $blog->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blog_title" class="col-md-3">Blog title</label>
                            <div class="col-md-9">
                                <input type="text" id="blog_title" value="{{ $blog->blog_title }}" name="blog_title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blog_short_description" class="col-md-3">Blog short description</label>
                            <div class="col-md-9">
                                <textarea id="blog_short_description" name="blog_short_description" class="form-control" rows="5">{{ $blog->blog_short_description }}"</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editor" class="col-md-3">Blog long description</label>
                            <div class="col-md-9">
                                <textarea id="editor" name="blog_long_description" class="form-control" rows="5">{{ $blog->blog_long_description }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="blog_image" class="col-md-3">Blog image</label>
                            <div class="col-md-9">
                                <img src="{{ asset('/') }}admin/blog-image/{{ $blog->blog_image }}" width="120px" class="border rounded" alt="">
                                <br><br>
                                <input type="file" id="blog_image" name="blog_image" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-3">Status</label>
                            <div class="col-md-9">
                                <label for="publish"><input type="radio" {{ $blog->status == 1 ? 'checked' : '' }} id="publish" value="1" name="status"> Publish</label>
                                <label for="unpublish"><input type="radio" {{ $blog->status == 0 ? 'checked' : '' }} id="unpublish"value="0"  name="status"> Unpublish</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-3">Activity</label>
                            <div class="col-md-9 p-3 border rounded">
                                <label for="hot_news"><input type="checkbox" {{ $blog->hot_news == 1 ? 'checked' : '' }} id="hot_news" name="hot_news" value="1"> Hot news </label>
                                <label for="trending_news"><input type="checkbox" {{ $blog->trending_news == 1 ? 'checked' : '' }} id="trending_news" name="trending_news" value="1"> Trending</label>
                                <label for="best_week"><input type="checkbox" {{ $blog->best_week == 1  ? 'checked' : '' }} id="best_week" name="best_week" value="1"> Best week</label>
                                <label for="featured"><input type="checkbox" {{ $blog->featured == 1  ? 'checked' : '' }} id="featured" name="featured" value="1"> Featured</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" name="btn" class="btn btn-success" value="Save blog info">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
