@extends('layouts.admin')

@section('pagetitle','Create Fabric')
    



@section('content')               
  
        <div class="row">
            <div class="col-md-8 col-md-offset-2 ">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">New </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/fabric') }}" method="post" class="form-horizontal form-bordered">
                            <div class="form-body">
                            <br>
                            @csrf
                            @method('post')
                         
                            <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Fabric Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" maxlength="50" class="form-control">
                                    </div>
                            </div>
                             

                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Fabric Group Name</label>
                                <div class="col-md-6">
                                    <select class="form-control js-example-basic-single"
                                     id='fabricgroup_code'
                                    name='fabricgroup_code'>                                
                                    @foreach($fabricgroups as $department)
                                      <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                    @endforeach
                                 </select>
                                </div>
                            </div>

 
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-3 col-md-7">
                                               
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                <a href="{{ url('admin/fabric') }}" class="btn btn-inverse">Cancel</a>
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
