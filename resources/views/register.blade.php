@extends('includes.layout')

@section('content')    
                
    <div class="container">

        <div class="row">
            <div class="col-md-4" style="float: none; margin: 30px auto; text-align:center;">
                <h1>Register</h1>    
            </div>                
        </div>

        {{ Form::open(['route' => 'auth.register_form', 'class' => 'form-horizontal', 'method' => 'post']) }}
        <div class="row">
            <div class="form-group">
                <label for="first_name" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                    {{ Form::input('text', 'first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name', 'required' => 'required']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="last_name" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                    {{ Form::input('text', 'last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required' => 'required']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="email_address" class="col-sm-2 control-label">Email Address</label>
                <div class="col-sm-10">
                    {{ Form::input('text', 'email_address', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']) }}
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) }}
                </div>
            </div>

            <div class="form-group pull-right">
                <div class="col-sm-10">
                    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
        {{ Form::close() }}              
    </div>
      
@endsection

