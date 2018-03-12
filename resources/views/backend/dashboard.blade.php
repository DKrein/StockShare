@extends('includes.layout')

@section('content')
        
        <div class="container">
                
            <div class="row">
                <div class="col-md-4" style="float: none; margin: 30px auto; text-align:center;">
                    <h1>Dashboard</h1>    
                </div>                
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary pull-right" href="{{ route('purchase.create') }}">Purchase Stock</a>
                </div>
            </div>
            
            <div class="row">
                <table class="table">
                <thead>
                  <tr>
                    <th>Company name</th>
                    <th>Share Instrument Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Investment</th>
                    <th>Certificate Number</th>
                    <th>Transaction Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @if(count($purchases) == 0)
                     <tr>
                         <td colspan="8">No purchases registered in the system.</td>
                     </tr>
                    @endif
                    @foreach($purchases as $purchase)
                        <tr>
                            <td>{{$purchase->company_name}}</td>
                            <td>{{$purchase->share_instrument_name}}</td>
                            <td>{{$purchase->price}}</td>
                            <td>{{$purchase->quantity}}</td>
                            <td>{{$purchase->total_investment}}</td>
                            <td>{{$purchase->certificate_number}}</td> 
                            <td>{{$purchase->updated_at->setTimezone(new DateTimeZone('America/New_York'))->format('Y-m-d')}}</td>
                            <td>
                                <a href="{{route('purchase.edit', $purchase)}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Edit Purchase"></i></a> 
                                <a href="{{route('purchase.destroy', $purchase)}}" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Delete Purchase"></i></a>
                            </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
                
                
            </div>
            <div class="row pull-right">
                {{ $purchases->links() }}
            </div>
        </div>
@endsection
