@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>
                <div class="panel-body">
                <h3>Hello {{ $user->name }}</h3>
                <p>You have these roles:</p>
                <ul class="list-group col-md-2">
                    @foreach($user->roles as $role)
                        <li class="list-group-item">{{ $role->name }}</li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
