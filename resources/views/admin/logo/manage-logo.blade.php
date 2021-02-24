@extends('admin.master')

@section('title')
Manage Logo
@endsection

@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Logo</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <h6 class="text-success" >{{ Session::get('message') }}</h6>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Logo Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach ($images as $image)
                                <tr>
                                    <td>1</td>
                                    <td><img width="150px" src="{{ asset('/') }}admin/logo-image/{{ $image->logo }}" alt=""></td>
                                    <td>
                                    @if($image->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure?');
                                            if(check){
                                                document.getElementById('delete-form'+{{ $image->id }}).submit();
                                            }
                                        " >Delete</a>
                                        @if($image->status == 1)
                                            <a href="{{ route('unpublish-logo',['id'=>$image->id]) }}" class="btn btn-success btn-sm" >Unpublish</a>
                                        @else
                                            <a href="{{ route('publish-logo',['id'=>$image->id]) }}" class="btn btn-secondary btn-sm" >Publish</a>
                                        @endif
                                        <form class="d-none" id="delete-form{{ $image->id }}" action="{{ route('delete-logo') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $image->id }}">
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
        <div class="col-12 col-lg-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Logo</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('add-logo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="status" class="">Status</label>
                            <div class="">
                                <label for="publish"><input type="radio" id="publish" name="status" value="1" > Publish </label>
                                <label for="unpublish"><input type="radio" id="unpublish" name="status" value="0" > Unpublish </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit-btn" value="Save" class="btn btn-success ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
