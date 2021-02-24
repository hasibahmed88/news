@extends('admin.master')

@section('title')
Message
@endsection

@section('body')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Message</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <h6 class="text-success" >{{ Session::get('message') }}</h6>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach ($messages as $message)
                                <tr class="{{ $message->read_status == 0? 'bg-secondary text-light' : '' }} ">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ Str::limit($message->subject, 50, '...') }}</td>
                                    <td>{{ Str::limit($message->message, 100, '...') }}</td>

                                    <td>
                                    @if($message->read_status == 0)
                                        <a href="{{ route('view-message',['id'=>$message->id]) }}" class="btn btn-sm btn-primary">View</a>
                                    @else
                                        <a href="{{ route('view-message',['id'=>$message->id]) }}" class="btn btn-sm btn-secondary">View</a>
                                    @endif



                                        <a href="{{ route('delete-message') }}" class="btn btn-sm btn-danger" onclick="
                                            event.preventDefault();
                                            var check = confirm('Are you sure?');
                                            if(check){
                                                document.getElementById('delete-table'+{{ $message->id }}).submit();
                                            }
                                        " >Delete</a>
                                    </td>
                                    <form class="d-none" id="delete-table{{ $message->id }}" action="{{ route('delete-message') }}" method="POST">
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $message->id }}">
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
