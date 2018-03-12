@extends('includes.layout')

@section('content')
    
    <div class="container">

        <div class="row">
            <div class="col-md-4" style="float: none; margin: 30px auto; text-align:center;">
                <h1>Create - Purchase Share</h1>    
            </div>                
        </div>
        
        {{ Form::open(['route' => 'purchase.store', 'class' => 'form-horizontal', 'method' => 'post']) }}
        <div class="row">
            
            
            <div class="form-group">
                <label for="company_name" class="col-sm-2 control-label">Company Name</label>
                <div class="col-sm-10">
                    {{ Form::input('text', 'company_name', null, ['class' => 'form-control', 'placeholder' => 'Company Name', 'required' => 'required']) }}
                </div>
            </div>
            
            <div class="form-group">
                <label for="share_instrument_name" class="col-sm-2 control-label">Share Instrument Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="share_instrument_name" required>
                        <option value="" hidden>Select the Share Instrument Name</option>
                        <option value=".A">Class A</option>
                        <option value=".B">Class B</option>
                        <option value=".C">Class C</option>
                        <option value=".PR">Preferred</option>
                        <option value=".PR.A">Preferred A</option>
                        <option value=".PR.B">Preferred B</option>
                        <option value=".PR.C">Preferred C</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                    {{ Form::input('number', 'price', '0.00', ['class' => 'form-control calculate', 'placeholder' => 'Price', 'required' => 'required', 'min'=>'0.0000000001', 'step'=>'0.0000000001'])}}
                </div>
            </div>
            
            <div class="form-group">
                <label for="quantity" class="col-sm-2 control-label">Quantity</label>
                <div class="col-sm-10">
                    {{ Form::input('number', 'quantity', 0, ['class' => 'form-control calculate', 'placeholder' => 'Quantity', 'required' => 'required', 'min'=>'1', 'onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57']) }}
                </div>
            </div>
            
            <div class="form-group">
                <label for="total_investment" class="col-sm-2 control-label">Total Investment</label>
                <div class="col-sm-10">
                    {{ Form::input( 'number', 'total_investment', '0.00', ['class' => 'form-control', 'placeholder' => 'Total Investment', 'readonly' => 'true', 'min'=>'0.01', 'step'=>'0.01'])}}
                </div>
            </div>
            
            <div class="form-group">
                <label for="certificate_number" class="col-sm-2 control-label">Certificate Number</label>
                <div class="col-sm-10">
                    {{ Form::input( 'number', 'certificate_number', date('YmdHis').rand(1000,9999), ['class' => 'form-control', 'placeholder' => 'Certificate Number', 'readonly' => 'true', 'required' => 'required'])}}
                </div>
            </div>
            
             <div class="form-group pull-right">
                <div class="col-sm-10">
                    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                </div>
            </div>

         
        </div>
        {{ Form::close() }}
        
    </div>

@endsection

@section('after-scripts')
    <script>
        $(".calculate").change(function(){
            $price = $( "input[name*='price']" ).val();
            $quantity = $( "input[name*='quantity']" ).val();
            $total_investment = $price*$quantity;
            $( "input[name*='total_investment']" ).val($total_investment.toFixed(10));
        });
    </script>
@endsection
