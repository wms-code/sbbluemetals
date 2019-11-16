@extends('layouts.admin')
@push('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" /> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@endpush

@section('pagetitle','Knitted Fabric Inward ')
 
@section('content')               
  <div class="row">
            <div class="col-md-12 col-md-offset-2 ">
                <div class="card card-outline-info">
                   
                    <div class="card-body">
                        <form action="{{ url('admin/knittedfabric') }}" method="post" class="form-horizontal form-bordered">
                            <div class="form-body">
                            <br>
                            @csrf
                            @method('post')
                            <div  style="margin-left: 0px;" class="form-group row">
                                <label class="control-label text-left col-md-2"> Inward No:.</label>
                                  <div class="col-md-3">
                                        <input type="text" name="inward_number" 
                                        value ={{ $rsdepartmentData['inward_number'] }}
                                        readonly class="form-control">
                                      
                                        <input type="text" name="inwardnumber" 
                                        value ={{ $rsdepartmentData['inwardnumber'] }}
                                        readonly  class="form-control">
                                  </div>
                                  <label class="control-label text-left col-md-2">Inward Date:.</label>
                                   <div class="col-md-2">
                                      <input type="date" name="inward_date" maxlength="12" class="form-control">
                                    </div>
                            </div>
                            
                            <div style="margin-left: 0px;" class="form-group row">
                                <label class="control-label text-left col-md-2"> Supplier </label>
                                 <div class="col-md-3">
                                    <select class="form-control jssingle" id='pty_code' name='pty_code'>
                                        <option value='0'>-- Select Supplier --</option>
                                        @foreach($rsdepartmentData['data'] as $department)
                                          <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                        @endforeach
                                     </select>
                                  </div>
                                  
                            </div>
    
                           <div style="margin-left: 0px;" class="form-group row">                                  
                                <label class="control-label text-left col-md-2"> Supplier Inovice No</label>
                                <div class="col-md-3">
                                      <input type="text" name="reference"  class="form-control">
                                </div>
                                <label class="control-label text-left col-md-2"> Supplier Inovice Date</label>
                                <div class="col-md-2">
                                      <input type="date" name="inwarddate"  class="form-control">
                                </div>
                            </div>
                            
                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                            <table  border="1" class="table">
                                  <thead>
                                    <tr>
                                      <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                                      <th width="4%">SNo</th>
                                      <th width="10%">Colour</th>
                                      <th width="10%">Fabirc</th> 
                                      <th width="5%">Rolls</th>
                                      <th width="10%">Qty</th>
                                      <th width="10%">Rate</th>
                                      <th width="10%">Tax %</th>
                                      <th width="10%">Amount</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <th><input class="case" type="checkbox"/></th>
                                        <th> <INPUT class="form-control" type='text' readonly  id='sno_1'	 value='1'  size='4'  
                                             readonly name='sno[]'/> </th>
                                     
                                        <td>
                                            <select class="jssingle" id='selcolour1' name='selcolour[]'>
                                                <option value='0'>-- Select Colour --</option>
                                                  @foreach($rsdepartmentData['colour'] as $department)
                                                
                                                <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                              
                                                @endforeach
                                            </select>
                                        </td>
                                        <td> 
                                            <select class="jssingle" id='selfabric1' name='selfabric[]'>
                                                <option value='0'>-- Select Fabric --</option>
                                              {{ $previousCountry = null}} 
@foreach($rsfabrics  as $courseCategory) 
<?php 
    if ($previousCountry != $courseCategory->fabricgroupname) 
      {
          echo "<optgroup label='$courseCategory->fabricgroupname'>";
      } 
?>
  <option value="{{ $courseCategory->id }}">  {{$courseCategory->fabricname }} </option>
  {{  $previousCountry = $courseCategory->fabricgroupname }}
    
  <?php 
  if ($previousCountry != $courseCategory->fabricgroupname) 
    {
    echo '</optgroup>';
    } 
?>                                                   
 @endforeach
</select><br>
                                        
                                             
                                              
                                                   
                                        
                                         
                                           <input type="hidden" name="hsn[]" id="hsn_1" class="form-control" ondrop="return false;" >
                                        
                                         
                                           <input type="hidden" name="particulars[]" id="particulars_1" class="form-control" >
                                        </td>
                                        <td>
                                          <input type="text" name="rolls[]" id="rolls_1" class="form-control">                                             
                                        </td>
                                        <td>
                                            <input type="text" value="" name="qty[]" id="qty_1" class="form-control totalWeight changesNo" 
                                              autocomplete="off" onkeypress="return IsNumeric(event);" >
                                          </td>
                                        
                                        <td>
                                            <input type="number" value="" name="rate[]" id="rate_1" class="form-control changesNo" 
                                              autocomplete="off" onkeypress="return IsNumeric(event);" >
                                        <br>
                                         
                                          <input type="number" name="perrateamount[]" id="perrateamount_1" class="form-control totalSubTotal" readonly >
                                       </td>
                                      
                                        <td>
                                          <input type="number" value="5" name="taxper[]" id="taxper_1" class="form-control  changesNo" 
                                            autocomplete="off" onkeypress="return IsNumeric(event);" >
                                       <br>
                                        
                                        <input type="number" name="taxamt[]" id="taxamt_1" class="form-control totalLinetax"  readonly >
                                       <br>
                                      
                                        <input type="number" name="roundoff[]" id="roundoff_1" class="form-control totalRoundOff" readonly >
                                     </td>
                                        <td>
                                              <input type="number"  readonly name="amount[]" id="amount_1" class="form-control totalLinePrice">
                                        </td>
                                        </tr>
                                       </tbody>
                                   
                             </table>   
                            
                              <div class='row'>
                                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                  <button class="btn btn-danger delete" type="button">- Delete</button>
                                  <button class="btn btn-success addmore" type="button">+ Add More</button>
                              </div>
                         </div>
                         <br>
                         
                         <div style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-2"> Total Weight:.</label>
                              <div class="col-md-2">
                                  <input type="number" name="total_weight" readonly class="form-control"
                                   id="total_weight" placeholder="Total Weight" >
                              </div>
                        </div>
                        <div style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-2"> Subtotal:.</label>
                              <div class="col-md-2">
                                    <input type="number" name="sub_total" readonly class="form-control" id="subTotal" placeholder="Subtotal"
                                     onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                              </div>
                        </div>

                        <div  style="margin-left: 0px;" class="form-group row">
                              <label class="control-label text-left col-md-2">Tax Amount %:.</label>
                               <div class="col-md-2">
                                  <input type="number"  name="tax_amount"  readonly class="form-control" id="taxAmount" placeholder="Tax">
                                   
                                </div>
                        </div>
                      
                      <div  style="margin-left: 0px;" class="form-group row">
                          <label class="control-label text-left col-md-2">Round Off</label>
                           <div class="col-md-2">
                              <input type="number" name="round_off" readonly class="form-control" id="taxroundoff" placeholder="Round Off"> 
                            </div>
                      </div>

                      
                            
                        <div  style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-2"> Total:.</label>
                              <div class="col-md-2">
                                    <input type="number" name="net_value" readonly class="form-control" id="txtTotal" 
                                      placeholder="Total"
                                     onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                              </div>
                        </div>

                       

                       <div style="margin-left: 0px;" class="form-group row">                                  
                            <label class="control-label text-left col-md-2"> Remarks</label>
                            <div class="col-md-2">
                                  <input type="text" name="remarks" maxlength="50" class="form-control">
                            </div>
                        </div>

                                                         
                        <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-3 col-md-7">
                                               
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                <a href="{{ url('admin/colour') }}" class="btn btn-inverse">Cancel</a>
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

        <script >
          
            var i=$('table tr').length;
            $(".addmore").on('click',function(){
              html = '<tr>';
              html += '<td><input class="case" type="checkbox"/></td>';
              html += '<td> <INPUT class="form-control" type="text" readonly  id="sno_'+i+'" readonly name="sno[]"/>';
              html += '<td><select class="form-control jssingle" id="selcolour'+i+'"  name="selcolour[]"><option value="0">- Select Colour-</option></select></td>';
              html += '<td><select class="form-control jssingle" id="selfabric'+i+'" name="selfabric[]"><option value="0">- Select Fabric-</option></select>';
              html += '<input type="hidden" name="hsn[]" id="hsn_'+i+'" class="form-control" ondrop="return false;">';
              html += '<input type="hidden" name="particulars[]" id="particulars'+i+'" class="form-control"></td>';
              html += '<td><input type="text" name="rolls[]"  id="rolls_'+i+'" class="form-control"></td>';
              html += '<td><input type="number" name="qty[]"  id="qty_'+i+'" class="form-control totalWeight changesNo" onkeypress="return IsNumeric(event);"ondrop="return false;"   onpaste="return false;"></td>';           
              html += '<td><input type="number" name="rate[]" id="rate_'+i+'"  class="form-control changesNo" onkeypress="return IsNumeric(event);"ondrop="return false;"  onpaste="return false;"><br>';
              html += '<input type="number" name="perrateamount[]" id="perrateamount_'+i+'" class="form-control totalSubTotal" readonly ></td>';
              html += '<td><input type="number" name="taxper[]" id="taxper_'+i+'"  class="form-control changesNo" onkeypress="return IsNumeric(event);"ondrop="return false;"  onpaste="return false;"><br>';
              html += '<input type="number" name="taxamt[]" id="taxamt_'+i+'"  class="form-control totalLinetax" readonly><br>';
              html += '<input type="number" name="roundoff[]" id="roundoff_'+i+'" class="form-control totalRoundOff" readonly </td>';
              html += '<td><input type="number" readonly name="amount[]" id="amount_'+i+'" class="form-control totalLinePrice"   ></td>';
              html += '</tr>';
             
              updatecolour('selcolour'+i);
              updatefabric('selfabric'+i);
              updaterack('selrack'+i);
              
              $('table').append(html);
              
              setrowvalue();
             
              i++;
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                
function updaterack(para){
  para='#'+para;
  var _token = $('input[name="_token"]').val();
    $.ajax({
              url:"{{ route('knittedfabric.fetchrack') }}",
              method:"POST", 
              data:{_token:_token},  
              success: function(response){                   
              var len = response.length;
              $(para).append(response);
              $(para).select2();
              },//sucess
              error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                     alert(msg);
                   },
                   
                    headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    } 
                  });
                 
            }               
            
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                
              function updatecolour(para){
                para='#'+para;
                var _token = $('input[name="_token"]').val();
                       ///////////////////////////////////
                       $.ajax({
                       url:"{{ route('knittedfabric.fetchcolour') }}",
                       method:"POST", 
                       data:{_token:_token},  
                       success: function(response){                   
                        var len = response.length;
                        $(para).append(response);
                        $(para).select2();
                       },//sucess
                       error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                     alert(msg);
                   },
                   
                    headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    } 
                  });
            }               
            
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                
function updatefabric(para){
                para='#'+para;
                var _token = $('input[name="_token"]').val();
                       ///////////////////////////////////
                       $.ajax({
                       url:"{{ route('knittedfabric.fetchfabric') }}",
                       method:"POST", 
                       data:{_token:_token},  
                       success: function(response){                   
                        var len = response.length;
                        $(para).append(response);
                        $(para).select2();
                       },//sucess
                       error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                     alert(msg);
                   },
                   
                    headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    } 
                  });
            }               
            });
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////            
            //to check all checkboxes
            $(document).on('change','#check_all',function(){	
              $('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
              setrowvalue();
            });
            
            //deletes the selected table rows
            $(".delete").on('click', function() {
              $('.case:checkbox:checked').parents("tr").remove();
              $('#check_all').prop("checked", false); 
              calculateTotal();
              setrowvalue();
            });
            
             
            function setrowvalue()
            {
              
              var names = document.getElementsByName('sno[]');
              for (var j = 0, iLen = names.length; j < iLen; j++) {
	               names[j].value=j+1;
                }
            }
            //price change
            $(document).on('change keyup blur','.changesNo',function(){
              var perrateamount=0.0;
              var subtotal = 0; var total = 0; 

              id_arr = $(this).attr('id');
              id = id_arr.split("_");
              quantity = $('#qty_'+id[1]).val();
              price = $('#rate_'+id[1]).val();
              $('#amount_'+id[1]).val(0);
              $('#perrateamount_'+id[1]).val(0);
              $('#roundoff_'+id[1]).val(0);

              taxper = $('#taxper_'+id[1]).val();
              taxamt = $('#taxamt_'+id[1]).val();
              
              if(quantity!='' && price !='') 
              {
                perrateamount= (parseFloat(price)*parseFloat(quantity)).toFixed(2);
               // console.log(perrateamount);
               // perrateamount = parseFloat(perrateamount).toFixed(2);
                $('#perrateamount_'+id[1]).val(perrateamount);
              }
              if(taxper != '' && typeof(taxper) != "undefined" )
              {
                taxamt = perrateamount * ( parseFloat(taxper) /100 );
                $('#taxamt_'+id[1]).val(taxamt.toFixed(2)); //$('#taxAmount').val(taxamt.toFixed(2));
                total=(parseFloat(perrateamount)+parseFloat(taxamt)).toFixed(2);
                //ROUND OFF 
                var round =Math.round(total); 
                console.log(total);
                round =total-round; 
                round =parseFloat(round).toFixed(2);
                $('#roundoff_'+id[1]).val(round);  

                total =Math.round(total);                                
                $('#amount_'+id[1]).val(total);

                 
              }
              else
              {
                $('#taxamt_'+id[1]).val(0);
                total = perrateamount;
                $('#amount_'+id[1]).val(total);
              }
              
            //  if( quantity!='' && price !='' ) $('#amount_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) );	
              
              calculateTotal();
            });
            
            $(document).on('change keyup blur','#tax',function(){
              calculateTotal();
            });
            
            //total price calculation 
            function calculateTotal(){
              subTotal = 0 ; total = 0; taxamtt = 0; 
              perrateamount=0;

              $('.totalLinePrice').each(function(){
                if($(this).val() != '' ) subTotal += parseFloat( $(this).val() );
              });

              $('#txtTotal').val( subTotal.toFixed(2));

              $('.totalSubTotal').each(function(){
                if($(this).val() != '' ) perrateamount += parseFloat( $(this).val() );
              });
              $('#subTotal').val( perrateamount.toFixed(2));              

              taxamtt=0;   
              $('.totalLinetax').each(function(){
                if($(this).val() != '' ) taxamtt += parseFloat( $(this).val() );
              });
              $('#taxAmount').val( taxamtt.toFixed(2));  
             
              taxamtt=0;
              $('.totalRoundOff').each(function(){
                if($(this).val() != '' ) taxamtt += parseFloat( $(this).val() );
              });
              $('#taxroundoff').val( taxamtt.toFixed(2));  
             
              taxamtt=0;
              $('.totalWeight').each(function(){
                if($(this).val() != '' ) taxamtt += parseFloat( $(this).val() );
              });
              $('#total_weight').val( taxamtt.toFixed(2));  
              

             // $('#subTotal').val( subTotal.toFixed(2) );
             // $('#tax').val( taxamtt.toFixed(2) );

             // tax = $('#tax').val();
              //if(tax != '' && typeof(tax) != "undefined" ){
               // taxAmount = subTotal * ( parseFloat(tax) /100 );
               // $('#taxAmount').val(taxAmount.toFixed(2));
               // total = subTotal + taxAmount;
              //}else{
               // $('#taxAmount').val(0);
               // total = subTotal;
              //}

              //$('#txtTotal').val( total.toFixed(2) );
            }
             
            
            //It restrict the non-numbers
            var specialKeys = new Array();
            specialKeys.push(8,46); //Backspace
            function IsNumeric(e) {
                var keyCode = e.which ? e.which : e.keyCode;
            //    console.log( keyCode );
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
