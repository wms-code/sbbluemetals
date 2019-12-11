@extends('layouts.admin')
@push('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" /> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
@endpush

@section('pagetitle','Cutting Program ')
 
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
                                <label class="control-label text-left col-md-2"> Program No:.</label>
                                  <div class="col-md-3">
                                        <input type="text" name="production_number" 
                                        value ={{ $rsdepartmentData['production_number'] }}
                                        readonly class="form-control">
                                      
                                        <input type="text" name="productionnumber" 
                                        value ={{ $rsdepartmentData['productionnumber'] }}
                                        readonly  class="form-control">
                                  </div>
                                  <label class="control-label text-left col-md-2">Program Date:.</label>
                                   <div class="col-md-2">
                                      <input type="date" name="inward_date" maxlength="12" class="form-control">
                                    </div>
                            </div>
                            
                            <div style="margin-left: 0px;" class="form-group row">
                                <label class="control-label text-left col-md-2"> Supervisor </label>
                                 <div class="col-md-3">
                                    <select class="form-control jssingle" id='emp_code' name='emp_code'>
                                        <option value='0'>-- Select Supervisor --</option>
                                        @foreach($rsdepartmentData['staff'] as $department)
                                          <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                        @endforeach
                                     </select>
                                  </div>
                                 
                            </div>
    
                            <div style="margin-left: 0px;" class="form-group row">
                              <label class="control-label text-left col-md-2"> Style </label>
                               <div class="col-md-3">
                                  <select class="form-control jssingle" id='style_code' name='style_code'>
                                      <option value='0'>-- Select Style --</option>
                                      @foreach($rsdepartmentData['style'] as $department)
                                        <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                      @endforeach
                                   </select>
                                </div>
                                
                          </div>
                           
                          <div style="margin-left: 0px;" class="form-group row">
                          <label class="control-label text-left col-md-2"> Fabric & Colour </label> 
                                  <div class="col-md-3">
                                    <table  border="1" class="table">
                                      <thead>
                                        <tr> 
                                          <th width="4%">S.No</th>
                                          <th width="10%">Colour</th>
                                          <th width="10%">Fabirc</th>
                                          <th width="10%">Weight</th> 
                                        </tr>  
                                      </thead>
                                        <tr>   
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        </tr>
                                      </table>
                                  </div>     
                                </div>     
                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                            <table  border="1" class="table">
                                  <thead>
                                    <tr>
                                      <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                                      <th width="4%">SNo</th>
                                      <th width="10%">F.R.N</th>
                                      <th width="10%">Colour</th>
                                      <th width="10%">Fabirc</th> 
                                         
                                      <th  width="8%">  <div id="styleid1" class="form-control">Size 1</div></th>
                                      <th  width="8%">  <div id="styleid2" class="form-control">Size 2</div></th>
                                      <th  width="8%">  <div id="styleid3" class="form-control">Size 3</div></th>
                                      <th  width="8%">  <div id="styleid4" class="form-control">Size 4</div></th>
                                      <th  width="8%">  <div id="styleid5" class="form-control">Size 5</div></th>
                                      <th  width="8%">  <div id="styleid6" class="form-control">Size 6</div></th>
                                      <th  width="8%">  <div id="styleid7" class="form-control">Size 7</div></th>
                                      <th  width="8%">  <div id="styleid8" class="form-control">Size 8</div></th>
                                      <th width="10%">Total Pcs</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <th><input class="case" type="checkbox"/></th>
                                        <th> <INPUT class="form-control" type='text' readonly  id='sno_1'	 value='1'  size='4'  
                                             readonly name='sno[]'/> </th>
                                        <td>
                                              <select class="jssingle" id='selfrn1' name='selfrn[]'>
                                                  <option value='0'>-- Select F.R.N --</option>
                                                    @foreach($rsdepartmentData['frn'] as $department)
                                                       <option value='{{ $department->frnnumber }}'>{{ $department->frnnumber }}</option>
                                                  @endforeach
                                              </select>
                                          </td>
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
                                               
                                                @foreach($rsdepartmentData['fabrics'] as $department)
                                         <option value="{{ $department->id }}">  {{$department->name }} </option>
                                          @endforeach
                                         </select>  
                                         </td>
                                        
                                         <td>  <input type="number"    name="size1[]" id="size1" class="form-control totalLinePrice"></td>
                                         <td>  <input type="number"    name="size2[]" id="size2" class="form-control totalLinePrice"></td>
                                         <td>  <input type="number"    name="size3[]" id="size3" class="form-control totalLinePrice"></td>
                                         <td>  <input type="number"    name="size4[]" id="size4" class="form-control totalLinePrice"></td>
                                         <td>  <input type="number"    name="size5[]" id="size5" class="form-control totalLinePrice"></td>
                                         <td>  <input type="number"    name="size6[]" id="size6" class="form-control totalLinePrice"></td>
                                         <td>  <input type="number"    name="size7[]" id="size7" class="form-control totalLinePrice"></td>
                                         <td>  <input type="number"    name="size8[]" id="size8" class="form-control totalLinePrice"></td>
                                        <td>
                                              <input type="number"  readonly name="tot_pcs[]" id="totalpcs_1" class="form-control totalLinePrice">
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
                            <label class="control-label text-left col-md-3"> Total Pcs:.</label>
                              <div class="col-md-3">
                                  <input type="number" name="total_pcs" readonly class="form-control"
                                   id="total_pcs" placeholder="Total Pcs" >
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
        <script>
          $('#style_code').on('change',function()
          {
                 
              var total=0;
              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
              var styleid=$('#style_code').val();
              ////////////////////////////////////////////////////////////////////////////////////////
              selectfrn('selfrn1');
              var _token = $('input[name="_token"]').val(); 
              var size1,size2,size3,size4,size5,size6,size7,size8;
              var weight_0,weight_1,weight_2,weight_3,weight_4,weight_5,weight_6,weight_7;
              $.ajax({
                    url:"{{ route('cuttingproduction.fetchsize') }}",
                    method:"POST", 
                    data:{_token:_token,styleid:styleid},  
                    success: function(response){   
                      $.each(response, function (index, value) {
                          total=0;
                          size1=(this.size1);size2=(this.size2);size3=(this.size3);size4=(this.size4);
                          size5=(this.size5);size6=(this.size6);size7=(this.size7);size8=(this.size8);
                          $("#styleid1").html(size1);
                          $("#styleid2").html(size2);
                          $("#styleid3").html(size3);
                          $("#styleid4").html(size4);
                          $("#styleid5").html(size5);
                          $("#styleid6").html(size6);
                          $("#styleid7").html(size7);
                          $("#styleid8").html(size8);
                        
                      })
                    
                    }, 
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
                       
                        
              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
             
              
          });
      function selectfrn(para)
         {

          para='#'+para;
          var _token = $('input[name="_token"]').val();
          var styleid=$('#style_code').val();
          $.ajax({
              url:"{{ route('cuttingproduction.fetchfrn') }}",
              method:"POST", 
              data:{_token:_token,styleid:styleid},  
            
              success: function(response){                   
              var len = response.length;
              alert(response);
             // $(para).append(response);
              //$(para).select2();
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
      </script>        
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
               
               
              $('.totalSubTotal').each(function(){
                if($(this).val() != '' ) perrateamount += parseFloat( $(this).val() );
              });
              $('#subTotal').val( perrateamount.toFixed(2));              
               /////////////////////////////////////////////////////////////
              taxamtt=0;   
              $('.totalLinetax').each(function(){
                if($(this).val() != '' ) taxamtt += parseFloat( $(this).val() );
              });
              $('#taxAmount').val( taxamtt.toFixed(2));  
              /////////////////////////////////////////////////////////////
              $('.totalLinePrice').each(function(){
                if($(this).val() != '' ) subTotal += parseFloat( $(this).val() );
              });
            
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
              $('#txtTotal').val( subTotal.toFixed(0));//subTotal =Math.round(subTotal);      
               //////////////////////////////////////////////////////////// 
               //ROUND OFF 
                var round =Math.round(subTotal); 
                round =subTotal-round; 
                round =parseFloat(round).toFixed(2);
                $('#taxroundoff').val(round);  //$('#roundoff_'+id[1]).val(round); 
                //ROUND OFF    

              taxamtt=0;
              //$('.totalRoundOff').each(function(){
                //if($(this).val() != '' ) taxamtt += parseFloat( $(this).val() );
              //});
              taxamtt=0;
              $('.totalWeight').each(function(){
                if($(this).val() != '' ) taxamtt += parseFloat( $(this).val() );
              });
              $('#total_weight').val( taxamtt.toFixed(2));  
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
