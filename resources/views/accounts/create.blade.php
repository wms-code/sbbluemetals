@extends('layouts.admin')

@section('pagetitle','Accounts')
    



@section('content')               
  
        <div class="row">
            <div class="col-md-8 col-md-offset-2 ">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Add New </h4>
                    </div>
                
                    <div class="card-body">
                        <form action="{{ url('admin/accounts') }}" method="post" class="form-horizontal form-bordered">
                            <div class="form-body">
                            <br>
                            @csrf
                            @method('post')
                            
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Accounts Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="Ac_Name" maxlength="50" class="form-control">
                                    </div>
                                </div>
                                
                             <div class="form-group row last">
                                    <label class="control-label text-right col-md-3">Under Accounts Group</label>
                                    <div class="col-md-7">
                                        <select name="group_code" class="form-control">
                                            @foreach ($accountsgroups as $item)                                                
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
                      
                                <div class="form-group row ">
                                        <label class="control-label text-right col-md-3">Sub Group</label>
                                        <div class="col-md-7">
                                            <select name="SubGroup_Code" class="form-control">
                                                @foreach ($subgroup as $unit)                                                
                                                <option value="{{ $unit->Group_Code }}">{{ $unit->Group_Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div> 

                                <div class="form-group row ">
                                        <label class="control-label text-right col-md-3">Report Group</label>
                                        <div class="col-md-7">
                                            <select name="ReportGroup" class="form-control">
                                                @foreach ($reportgroup as $unit)                                                
                                                <option value="{{ $unit->Ac_Name }}">{{ $unit->Ac_Name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div> 
 
                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Phone</label>
                                        <div class="col-md-6">
                                            <input type="text" name="Phone" maxlength="50" class="form-control">
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Mobile</label>
                                        <div class="col-md-6">
                                            <input type="text" name="Mobile" maxlength="50" class="form-control">
                                        </div>
                                </div>

                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Address</label>
                                        <div class="col-md-6">
                                            <input type="text" name="Address1" maxlength="50" class="form-control">
                                        </div>
                                </div>

                                    <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Address</label>
                                            <div class="col-md-6">
                                                <input type="text" name="Address2" maxlength="50" class="form-control">
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Address</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="Address3" maxlength="50" class="form-control">
                                                </div>
                                            </div>
                                     <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Delivery Address</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="DelAddress" maxlength="50" class="form-control">
                                                </div>
                                    </div>        
                                    <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">G.S.T. No</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="GSTNO" maxlength="50" class="form-control">
                                                    </div>
                                    </div>        
                                    <div class="form-group row last">
                                        <label class="control-label text-right col-md-3">Opn Bal</label>
                                        <div class="col-md-6">
                                            <input type="number" name="Opn_Bal" maxlength="8" class="form-control">
                                            <select name="opnbal">
                                                <option value="1">Dr</option><option value="2">Cr</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Active/In Active</label>
                                                <div class="form-check">
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" name="ActiveRadio" type="radio" checked="" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Active</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio2" name="ActiveRadio" type="radio" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">InActive</span>
                                                    </label>
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
                                                <a href="{{ url('admin/accounts') }}" class="btn btn-inverse">Cancel</a>
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
