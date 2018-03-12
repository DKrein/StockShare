@extends('includes.layout')

@section('content')
    
    <div class="container">

        <div class="row">
            <div class="col-md-4" style="float: none; margin: 30px auto; text-align:center;">
                <h1>Edit - Purchase Share</h1>    
            </div>                
        </div>
       
        {{ Form::model($purchase, ['route' => array('purchase.update', $purchase), 'class' => 'form-horizontal', 'method' => 'put']) }}
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
                    {{ Form::select('share_instrument_name', array('' => 'Select an option', '.A' => 'Class A', '.B' => 'Class B', '.C' => 'Class C', '.PR' => 'Preferred', '.PR.A' => 'Preferred A', '.PR.B' => 'Preferred B','.PR.C' => 'Preferred C' )) }}
                </div>
            </div>
            
            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Price</label>
                <div class="col-sm-10">
                    {{ Form::number('price', null, ['class' => 'form-control calculate', 'placeholder' => 'Price', 'required' => 'required', 'min'=>'0.0000000001', 'step'=>'0.0000000001'])}}
                </div>
            </div>
            
            <div class="form-group">
                <label for="quantity" class="col-sm-2 control-label">Quantity</label>
                <div class="col-sm-10">
                    {{ Form::number('quantity', null, ['class' => 'form-control calculate', 'placeholder' => 'Quantity', 'required' => 'required', 'min'=>'1', 'onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57']) }}
                </div>
            </div>
            
            <div class="form-group">
                <label for="total_investment" class="col-sm-2 control-label">Total Investment</label>
                <div class="col-sm-10">
                    {{ Form::number( 'total_investment', null, ['class' => 'form-control', 'placeholder' => 'Total Investment', 'readonly' => 'true', 'min'=>'0.01', 'step'=>'0.01'])}}
                </div>
            </div>
            
            <div class="form-group">
                <label for="certificate_number" class="col-sm-2 control-label">Certificate Number</label>
                <div class="col-sm-10">
                    {{ Form::input( 'number', 'certificate_number', null, ['class' => 'form-control', 'placeholder' => 'Certificate Number', 'readonly' => 'true', 'required' => 'required'])}}
                </div>
            </div>
            
             <div class="form-group pull-right">
                <div class="col-sm-10">
                    {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
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
