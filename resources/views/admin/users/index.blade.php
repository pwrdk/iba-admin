@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        @if (session()->has('status'))
            <div class="col-md-10 col-md-offset-1">
                <div class="alert alert-success">{{ session('status') }}</div>
            </div>
        @endif
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All users in the database</div>
                <div class="panel-body">
                    <div class="row">
                    <div class="col-md-1"><strong>ID</strong></div>
                    <div class="col-md-4"><strong>Name</strong></div>
                    <div class="col-md-3"><strong>Email</strong></div>
                    <div class="col-md-2"><strong>Roles</strong></div>
                    <div class="col-md-1"><strong>Edit</strong></div>
                    <div class="col-md-1"><strong>Delete</strong></div>
                    </div>
                @foreach($users as $user)
                <div class="row">
    	            <div class="col-md-1">{{ $user->id }}</div>
    	            <div class="col-md-4"><a href="/admin/users/{{ $user->id }}">{{ $user->name }}</a></div>
	                <div class="col-md-3">{{ $user->email }}</div>
                    <div class="col-md-2">
                    {{ $user->roles->implode('name', ', ')}}
                    </div>
	                <div class="col-md-1"><a href="/admin/users/{{ $user->id }}/edit">Edit</a></div>
	                <div class="col-md-1">
                        @if(\Auth::user()->hasRole('almighty'))
	                	{!! Form::open([ 'method'  => 'delete', 'route' => [ 'admin.user.delete', $user->id ] ]) !!}
	                		<input type="submit" name="delete" value="Del" class="btn btn-xs btn-primary" />
	                	{!! Form::close() !!}
                        @endif
	                </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
