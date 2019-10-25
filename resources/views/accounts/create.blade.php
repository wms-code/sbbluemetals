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
                                        <input type="text" name="name" maxlength="50" class="form-control">
                                    </div>
                                </div>
                                
                             <div class="form-group row last">
                                    <label class="control-label text-right col-md-3">Accounts Group</label>
                                    <div class="col-md-7">
                                        <select name="accounts_groups_id" class="form-control">
                                            @foreach ($accountsgroups as $group)                                                
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
                      
                                <div class="form-group row ">
                                        <label class="control-label text-right col-md-3">Ac Category</label>
                                        <div class="col-md-7">
                                            <select name="accounts_category_id" class="form-control">
                                                @foreach ($accountscategory as $category)                                                
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div> 

                                <div class="form-group row ">
                                        <label class="control-label text-right col-md-3">Report Group</label>
                                        <div class="col-md-7">
                                            <select name="accounts_report_id" class="form-control">
                                                <option value=""> -- </option>                                                
                                                @foreach ($accounts as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div> 
 
                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Phone</label>
                                        <div class="col-md-6">
                                            <input type="text" name="phone" maxlength="50" class="form-control">
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Mobile</label>
                                        <div class="col-md-6">
                                            <input type="text" name="mobile" maxlength="50" class="form-control">
                                        </div>
                                </div>

                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Address</label>
                                        <div class="col-md-6">
                                            <input type="text" name="address" maxlength="50" class="form-control">
                                        </div>
                                </div>

                                    <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Address 1</label>
                                            <div class="col-md-6">
                                                <input type="text" name="address1" maxlength="50" class="form-control">
                                            </div>
                                        </div>
                                
                                     <div class="form-group row">
                                                <label class="control-label text-right col-md-3">Delivery Address</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="delivery_address" maxlength="50" class="form-control">
                                                </div>
                                    </div>        
                                    <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">G.S.T. No</label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="gst_no" maxlength="50" class="form-control">
                                                    </div>
                                    </div>        
                                    <div class="form-group row last">
                                        <label class="control-label text-right col-md-3">Opening Balance</label>
                                        <div class="col-md-6">
                                            <input type="number" name="opening_balance" maxlength="8" class="form-control">
                                            <select name="opening_balance_type">
                                                <option value="1">Dr</option><option value="2">Cr</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Status</label>
                                                <div class="form-check">
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" name="status" type="radio" value="1" checked="" class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Active</span>
                                                    </label>
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio2" name="status" type="radio" value="0" class="custom-control-input">
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
                                                <a href="{{ url('accounts') }}" class="btn btn-inverse">Cancel</a>
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
