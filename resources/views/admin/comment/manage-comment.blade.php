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
                                    <th>Visitor Name</th>
                                    <th>Blog Title</th>
                                    <th>Short Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Visitor Name</th>
                                    <th>Blog Title</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @php($i=1 )
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $comment->first_name.' '.$comment->last_name }}</td>
                                    <td>{{ $comment->blog_title }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>
                                    @if($comment->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('delete-comment') }}" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                            var check = confirm('Are you sure?');
                                            if(check){
                                                document.getElementById('delete-form'+{{ $comment->id }}).submit();
                                            }
                                        " >Delete</a>


                                        @if($comment->status == 1)
                                            <a href="{{ route('unpublish-comment',['id'=> $comment->id]) }}" class="btn btn-sm btn-success">Unpublish</a>
                                        @else
                                            <a href="{{ route('publish-comment',['id'=> $comment->id]) }}" class="btn btn-sm btn-secondary">Publish</a>
                                        @endif

                                        <form id="delete-form{{ $comment->id }}" action="{{ route('delete-comment') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $comment->id }}">
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
