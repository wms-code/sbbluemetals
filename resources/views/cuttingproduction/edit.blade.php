@extends('layouts.admin')
@push('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" /> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@endpush

@section('pagetitle','Cutting Production Program-Edit')
 
@section('content')               
  <div class="row">
            <div class="col-md-12 col-md-offset-2 ">
                <div class="card card-outline-info">
                  @foreach( $rsdepartmentData['rsfabrics'] as $fabrics)
                                   
                  @endforeach
                    <div class="card-body">
                        <form action="{{ url('admin/knittedfabric') }}" method="post" class="form-horizontal form-bordered">
                            <div class="form-body">
                            <br>
                            @csrf  @method('put')
                           
                            <div  style="margin-left: 0px;" class="form-group row">
                                <label class="control-label text-left col-md-2"> Inward No:.</label>
                                  <div class="col-md-3">
                                        <input type="text" name="inward_number" 
                                        value ={{ $fabrics->inward_number }}
                                        readonly class="form-control">
                                      
                                        <input type="text" name="inwardnumber" 
                                        value ={{ $fabrics->inwardnumber }}
                                        readonly  class="form-control">
                                  </div>
                                  <label class="control-label text-left col-md-2">Inward Date:.</label>
                                   <div class="col-md-3">
                                      <input type="date" name="inward_date"
                                       value={{ $fabrics->inward_date }}
                                       maxlength="12" class="form-control">
                                    </div>
                            </div>
                            
                            <div style="margin-left: 0px;" class="form-group row">
                                <label class="control-label text-left col-md-2"> Supplier </label>
                                 <div class="col-md-3">
                                    <select readonly class="form-control jssingle" id='pty_code' name='pty_code'>                                        
                                        @foreach($rsdepartmentData['data'] as $department)
                                          <option value='{{ $department->id }}'
                                            {{ $department->id== $fabrics->party_code ? 'selected' : ''}}>
                                            {{ $department->name }}</option>
                                        @endforeach
                                     </select>
                                  </div>
                                  
                            </div>
    
                           <div style="margin-left: 0px;" class="form-group row">                                  
                                <label class="control-label text-left col-md-2"> Supplier Inovice No</label>
                                <div class="col-md-3">
                                      <input type="text" name="reference" value={{ $fabrics->reference }} class="form-control">
                                </div>
                                <label class="control-label text-left col-md-2"> Supplier Inovice Date</label>
                                <div class="col-md-3s">
                                      <input type="date" name="inwarddate" value={{ $fabrics->inwarddate }}  class="form-control">
                                </div>
                            </div>
                            
                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                            <table id="myTable"  border="1" class="table">
                                  <thead>
                                    <tr>
                                       <th width="4%">SNo</th>
                                      <th width="10%">Colour</th>
                                      <th width="10%">Fabirc</th>
                                     
                                      <th width="5%">Rolls</th>
                                      <th width="10%">Weight</th>
                                      <th width="10%">Rate</th>
                                      <th width="10%">Tax %</th>
                                      <th width="10%">Amount</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $i=1;?>
                                        @foreach ($rsdepartmentData['rsdetails'] as $details)
                                      <tr>
                                        <th>
                                            <INPUT class="form-control" type='text' readonly  id='sno_{{$i}}'	 value={{$details->indx}}  size='4'  
                                            readonly name='sno[]'/>
                                           </th>
                                        <td>
                                           
                                           <select class="jssingle" id='selcolour{{$i}}' name='selcolour[]'>
                                      
                                    <option value="0">--Select--</option>                            
                                    @foreach($rscolour as $department)
                                    <option value='{{ $department->id }}'
                                        {{ $department->id== $details->coloursid ? 'selected' : ''}}>
                                        {{ $department->name }}</option>

                                      
                                    @endforeach
                                 </select> 
                                          </td>
                                        <td>
                                            <select class="jssingle" id='selfabric{{$i}}' name='selfabric[]'>
                                                <option value='0'>-- Select Fabric --</option>
      
        @foreach($rsfabrics as $department)
                                                <option value='{{ $department->id }}'
                                                    {{ $department->id== $details->fabricsid ? 'selected' : ''}}>
                                                    {{ $department->fabricname }}</option>
            
                                                  
                                                @endforeach
                                             </select>                       
                                         
                                           <input type="hidden" name="hsn[]"  id='hsn_{{$i}}'
                                          value='{{$details->hsn}}' class="form-control" ondrop="return false;" >
                                        
                                           <input type="hidden" name="particulars[]"
                                           value='{{$details->particulars}}'  id="particulars_1" class="form-control" >
                                        </td>
                                        <td>
                                          <input type="text"
                                          value='{{$details->rolls}}'   name="rolls[]" id="rolls_{{$i}}" class="form-control">                                             
                                        </td>
                                        <td>
                                            <input type="text"  value='{{  number_format((float)$details->weight, 3, '.', '') }}' name="qty[]" id="qty_{{$i}}"
                                             class="form-control totalWeight changesNo" 
                                              autocomplete="off"  >
                                          </td>
                                        
                                        <td>
                                            <input type="text"  value='{{  number_format((float)$details->rate, 2, '.', '') }}' 
                                            name="rate[]" id="rate_{{$i}}" class="form-control changesNo" 
                                              autocomplete="off" >
                                        <br>
                                         
                                          <input type="number" value='{{  number_format((float)$details->perrateamount, 2, '.', '') }}' name="perrateamount[]"
                                           id="perrateamount_{{$i}}" class="form-control totalSubTotal" readonly >
                                       </td>
                                      
                                        <td>
                                          <input type="number" value='{{ number_format((float)$details->taxper, 2, '.', '') }}'  name="taxper[]" 
                                          id="taxper_{{$i}}" class="form-control  changesNo" 
                                            autocomplete="off" onkeypress="return IsNumeric(event);" >
                                       <br>
                                        <input type="number" value='{{  number_format((float)$details->taxamt, 2, '.', '') }}' name="taxamt[]" id="taxamt_{{$i}}" class="form-control totalLinetax"  readonly >
                                       </td>
                                        <td>
                                              <input type="number" value='{{  number_format((float)$details->amount, 2, '.', '')}}'  readonly name="amount[]" id="amount_{{$i}}" class="form-control totalLinePrice">
                                        </td>
                                        </tr>
                                       </tbody>
                                       <?php $i=$i+1;?>
                                       @endforeach
                             </table>   
                            
                             <div class='row'>
                                <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
                                   
                                  <button class="btn btn-success addmore" type="button">+ Add More</button>
                              </div>
                         </div>
                         <br> 
                         <br>
                         
                         <div style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-3"> Total Weight:.</label>
                              <div class="col-md-3">
                                  <input type="text" name="total_weight" readonly class="form-control "
                                   id="total_weight" value={{ number_format((float)$fabrics->total_weight, 3, '.', '') }} placeholder="Total Weight" >
                              </div>
                        </div>
                        <div style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-3"> Subtotal:.</label>
                              <div class="col-md-3">
                                    <input type="number"value={{ number_format((float)$fabrics->sub_total, 2, '.', '')  }}
                                      name="sub_total" readonly class="form-control" id="subTotal" placeholder="Subtotal"
                                     onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                              </div>
                        </div>

                        <div  style="margin-left: 0px;" class="form-group row">
                              <label class="control-label text-left col-md-3">Items Tax Amount %:.</label>
                               <div class="col-md-3">
                                  <input type="number" value={{ number_format((float)$fabrics->tax_amount, 2, '.', '')  }}  name="tax_amount"  readonly class="form-control" id="taxAmount" placeholder="Tax">
                                   
                                </div>
                        </div>
                        <div  style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-3">Packing Amount-Before Tax:.</label>
                             <div class="col-md-3">
                                <input type="number" 
                                      value={{ number_format((float)$fabrics->packingamount, 2, '.', '')  }}  name="packingamount"   class="form-control" id="packingamount" placeholder="Packing Amount">
                              </div>
                            </div>

                        <div  style="margin-left: 0px;" class="form-group row">
                          <label class="control-label text-left col-md-3">Packing Tax %:.</label>
                           <div class="col-md-3">
                              <input type="number"  value={{ number_format((float)$fabrics->packingtaxper, 2, '.', '')  }}  name="packingtaxper"   class="form-control" id="packingtaxper" placeholder="Packing Tax">
                              <input type="number" 
                               name="packingtaxamount" 
                                readonly class="form-control"  value={{ number_format((float)$fabrics->packingtaxamount, 2, '.', '')  }}   id="packingtaxamount" placeholder="Packing Tax Amount">
                            </div>
                    </div>

                    <div  style="margin-left: 0px;" class="form-group row">
                      <label class="control-label text-left col-md-3">Packing  Amount (With Tax):.</label>
                       <div class="col-md-3">
                          <input type="number"  value={{ number_format((float)$fabrics->totalpackingamount, 2, '.', '')  }}   name="totalpackingamount" 
                           readonly class="form-control" id="totalpackingamount" placeholder="Total Packing Amount">
                        </div>
                     </div>

                      <div  style="margin-left: 0px;" class="form-group row">
                          <label class="control-label text-left col-md-3">Round Off</label>
                           <div class="col-md-3">
                              <input type="number"  value={{ number_format((float)$fabrics->round_off, 2, '.', '')  }}  name="round_off" readonly class="form-control" id="taxroundoff" placeholder="Round Off"> 
                            </div>
                      </div>

                      
                            
                        <div  style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-3"> Total:.</label>
                              <div class="col-md-3">
                                    <input type="number"  value={{ number_format((float)$fabrics->net_value, 2, '.', '')  }}  name="net_value" readonly class="form-control" id="txtTotal" 
                                      placeholder="Total"
                                     onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                              </div>
                        </div>

                       

                       <div style="margin-left: 0px;" class="form-group row">                                  
                            <label class="control-label text-left col-md-3"> Remarks</label>
                            <div class="col-md-5">
                                  <input type="text"  value='{{ $fabrics->remarks }}'  name="remarks" class="form-control">
                            </div>
                        </div>

                                                         
                        <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-3 col-md-7">
                                               
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                <a href="{{ url('admin/knittedfabric') }}" class="btn btn-inverse">Cancel</a>
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
          
            $(".addmore").on('click',function(){
              var i=$('table tr').length;
             
              html = '<tr>';           
              html += '<td> <INPUT class="form-control" type="text" readonly  id="sno_'+i+'" readonly name="sno[]"/>';
              html += '<td><select class="form-control jssingle" id="selcolour'+i+'"  name="selcolour[]"><option value="0">- Select Colour-</option></select></td>';
              html += '<td><select class="form-control jssingle" id="selfabric'+i+'" name="selfabric[]"><option value="0">- Select Fabric-</option></select>';
              html += '<input type="hidden" name="hsn[]" id="hsn_'+i+'" class="form-control" ondrop="return false;">';
              html += '<input type="hidden" name="particulars[]" id="particulars'+i+'" class="form-control"></td>';
              html += '<td><input type="text" name="rolls[]"  id="rolls_'+i+'" class="form-control"></td>';
              html += '<td><input type="text" name="qty[]"  id="qty_'+i+'" class="form-control totalWeight changesNo" onkeypress="return IsNumeric(event);"ondrop="return false;"   onpaste="return false;"></td>';           
              html += '<td><input type="text" name="rate[]" id="rate_'+i+'"  class="form-control changesNo" onkeypress="return IsNumeric(event);"ondrop="return false;"  onpaste="return false;"><br>';
              html += '<input type="text" name="perrateamount[]" id="perrateamount_'+i+'" class="form-control totalSubTotal" readonly ></td>';
              html += '<td><input type="text" name="taxper[]" id="taxper_'+i+'"  class="form-control changesNo" onkeypress="return IsNumeric(event);"ondrop="return false;"  onpaste="return false;"><br>';
              html += '<input type="number" name="taxamt[]" id="taxamt_'+i+'"  class="form-control totalLinetax" readonly>';
              html += ' </td>';
              html += '<td><input type="number" readonly name="amount[]" id="amount_'+i+'" class="form-control totalLinePrice"   ></td>';
              html += '</tr>';
             
              updatecolour('selcolour'+i);
              updatefabric('selfabric'+i);
              
              $('#myTable tr:last').after(html);
             // $('table').append(html);
              
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
            $(document).on('change keyup blur','.changesNo',function(){
              var perrateamount=0.0;
              var subtotal = 0; var total = 0; 

              id_arr = $(this).attr('id');
              id = id_arr.split("_");
              quantity = $('#qty_'+id[1]).val();
              price = $('#rate_'+id[1]).val();
              $('#amount_'+id[1]).val(0);
              $('#perrateamount_'+id[1]).val(0);
              

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
                $('#amount_'+id[1]).val(total); 
              }
              else
              {
                $('#taxamt_'+id[1]).val(0);
                total = perrateamount;
                $('#amount_'+id[1]).val(total);
              } 
              calculateTotal();
            });
            
            $(document).on('change keyup blur','#tax',function(){
              calculateTotal();
            });
            $(document).on('change keyup blur','#packingtaxper',function(){
              calculateTotal();
            });
            $(document).on('change keyup blur','#packingamount',function(){
              calculateTotal();
            });
            //total price calculation 
            function calculateTotal(){
              subTotal = 0 ; total = 0; taxamtt = 0; 
              perrateamount=0;

              $('.totalLinePrice').each(function(){
                if($(this).val() != '' ) subTotal += parseFloat( $(this).val() );
              });

              //$('#txtTotal').val( subTotal.toFixed(2));
              
              $('.totalSubTotal').each(function(){
                if($(this).val() != '' ) perrateamount += parseFloat( $(this).val() );
              });
              $('#subTotal').val( perrateamount.toFixed(2));              

              taxamtt=0;   
              $('.totalLinetax').each(function(){
                if($(this).val() != '' ) taxamtt += parseFloat( $(this).val() );
              });
              $('#taxAmount').val( taxamtt.toFixed(2));  
               /////////////////////////////////////////////////////////////
            
              packingamount= $('#packingamount').val();
              packingtaxper = $('#packingtaxper').val();
              packingtaxamount = $('#packingtaxamount').val();
              if(packingtaxper != '' && typeof(packingtaxper) != "undefined" )
              {
                packingtaxamount = packingamount * ( parseFloat(packingtaxper) /100 );
                $('#packingtaxamount').val(packingtaxamount.toFixed(2)); 
                var n1 = parseFloat($('#packingamount').val());
                var n2 = parseFloat($('#packingtaxamount').val()); 
                var n3=n1+n2;
                n3=n3.toFixed(0);
                $('#totalpackingamount').val(n3); 
              }
              else
              {
                $('#packingtaxamount').val(0); 
                $('#totalpackingamount').val(0);              
              }
              
              totalpackingamount = $('#totalpackingamount').val();
              subTotal +=parseFloat(totalpackingamount);
              console.log(subTotal);
              subTotal=subTotal.toFixed(0);
              $('#txtTotal').val(subTotal);
              //////////////////////////////////////////////////////////// 
                 //ROUND OFF 
                 var round =Math.round(subTotal); 
                round =subTotal-round; 
                round =parseFloat(round).toFixed(2);
                $('#taxroundoff').val(round);  //$('#roundoff_'+id[1]).val(round); 
                //ROUND OFF    

         
              
              

              taxamtt=0;
              $('.totalWeight').each(function(){
                if($(this).val() != '' ) taxamtt += parseFloat( $(this).val() );
              });
              $('#total_weight').val( taxamtt.toFixed(2));   
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
  $(document).ready(function() { $('.jssingle').select2();});
</script>
                                    
@endsection
