@extends('layouts.admin')

@section('pagetitle','Edit Place')
    



@section('content')  

    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/place') }}/{{ $place->id }}" method="post" class="form-horizontal form-bordered">
                        <div class="form-body">
                        <br>
                        @csrf
                        @method('put')
                        <div class="form-group row">
                                <label class="control-label text-right col-md-3">Place ID</label>
                                <div class="col-md-6">
                                    <input type="text" name="id" readonly value="{{ $place->id }}" class="form-control">
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Place Name</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="name" maxlength="100" value="{{ $place->name }}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Place -Tamil Name</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="tamil" maxlength="100" value="{{ $place->tamil }}" class="form-control">
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
                                            <a href="{{ url('admin/place') }}" class="btn btn-inverse">Cancel</a>
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
