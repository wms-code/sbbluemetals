@extends('layouts.admin')

@section('pagetitle','Edit Stock Point')
    



@section('content')  

    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/stockpoint') }}/{{ $stockpoint->id }}" method="post" class="form-horizontal form-bordered">
                        <div class="form-body">
                        <br>
                        @csrf
                        @method('put')
                        <div class="form-group row">
                                <label class="control-label text-right col-md-3">StockPoint ID</label>
                                <div class="col-md-6">
                                    <input type="text" name="id" readonly value="{{ $stockpoint->id }}" class="form-control">
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Stock Point Name</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="name" maxlength="50" value="{{ $stockpoint->name }}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Rack</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="rack" maxlength="50" value="{{ $stockpoint->rack }}" class="form-control">
                                </div>
                            </div>
                            
                        {{--     <div class="form-group row last">
                                <label class="control-label text-right col-md-3">Country</label>
                                <div class="col-md-7">
                                    <select class="form-control">
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="offset-sm-3 col-md-7">
                                            
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                            <a href="{{ url('admin/stockpoint') }}" class="btn btn-inverse">Cancel</a>
                                        </div>
                                    </div>

                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
