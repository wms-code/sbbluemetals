@extends('layouts.admin')

@section('pagetitle','Knitted Fabric Inward')
    



@section('content')               
        <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                    <div class="row justify-content-between">
                                            <div class="col-4">
                                                <h4 class="card-title">Knitted Fabric Inward </h4>
                                            </div>
                                            <div class="col-6">
                                                    <div class="float-right"><a class="btn btn-sm  btn-primary" href="{{ url('admin/knittedfabric/create') }}">Add New</a></div>
                                                
                                            </div>
                                          </div>
                                       
                             
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                 
                                                <th>Inward Number</th>
                                                <th>Inward Date</th>
                                                <th>Supplier</th>
                                                <th>Supplier Ref No</th>
                                                <th>Total Weight</th>
                                                <th>Total Amount</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rsdepartmentData['data'] as $d)
                                            <tr>
                                                
                                                <td>{{$d->inward_number}}</td>
                                                <td>{{$d->inward_date}}</td>
                                                <td>{{$d->name}}</td>
                                                <td>{{$d->reference}}</td>
                                                <td> {{  number_format((float)$d->total_weight, 3, '.', '') }}</td>                                                    
                                                <td>{{  number_format((float)$d->net_value, 2, '.', '') }}</td>
                                                <td class="text-nowrap">
                                                    <a href="{{ url('admin/knittedfabric') }}/{{$d->inwardnumber}}/edit" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="{{ url('admin/knittedfabric') }}/{{$d->inwardnumber}}/edit" data-toggle="tooltip" data-original-title="Edit-FRN"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="javascript:void(0);" onclick="$(this).find('form').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                                            <form action="{{ url('admin/knittedfabric') }}/{{$d->inward_number}}" method="post">
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
