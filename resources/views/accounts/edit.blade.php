
@extends('layouts.admin')
@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" /> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@endpush
@push('script')

@section('pagetitle','Edit Accounts')
    



@section('content')               
  
        <div class="row">
            <div class="col-md-8 col-md-offset-2 ">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Edit</h4>
                    </div>
                    

                    <div class="card-body">
                        <form action="{{ url('admin/accounts') }}" method="post" class="form-horizontal form-bordered">
                            <div class="form-body">
                            <br>
                            @csrf
                            @method('put')
                            
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Accounts Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="id" readonly value="{{ $accounts->id}}" maxlength="50" class="form-control"/>
                                        <input type="text" name="name" value="{{ $accounts->name}}" maxlength="50" class="form-control"/>   
                                                                            
                                    </div>
                                </div>
                                
                             <div class="form-group row last">
                                    <label class="control-label text-right col-md-3">Under Accounts Group</label>
                                    <div class="col-md-7">
                                        <select name="group_code" 
                                             class="form-control js-example-basic-single">
                                             @foreach ($accgroup as $item)                                                
                                             <option value="{{ $item->id }}"
                                                     {{ $item->id== $accounts->group_code ? 'selected' : ''}} >{{ $item->name }}</option>
                                             @endforeach
                                            
                                        </select>
                                    </div>
                                </div> 
                      
                                <div class="form-group row ">
                                        <label class="control-label text-right col-md-3">Sub Group</label>
                                        <div class="col-md-7">
                                            <select name="subgroup_code" class="form-control js-example-basic-single">
                                                    @foreach ($subgroup as $item)                                                
                                                    <option value="{{ $item->group_code }}"
                                                            {{ $item->id== $accounts->subgroup_code ? 'selected' : ''}} >{{ $item->name }}</option>
                                                    @endforeach
                                            </select>
                                            
                                        </div>
                                </div> 

                               
 
                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Contact Nos.</label>
                                        <div class="col-md-6">
                                            <input type="text" value="{{ $accounts->phone}}" name="phone" maxlength="50" class="form-control">
                                        </div>
                                </div>
                                 

                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Address Line I</label>
                                        <div class="col-md-6">
                                            <input type="text" name="address1" value="{{ $accounts->address1}}" maxlength="50" class="form-control">
                                        </div>
                                </div>

                                    <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Address Line II</label>
                                            <div class="col-md-6">
                                                <input type="text" name="address2" value="{{ $accounts->address2}}" maxlength="50" class="form-control">
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Address Line III</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="address3"  value="{{ $accounts->address3}}" maxlength="50" class="form-control">
                                                </div>
                                            </div>
                                      
                                    </div>  
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">e-Mail</label>
                                        <div class="col-md-6">
                                            <input type="email" name="email" maxlength="50" value="{{ $accounts->email}}" class="form-control">
                                        </div>
                                     </div>       
                                    <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">G.S.T. No</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="gst_no" maxlength="50" value="{{ $accounts->gst_no}}" class="form-control">
                                                    </div>
                                    </div> 
                                    <div class="form-group row">
                                            <label class="control-label text-right col-md-3">G.S.T.-State & Code</label>
                                            <div class="col-md-6">
                                                <select  id="stategst_code"  name="stategst_code" class="form-control jstag">
                                                    @foreach ($stategst as $unit)  
                                                    <option value="{{ $unit->id }}" {{ $unit->id== $accounts->stategst_code ? 'selected' : ''}}>{{ $unit->name}}</option>
                                                    @endforeach
                                                </select>                                             
                                                <input type="text" id="txtstategst_code" name="txtstategst_code" readonly  maxlength="50" class="form-control"/>
                                            </div>
                                      </div>  
                                      <div class="form-group row ">
                                            <label class="control-label text-right col-md-3">Report Group</label>
                                            <div class="col-md-6">
                                                <select  id="reportgroup_code" name="reportgroup_code" class="form-control jstag">
                                                    @foreach ($reportgroup as $unit)                                                
                                                    <option value="{{ $unit->id }}"  {{ $unit->id== $accounts->reportgroup_code ? 'selected' : ''}}>
                                                        {{ $unit->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" id="txtreportgroup_code" name="txtreportgroup_code" readonly  maxlength="50" class="form-control"/>
                                            </div>
                                    </div>         
                                  <div class="form-group row last">
                                        <label class="control-label text-right col-md-3">Opn Bal</label>
                                        <div class="col-md-6">
                                            <input type="number" name="opn_bal" 
                                            
                                            value="{{  abs($accounts->opn_bal) }}"  maxlength="8" class="form-control">
                                            <select class="form-control" name="opnbal">
                                                <option {{ ($accounts->opn_bal<"0")? "selected" : "" }} value="1">Dr</option>
                                                <option {{ ($accounts->opn_bal>"0")? "selected" : "" }} value="2">Cr</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Active/In Active</label>
                                                <div class="form-check">
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" name="active" 
                                                        {{ ($accounts->active=="1")? "checked" : "" }}
                                                        value ="1" type="radio"  class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Active</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio2" name="active"
                                                        {{ ($accounts->active=="0")? "checked" : "" }}
                                                        type="radio" value ="0" class="custom-control-input">
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
                                                
                                                <button type="submit"  class="btn btn-success go-btn"> <i class="fa fa-check"></i> Save</button>
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


      
              
               
<script>
 $(document).ready(function() {
     $('.js-example-basic-single').select2();
     $(".jstag").select2({
  tags: true
});

$('.go-btn').click(function() {
    var selected = $('#stategst_code option:selected');  
    document.getElementById("txtstategst_code").value = selected.html();

    selected = $('#reportgroup_code option:selected');  
    document.getElementById("txtreportgroup_code").value = selected.html();
     
});

});
 </script>
   
                                      
@endsection






















 