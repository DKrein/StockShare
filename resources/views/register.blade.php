@extends('includes.layout')

@section('content')    
                
    <div class="container">

        <div class="row">
            <div class="col-md-4" style="float: none; margin: 30px auto; text-align:center;">
                <h1>Register</h1>    
            </div>                
        </div>

        {{ Form::open(['route' => 'auth.register_form', 'class' => 'form-horizontal', 'method' => 'post', 'id'=>'register']) }}
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
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password', 'required' => 'required']) }}
                </div>
            </div>

            
            <div class="form-group">
                <label for="email_address" class="col-sm-2 control-label">
                    Email Address <br>
                    <span id="add_email" class="glyphicon glyphicon-plus" style="padding-right: 46px;"></span>
                </label>
                <div class="col-sm-1">
                    Default {{ Form::radio('is_default', 1, 'selected') }}
                </div>
                <div class="col-sm-9">
                    {{ Form::input('text', 'email_address[1]', null, ['class' => 'form-control email_address', 'placeholder' => 'Email', 'required' => 'required']) }}
                </div>
            </div>
            
            <div id="email_addresses">
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

@section('after-scripts')
    <script>
        
        
        $( "#register" ).submit(function( event ) {
            var emails = [];
            $('.email_address').each(function() {
                emails.push($(this).val());
            });
            
            var uniq = emails.map((email) => {
              return {count: 1, email: email}
            }).reduce((a, b) => {
              a[b.email] = (a[b.email] || 0) + b.count
              return a
            }, {})
            var duplicates = Object.keys(uniq).filter((a) => uniq[a] > 1)
            if (duplicates.length > 0) {
                alert("The following emails are duplicated: "+duplicates.join(", "));
                event.preventDefault();
            }
        });
        
        
        var $emails_count = 2;        
        $('#add_email').click(function() {
            var $appendObj = '<div class="form-group" id="additional_email_'+$emails_count+'"> '+
                               ' <label for="email_address" class="col-sm-2 control-label"> '+
                               ' </label> '+
                               ' <div class="col-sm-1"> '+
                               '  Default <input name="is_default" type="radio" value='+$emails_count+'> '+
                               ' </div> '+
                               ' <div class="col-sm-8"> '+
                               '   <input class="form-control email_address" placeholder="Email" required="required" name="email_address['+$emails_count+']" type="text"> '+
                               ' </div> '+
                               ' <div class="col-sm-1"> '+
                               '     <span class="glyphicon glyphicon-minus" onClick="javascript:$(\'#additional_email_'+$emails_count+'\').remove(); "></span> '+
                               ' </div> '+
                            ' </div>';
            $emails_count++;
            $($appendObj).appendTo($('#email_addresses'));
        });

    </script>
@endsection

