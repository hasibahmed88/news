@extends('admin.master')

@section('title')
Manage Blog
@endsection

@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Category</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <h6 class="text-success" >{{ Session::get('message') }}</h6>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category Name</th>
                                    <th>Blog title</th>
                                    <th>Blog short des</th>
                                    <th>Status</th>
                                    <th>Blog image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $blog->category_name }}</td>
                                    <td>{{ $blog->blog_title }}</td>
                                    <td>{{ Str::limit($blog->blog_short_description, 80, '...') }}</td>
                                    <td>
                                        @if($blog->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset('/') }}admin/blog-image/{{ $blog->blog_image }}" width="100px" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('view-blog',['id'=>$blog->id]) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('edit-blog',['id'=>$blog->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                                var check = confirm('Are you sure?');
                                                if(check){
                                                    document.getElementById('delete-form'+{{ $blog->id }}).submit();
                                                }

                                            " >Delete</a>
                                    @if($blog->status == 1)
                                        <a href="#" class="btn btn-sm btn-success">Unpublish</a>
                                    @else
                                        <a href="#" class="btn btn-sm btn-secondary">Publish</a>
                                    @endif
                                    </td>
                                    <form id="delete-form{{ $blog->id }}" action="{{ route('delete-blog') }}" method="POST" >
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $blog->id }}">
                                    </form>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
