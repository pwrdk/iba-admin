@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        @if (session()->has('status'))
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-success">{{ session('status') }}</div>
            </div>
        @endif

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Details about {{ $user->name }}</div>
                <div class="panel-body">
                    <div class="col-md-2">ID:</div><div class="col-md-10">{{ $user->id }}</div>
                    <div class="col-md-2">Name:</div><div class="col-md-10">{{ $user->name }}</div>
    	            <div class="col-md-2">Email:</div><div class="col-md-10">{{ $user->email }}</div>
                </div>
            </div>
            <div class="panel-footer">
                <a class="btn btn-primary" href="/admin/users/{{$user->id}}/edit">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
