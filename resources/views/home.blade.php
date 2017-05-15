@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>You are logged in!</p>
                    
                    @if( \Auth::user()->hasRole('admin'))
                        <p><a href="/admin">Go to the admin section</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
