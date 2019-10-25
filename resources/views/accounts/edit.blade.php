@extends('layouts.admin')

@section('pagetitle','Edit Accounts Master ')
    



@section('content')  

<div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('accounts') }}/{{ $accounts->Ac_Code }}" method="post" class="form-horizontal form-bordered">
                        <div class="form-body">
                        <br>
                        @csrf
                        @method('put')
                        <div class="form-group row">
                                <label class="control-label text-right col-md-3">Accounts Code</label>
                                <div class="col-md-6">
                                    <input type="text" readonly name="Ac_Code" value="{{ $accounts->Ac_Code}}" maxlength="50" class="form-control">                                   
                                </div>
                        </div>
                        <div class="form-group row">
                                <label class="control-label text-right col-md-3">Accounts Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="Ac_Name" value="{{ $accounts->Ac_Name }}" maxlength="50" class="form-control">                                   
                                </div>
                        </div>
                        <div class="form-group row last">
                                <label class="control-label text-right col-md-3">Under Accounts Group</label>
                                <div class="col-md-7">
                                    <select name="Group_Code" class="form-control">
                                        @foreach ($accgroup as $item)                                                
                                        <option value="{{ $item->Group_Code }}"
                                                {{ $item->Group_Code== $accounts->Group_Code ? 'selected' : ''}} >{{ $item->Group_Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                             
                            <div class="form-group row ">
                                    <label class="control-label text-right col-md-3">Sub Group</label>
                                    <div class="col-md-7">
                                        <select name="SubGroup_Code" class="form-control">
                                            @foreach ($subgroup as $unit)                                                
                                            <option value="{{ $unit->Group_Code }}"
                                                    {{ $item->Group_Code== $accounts->SubGroup_Code ? 'selected' : ''}} >{{ $unit->Group_Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div> 

                            <div class="form-group row ">
                                    <label class="control-label text-right col-md-3">Report Group</label>
                                    <div class="col-md-7">
                                        <select name="ReportGroup" class="form-control">
                                            @foreach ($reportgroup as $unit)                                                
                                            <option value="{{ $unit->Ac_Name }}"
                                                    {{ $item->Group_Code== $accounts->ReportGroup ? 'selected' : ''}}
                                                >{{ $unit->Ac_Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div> 

                            <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Phone</label>
                                    <div class="col-md-6">
                                        <input type="text" name="Phone" value="{{ $accounts->Phone }}"  maxlength="50" class="form-control">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Mobile</label>
                                    <div class="col-md-6">
                                        <input type="text" name="Mobile" value="{{ $accounts->Mobile }}"  maxlength="50" class="form-control">
                                    </div>
                            </div>

                            <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Address</label>
                                    <div class="col-md-6">
                                        <input type="text" name="Address1" value="{{ $accounts->Address1 }}"  maxlength="50" class="form-control">
                                    </div>
                            </div>

                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Address</label>
                                        <div class="col-md-6">
                                            <input type="text" name="Address2" maxlength="50" value="{{ $accounts->Address2 }}"   class="form-control">
                                        </div>
                                    </div>
                                <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Address</label>
                                            <div class="col-md-6">
                                                <input type="text" name="Address3" maxlength="50" value="{{ $accounts->Address3 }}"  class="form-control">
                                            </div>
                                        </div>
                                 <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Delivery Address</label>
                                            <div class="col-md-6">
                                                <input type="text" name="Del_Address" value="{{ $accounts->Del_Address }}"  maxlength="50" class="form-control">
                                            </div>
                                </div>        
                                <div class="form-group row">
                                                <label class="control-label text-right col-md-3">G.S.T. No</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="GSTNO" value="{{ $accounts->GSTNO }}"  maxlength="50" class="form-control">
                                                </div>
                                </div>        
                                <div class="form-group row last">
                                    <label class="control-label text-right col-md-3">Opn Bal</label>
                                    <div class="col-md-6">
                                        <input type="number" name="Opn_Bal" 
                                        
                                        value="{{  abs($accounts->Opn_Bal) }}"  maxlength="8" class="form-control">
                                        <select name="opnbal">
                                            <option {{ ($accounts->Opn_Bal<"0")? "selected" : "" }} value="1">Dr</option>
                                            <option {{ ($accounts->Opn_Bal>"0")? "selected" : "" }} value="2">Cr</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Active/In Active</label>
                                            <div class="form-check">
                                                <label class="custom-control custom-radio">
                                                    <input id="radio1" name="Active" 
                                                    {{ ($accounts->Active=="1")? "checked" : "" }}
                                                    value ="1" type="radio"  class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Active</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input id="radio2" name="Active"
                                                    {{ ($accounts->Active=="0")? "checked" : "" }}
                                                    type="radio" value ="0" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">InActive</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="offset-sm-3 col-md-7">
                                                           
                                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                            <a href="{{ url('accounts') }}" class="btn btn-inverse">Cancel</a>
                                                        </div>
                                                    </div>
                
                                                    <br><br>
                                                </div>
                                            </div>
                                    </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
