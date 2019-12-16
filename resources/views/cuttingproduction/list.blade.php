@extends('layouts.admin')

@section('pagetitle','Cutting Program - List')
    



@section('content')               
        <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                    <div class="row justify-content-between">
                                            <div class="col-4">
                                                <h4 class="card-title">Cutting Program</h4>
                                            </div>
                                            <div class="col-6">
                                                    <div class="float-right"><a class="btn btn-sm  btn-primary" href="{{ url('admin/cuttingproduction/create') }}">Add New</a></div>
                                                
                                            </div>
                                          </div>
                                       
                             
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                 
                                                <th>Production Number</th>
                                                <th>Production Date</th>
                                                <th>Supervisor</th>
                                                <th>Style</th>
                                                <th>Total Pcs</th>                                           
                                                <th>Remarks</th>   
                                                <th>Production</th>                                               
                                                <th class="text-nowrap">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rsdepartmentData['data'] as $d)
                                            <tr>
                                                
                                                <td>{{$d->productionnumber}}</td>
                                                <td>{{$d->production_date}}</td>
                                                <td>{{$d->accountsname}}</td>
                                                <td>{{$d->stylename}}</td>
                                                <td>{{  number_format((float)$d->total_pcs, 0, '.', '') }}</td>
                                                <td>{{$d->remarks}}</td>
                                                <td class="text-nowrap">
                                                         
                                                           <a href="{{ url('admin/fetchproduction') }}/{{$d->productionnumber}}/edit"
                                                              data-toggle="tooltip" data-original-title="Edit"> 
                                                              <i class="fa fa-pencil text-inverse m-r-10"></i> 
                                                            </a>
                                                     
                                                </td>    
                                                <td class="text-nowrap">
                                                    <a href="{{ url('admin/cuttingproduction') }}/{{$d->productionnumber}}/edit" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="javascript:void(0);" onclick="$(this).find('form').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                                    <form action="{{ url('admin/cuttingproduction') }}/{{$d->productionnumber}}" method="post">
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
