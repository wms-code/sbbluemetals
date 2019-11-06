@extends('layouts.admin')

@section('pagetitle','Fabric Group')
    



@section('content')               
        <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                    <div class="row justify-content-between">
                                            <div class="col-4">
                                                <h4 class="card-title">Fabric Group List </h4>
                                            </div>
                                            <div class="col-6">
                                                    <div class="float-right"><a class="btn btn-sm  btn-primary" href="{{ url('admin/fabricgroup/create') }}">Add New</a></div>
                                                
                                            </div>
                                          </div>
                                       
                             
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                 
                                                <th>Fabric Group Name</th>
                                            
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rsfabricgroup as $d)
                                            <tr>
                                                
                                                <td>{{$d->name}}</td>                                               
                                                <td class="text-nowrap">
                                                    <a href="{{ url('admin/fabricgroup') }}/{{$d->id}}/edit" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="javascript:void(0);" onclick="$(this).find('form').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                                            <form action="{{ url('admin/fabricgroup') }}/{{$d->id}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>

                                    {{ $rsfabricgroup->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
@endsection
