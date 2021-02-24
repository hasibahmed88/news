@extends('admin.master')

@section('title')
Manage Category
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
                                    <th>Category Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1 )
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_description }}</td>
                                    <td>
                                    @if($category->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit-category',['id'=>$category->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('delete-category') }}" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                        var check = confirm('Are you sure?');
                                        if(check){
                                            document.getElementById('delete-form'+{{ $category->id }}).submit();
                                        }
                                        " >Delete</a>


                                        @if($category->status == 1)
                                            <a href="{{ route('unpublish-category',['id'=> $category->id]) }}" class="btn btn-sm btn-success">Unpublish</a>
                                        @else
                                            <a href="{{ route('publish-category',['id'=> $category->id]) }}" class="btn btn-sm btn-secondary">Publish</a>
                                        @endif

                                        <form id="delete-form{{$category->id}}" action="{{ route('delete-category') }}" method="POST">
                                        @csrf
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                        </form>
                                    </td>
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
