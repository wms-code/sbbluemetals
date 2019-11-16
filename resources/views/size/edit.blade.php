
@extends('layouts.admin')

@section('pagetitle','Edit Size')
    



@section('content')  

    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/size') }}/{{ $size->id }}" method="post" class="form-horizontal form-bordered">
                        <div class="form-body">
                        <br>
                        @csrf
                        @method('put')
                        <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size ID</label>
                                <div class="col-md-6">
                                    <input type="text" name="id" readonly value="{{ $size->id }}" class="form-control">
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size Name</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="name" maxlength="50" value="{{ $size->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size I</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="size1" maxlength="50" value="{{ $size->size1 }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size II</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="size2" maxlength="50" value="{{ $size->size2 }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size III</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="size3" maxlength="50" value="{{ $size->size3 }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size IV</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="size4" maxlength="50" value="{{ $size->size4 }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size V</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="size5" maxlength="50" value="{{ $size->size5 }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size VI</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="size6" maxlength="50" value="{{ $size->size6 }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size VII</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="size7" maxlength="50" value="{{ $size->size7 }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size VIII</label>
                                <div class="col-md-6">
                                    
                                    <input type="text" name="size8" maxlength="50" value="{{ $size->size8 }}" class="form-control">
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
                                            <a href="{{ url('admin/size') }}" class="btn btn-inverse">Cancel</a>
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
