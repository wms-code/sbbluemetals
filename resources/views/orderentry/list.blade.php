@extends('layouts.admin')

@section('pagetitle','Order Entry - List')
    



@section('content')               
        <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                    <div class="row justify-content-between">
                                            <div class="col-4">
                                                <h4 class="card-title">Order Entry</h4>
                                            </div>
                                            <div class="col-6">
                                                    <div class="float-right"><a class="btn btn-sm  btn-primary" href="{{ url('admin/orderentry/create') }}">Add New</a></div>
                                                
                                            </div>
                                          </div>
                                       
                             
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                 
                                                <th>Order Number</th>
                                                <th>Order Date</th>
                                                <th>Customer</th>
                                                <th>Vehicle</th>
                                                <th>Place</th>
                                                <th>Total Unit</th> 
                                                <th>Amount</th>                                           
                                                                                 
                                                <th class="text-nowrap">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rsdepartmentData['data'] as $d)
                                            <tr>
                                                
                                                <td>{{$d->ordernumber}}</td>
                                                <td>{{$d->order_date}}</td>
                                                <td>{{$d->partyname}}</td>
                                                <td>{{$d->vehiclename}}</td>
                                                <td>{{  number_format((float)$d->total_unit, 0, '.', '') }}</td>
                                                <td>{{$d->remarks}}</td>
                                                 
                                                <td class="text-nowrap">
                                                    <a href="{{ url('admin/orderentry') }}/{{$d->ordernumber}}/edit" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="javascript:void(0);" onclick="$(this).find('form').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                                    <form action="{{ url('admin/orderentry') }}/{{$d->ordernumber}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                    </form>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>

                                    {{ $rsdepartmentData['data']->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
 
@endsection
