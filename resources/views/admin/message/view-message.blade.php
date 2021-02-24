@extends('admin.master')

@section('title')
View message
@endsection

@section('body')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>View Message</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('manage-message') }}">Manage message</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View message</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body">
                        <div class="form-group row">
                            <label for="blog_title" class="col-md-3">Name</label>
                            <div class="col-md-9 border rounded p-2">
                                {{ $message->name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="blog_short_description" class="col-md-3">Email</label>
                            <div class="col-md-9 p-2 border rounded">
                                {{ $message->email }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editor" class="col-md-3">Subject</label>
                            <div class="col-md-9">
                                <div class="col-md-9 p-2 border rounded">
                                    {{ $message->subject }}
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editor" class="col-md-3">Message</label>
                            <div class="col-md-9">
                                <div class="col-md-9 p-2 border rounded">
                                    {{ $message->message }}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
