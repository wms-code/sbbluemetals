@extends('layouts.admin')
@push('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" /> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@endpush

@section('pagetitle','Order Entry')
 <style>
   .stock .select2-results__option {
  padding: 0px 4px;
}
</style>
@section('content')               
  <div class="row">
            <div class="col-md-12 col-md-offset-2 ">
                <div class="card card-outline-info">
                   
                    <div class="card-body">
                        <form action="{{ url('admin/cuttingproduction') }}" method="post" class="form-horizontal form-bordered">
                            <div class="form-body">
                            <br>
                            @csrf
                            @method('post')
                            <div  style="margin-left: 0px;" class="form-group row">
                                <label class="control-label text-left col-md-2"> Order No:.</label>
                                  <div class="col-md-3">
                                        <input type="text" name="order_number" 
                                        value ={{ $rsdepartmentData['order_number'] }}
                                        readonly class="form-control">
                                      
                                        <input type="text" name="orderentry" 
                                        value ={{ $rsdepartmentData['orderentry'] }}
                                        readonly  class="form-control">
                                  </div>
                                  <label class="control-label text-left col-md-2">Order Date:.</label>
                                   <div class="col-md-2">
                                      <input type="date" 
                                      value = "{{ date('Y-m-d')}}"
                                      name="order_date" maxlength="12" class="form-control">
                                    </div>
                            </div>
                            
                            <div style="margin-left: 0px;" class="form-group row">
                                <label class="control-label text-left col-md-2"> Customer </label>
                                 <div class="col-md-3">
                                    <select class="form-control jssingle" id='pty_code' name='pty_code'>
                                        <option value='0'>-- Select Customer --</option>
                                        @foreach($rsdepartmentData['customer'] as $department)
                                          <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                        @endforeach
                                     </select>
                                  </div>
                                 
                            </div>
    
                            <div style="margin-left: 0px;" class="form-group row">
                              <label class="control-label text-left col-md-2"> Vehicle-Lorry </label>                               
                                  <div class="col-md-3"> 
                                  <select class="form-control jssingle" id='vehicle_code' name='vehicle_code'>
                                      <option value='0'>-- Select Vehicle --</option>
                                      @foreach($rsdepartmentData['vehicle'] as $department)
                                        <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                      @endforeach
                                   </select>
                                </div>
                          </div>

                          <div style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-2"> Vehicle-Driver </label>                               
                                <div class="col-md-3"> 
                                <select class="form-control jssingle" id='driver_code' name='driver_code'>
                                    <option value='0'>-- Select Driver --</option>
                                    @foreach($rsdepartmentData['driver'] as $department)
                                      <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                        </div>
                        
                        <div style="margin-left: 0px;" class="form-group row">
                          <label class="control-label text-left col-md-2"> Load By -JCB </l-Loabel>
                           
                              <div class="col-md-3"> 
                              <select class="form-control jssingle" id='jcb_code' name='jcb_code'>
                                  <option value='0'>-- Select JCB --</option>
                                  @foreach($rsdepartmentData['jcb'] as $department)
                                    <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                  @endforeach
                               </select>
                            </div>
                      </div>
                      
                          <div style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-2"> JCB-Opeartor </label>
                             
                                <div class="col-md-3"> 
                                <select class="form-control jssingle" id='op_code' name='op_code'>
                                    <option value='0'>-- Select JCB Opeartor --</option>
                                    @foreach($rsdepartmentData['opeartor'] as $department)
                                      <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                        </div>

                       
                      <div style="margin-left: 0px;" class="form-group row">
                        <label class="control-label text-left col-md-2"> Place-From </label>
                         
                            <div class="col-md-3"> 
                            <select class="form-control jssingle" id='from_code' name='from_code'>
                                <option value='0'>-- Select From Place --</option>
                                @foreach($rsdepartmentData['palce'] as $department)
                                  <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                @endforeach
                             </select>
                          </div>
                    </div>
                           
                    <div style="margin-left: 0px;" class="form-group row">
                      <label class="control-label text-left col-md-2"> Place To </label>
                       
                          <div class="col-md-3"> 
                          <select class="form-control jssingle" id='to_code' name='to_code'>
                              <option value='0'>-- Select Delivery Place --</option>
                              @foreach($rsdepartmentData['place'] as $department)
                                <option value='{{ $department->id }}'>{{ $department->name }}</option>
                              @endforeach
                           </select>
                        </div>
                  </div>  
                   
                  <div style="margin-left: 0px;" class="form-group row">
                    <label class="control-label text-left col-md-2"> Meatrial </label>
                     
                        <div class="col-md-3"> 
                        <select class="form-control jssingle" id='item_code' name='item_code'>
                            <option value='0'>-- Select Meatrial --</option>
                            @foreach($rsdepartmentData['item'] as $department)
                              <option value='{{ $department->id }}'>{{ $department->name }}</option>
                            @endforeach
                         </select>
                      </div>
                </div>



                         
                        
                         <div style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-3"> Total Unit:.</label>
                              <div class="col-md-3">
                                  <input type="number" name="total_unit"   class="form-control"
                                   id="total_pcs" placeholder="Total Unit" >
                              </div>
                        </div>

                        <div style="margin-left: 0px;" class="form-group row">
                          <label class="control-label text-left col-md-3"> Per Unit Rate:.</label>
                            <div class="col-md-3">
                                <input type="number" name="perunitrate" readonly class="form-control"
                                 id="perunitrate" placeholder="Per Unit Rate" >
                            </div>
                      </div>
                       
                      <div style="margin-left: 0px;" class="form-group row">
                        <label class="control-label text-left col-md-3"> Amount:.</label>
                          <div class="col-md-3">
                              <input type="number" name="amount" readonly class="form-control"
                               id="amount" placeholder="Amount" >
                          </div>
                    </div>

                       <div style="margin-left: 0px;" class="form-group row">                                  
                            <label class="control-label text-left col-md-3"> Remarks</label>
                            <div class="col-md-5">
                                  <input type="text" name="remarks" maxlength="250" class="form-control">
                            </div>
                        </div>

                                                         
                        <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-3 col-md-7">
                                               
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                <a href="{{ url('admin/orderentry') }}" class="btn btn-inverse">Cancel</a>
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
$(document).on('change keyup blur','.totalLinePrice',function(){
  calculateTotal();
 });
            
 
function calculateTotal(){
    var subTotal = 0 ; 
    var size1= 0,size2= 0,size3= 0,size4= 0,size5= 0,size6= 0,size7= 0,size8= 0; 
 

    size1 = parseFloat($('#size1').val());
    size2 = parseFloat($('#size2').val());
    size3= parseFloat($('#size3').val());size4 = parseFloat($('#size4').val());
    size5 = parseFloat($('#size5').val());size6 = parseFloat($('#size6').val());
    size7= parseFloat($('#size7').val());size8 = parseFloat($('#size8').val());
    if (size1!==0) {}
    subTotal=size1+size2+size3+size4+size5+size6+size7+size8;
    subTotal=subTotal.toFixed(0);
     $('#total_pcs').val(subTotal);    
     console.log(subTotal)        
            } 
var specialKeys = new Array();
specialKeys.push(8,46);  
function IsNumeric(e) {
                var keyCode = e.which ? e.which : e.keyCode;            
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                return ret;
            }
            
 </script>
 <script>
  $(document).ready(function() { 
     $('.jssingle').select2(); 
 });
 </script>
                                    
@endsection
