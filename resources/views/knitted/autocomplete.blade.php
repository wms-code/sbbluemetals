@extends('layouts.admin')

@section('pagetitle','Knitted Fabric Inward ')
    

<style>
.form-horizontal label { {
  text-align: left !important; /* !important added for priority in SO snippet. */
}
</style>

@section('content')               
  
        <div class="row">
            <div class="col-md-12 col-md-offset-2 ">
                <div class="card card-outline-info">
                   
                    <div class="card-body">
                        <form action="{{ url('admin/colour') }}" method="post" class="form-horizontal form-bordered">
                            <div class="form-body">
                            <br>
                            @csrf
                            @method('post')
                            <div  style="margin-left: 0px;" class="form-group row">
                                <label class="control-label text-left col-md-2"> Inward No:.</label>
                                  <div class="col-md-2">
                                        <input type="text" name="name" maxlength="50" class="form-control">
                                  </div>
                                  <label class="control-label text-left col-md-2">Inward Date:.</label>
                                   <div class="col-md-3">
                                      <input type="date" name="name" maxlength="25" class="form-control">
                                    </div>
                            </div>

                              <div style="margin-left: 0px;" class="form-group row">
                                  <label class="control-label text-left col-md-2"> Supplier </label>
                                   <div class="col-md-6">
                                      <select class="form-control itemName" id='sel_depart1' name='sel_depart'>
                                          <option value='0'>-- Select department --</option>
                                          @foreach($rsdepartmentData['data'] as $department)
                                            <option value='{{ $department->country_name }}'>{{ $department->country_name }}</option>
                                          @endforeach
                                      
                                       </select>
                                    </div>
                                    
                              </div>
                              
                             
                                
                            
                          <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
                            <table  border="1" class="table">
                                  <thead>
                                    <tr>
                                      <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
                                      <th width="4%">SNo</th>
                                      <th width="15%">Fabirc</th>
                                      <th width="15%">Colour</th>
                                      <th width="10%">H.S.N.</th>
                                      <th width="15%">Particulars</th>
                                      <th width="10%">Rolls</th>
                                      <th width="10%">Qty</th>
                                      <th width="10%">Rate</th>
                                      <th width="20%">Amount</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <th><input class="case" type="checkbox"/></th>
                                        <th> <INPUT class="form-control" type='text' readonly  id='sno_1'	 value='1'  size='4'  
                                             readonly name='sno[]'/> </th>
                                        <td> 
                                           <select class="form-control itemName" id='sel_depart1' name='sel_depart'>
                                                <option value='0'>-- Select Fabric --</option>
                                                  @foreach($rsdepartmentData['data'] as $department)
                                                <option value='{{ $department->country_name }}'>{{ $department->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control itemName" id='sel_colour_1' name='sel_colour[]'>
                                                <option value='0'>-- Select Colour --</option>
                                                  @foreach($rsdepartmentData['data'] as $department)
                                                <option value='{{ $department->country_name }}'>{{ $department->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                           <input type="text" name="hsn[]" id="hsn_1" class="form-control" ondrop="return false;" >
                                        </td>
                                        <td>
                                           <input type="text" name="particulars[]" id="particulars_1" class="form-control" >
                                        </td>
                                        <td>
                                          <input type="text" name="rolls[]" id="rolls_1" class="form-control">                                             
                                        </td>
                                        <td>
                                            <input type="text" name="qty[]" id="qty_1" class="form-control changesNo" 
                                              autocomplete="off" onkeypress="return IsNumeric(event);" >
                                          </td>
                                        <td>
                                            <input type="number" name="rate[]" id="rate_1" class="form-control changesNo" 
                                              autocomplete="off" onkeypress="return IsNumeric(event);" >
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
                         

                        <div  style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-2"> Subtotal:.</label>
                              <div class="col-md-2">
                                    <input type="number" readonly class="form-control" id="subTotal" placeholder="Subtotal"
                                     onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                              </div>
                        </div>

                        <div  style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-2"> Tax %:.</label>
                              <div class="col-md-2">
                                    <input type="number" class="form-control" id="tax" placeholder="Tax %" 
                                    onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                              </div>
                              <label class="control-label text-left col-md-2">Tax Amount %:.</label>
                               <div class="col-md-3">
                                  <input type="number" readonly class="form-control" id="taxAmount" placeholder="Tax"
                                      onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                                   
                                </div>
                        </div>
                            
                        <div  style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-2"> Total:.</label>
                              <div class="col-md-2">
                                    <input type="number" readonly class="form-control" id="txtTotal" placeholder="Total"
                                     onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
                              </div>
                        </div>

                        <div style="margin-left: 0px;" class="form-group row">
                            <label class="control-label text-left col-md-2"> Stock Point </label>
                             <div class="col-md-6">
                                <select class="form-control itemName" id='sel_depart1' name='sel_depart'>
                                    <option value='0'>-- Select department --</option>
                                    @foreach($rsdepartmentData['data'] as $department)
                                      <option value='{{ $department->country_name }}'>{{ $department->country_name }}</option>
                                    @endforeach
                                
                                 </select>
                              </div>
                              
                        </div>

                       <div style="margin-left: 0px;" class="form-group row">                                  
                            <label class="control-label text-left col-md-2"> Remarks</label>
                            <div class="col-md-3">
                                  <input type="text" name="name" maxlength="50" class="form-control">
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
              html += '<td><select class="form-control" id="sel_user_'+i+'"  name="sel_fabric[]"><option value="0">- Select Fabric-</option></select></td>';
              html += '<td><select class="form-control" id="sel_colour_'+i+'" name="sel_colour[]"><option value="0">- Select Colour-</option></select></td>';
              html += '<td><input type="text" name="hsn[]" id="hsn_'+i+'" class="form-control" ondrop="return false;"></td>';
              html += '<td><input type="text" name="particulars[]" id="particulars_'+i+'" class="form-control"></td>';
              html += '<td><input type="text" name="rolls[]"  id="rolls_'+i+'" class="form-control"></td>';
              html += '<td><input type="number" name="qty[]"  id="qty_'+i+'" class="form-control changesNo" onkeypress="return IsNumeric(event);"ondrop="return false;"   onpaste="return false;"></td>';           
              html += '<td><input type="number" name="rate[]" id="rate_'+i+'"  class="form-control changesNo" onkeypress="return IsNumeric(event);"ondrop="return false;"  onpaste="return false;"></td>';
              html += '<td><input type="number" readonly name="amount[]" id="amount_'+i+'" class="form-control totalLinePrice"   ></td>';
              html += '</tr>';
              updateselect2('sel_user_'+i);
              updateselect2('sel_colour_'+i);
              
              $('table').append(html);
              setrowvalue();
              i++;


              function updateselect2(para){
                para='#'+para;
                var _token = $('input[name="_token"]').val();
                       ///////////////////////////////////
                       $.ajax({
                       url:"{{ route('knittedfabric.fetch') }}",
                       method:"POST", 
                       data:{_token:_token},  
                       success: function(response){                   
                        var len = response.length;
                        $(para).append(response);
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
                  });//ajax
            
                       ///////////////////////////////////
            }
              //alert('s');
            });
            
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
            
              id_arr = $(this).attr('id');
              id = id_arr.split("_");
              quantity = $('#qty_'+id[1]).val();
              price = $('#rate_'+id[1]).val();
              $('#amount_'+id[1]).val(0);
              if( quantity!='' && price !='' ) $('#amount_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) );	
              calculateTotal();
            });
            
            $(document).on('change keyup blur','#tax',function(){
              calculateTotal();
            });
            
            //total price calculation 
            function calculateTotal(){

              
            
              subTotal = 0 ; total = 0; 
              $('.totalLinePrice').each(function(){
                if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
              });
              $('#subTotal').val( subTotal.toFixed(2) );
              tax = $('#tax').val();
              if(tax != '' && typeof(tax) != "undefined" ){
                taxAmount = subTotal * ( parseFloat(tax) /100 );
                $('#taxAmount').val(taxAmount.toFixed(2));
                total = subTotal + taxAmount;
              }else{
                $('#taxAmount').val(0);
                total = subTotal;
              }
              $('#txtTotal').val( total.toFixed(2) );
            }
             
            
            //It restrict the non-numbers
            var specialKeys = new Array();
            specialKeys.push(8,46); //Backspace
            function IsNumeric(e) {
                var keyCode = e.which ? e.which : e.keyCode;
                console.log( keyCode );
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                return ret;
            }
            
 </script>
            

                                    
@endsection
