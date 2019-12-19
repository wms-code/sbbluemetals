@extends('layouts.admin')

@section('pagetitle','Items')
    



@section('content')               
  
        <div class="row">
            <div class="col-md-8 col-md-offset-2 ">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">New </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/item') }}" method="post" class="form-horizontal form-bordered">
                            <div class="form-body">
                            <br>
                            @csrf
                            @method('post')
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Items</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" maxlength="100" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tamil</label>
                                    <div class="col-md-6">
                                        <input type="text" name="tamil" maxlength="100" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Unit</label>
                                    <div class="col-md-6">
                                        <div class="col-md-6">
                                            <select class="form-control jssingle" id='unit_code' name='unit_code'>
                                                <option value='0'>-- Select Unit --</option>
                                                @foreach($rsdepartmentData['data'] as $department)
                                                  <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                                @endforeach
                                             </select>
                                          </div> 
                                    </div>
                                </div>

                               
                    
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-3 col-md-7">
                                               
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                <a href="{{ url('admin/item') }}" class="btn btn-inverse">Cancel</a>
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
