@extends('layouts.admin')

@section('pagetitle','Style')
    



@section('content')               
        <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                    <div class="row justify-content-between">
                                            <div class="col-4">
                                                <h4 class="card-title">Style List </h4>
                                            </div>
                                            <div class="col-6">
                                                    <div class="float-right"><a class="btn btn-sm  btn-primary" href="{{ url('admin/style/create') }}">Add New</a></div>
                                                
                                            </div>
                                          </div>
                                       
                             
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                 
                                                <th>Style Name</th>
                                                <th>Image</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($style as $d)
                                            <tr>
                                                
                                                <td>{{$d->name}}</td>     
                                                <td> <img class="card-img-top" width="100" height="100"
                                                     src="{{url('uploads/'.$d->filename)}}" alt="{{$d->filename}}">
                                                </div></td>                                                
                                                <td class="text-nowrap">
                                                    <a href="{{ url('admin/style') }}/{{$d->id}}/edit" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="javascript:void(0);" onclick="$(this).find('form').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                                            <form action="{{ url('admin/style') }}/{{$d->id}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>

                                    {{ $style->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
@endsection
