@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit user</div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'PUT', 'route' => ['admin.user.update', $user->id], 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}

                     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-8">
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'required' => 'required']) !!}

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Email Address', ['class' => 'col-md-4 control-label']) !!}

                        <div class="col-md-8">
                            {!! Form::text('email', $user->email, ['class' => 'form-control', 'required' => 'required'])!!}

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Roles', 'Roles', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-8">
                            {!! Form::checkbox('roles[]', '3', $user->hasRole('almighty'))!!} Almighty <br />
                            {!! Form::checkbox('roles[]', '1', $user->hasRole('admin'))!!} Admin <br />
                            {!! Form::checkbox('roles[]', '2', $user->hasRole('user'))!!} User 
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                    {!! Form::close () !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
