@extends('layouts.admin')
@section('pagetitle','Knitted Fabric Inward') 
@section('content')      
<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Noto+Serif:400,700"> 
</head>
 <body>
      
       
      <!-- Begin page content -->
  <div class="container content">
    <div class='row'>
      <label>Purchase Inward No. &nbsp;</label>
      <div class='col-xs-12 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-sm-4 col-md-4 col-lg-4'>
       <div class="form-group">
           <input type="text"  readonly class="form-control" id="invoiceNo" placeholder="Inward No">
        </div>
      </div>

      <div class="form-group">
          <label>Supplier &nbsp;</label>
              <div class="input-group">
                  <select class="form-control itemName" id='sel_depart1' name='sel_depart'>
                      <option value='0'>-- Select Supplier --</option>
                      @foreach($rsdepartmentData['data'] as $department)
                        <option value='{{ $department->country_name }}'>{{ $department->country_name }}</option>
                      @endforeach
                  </select>  
              </div>
        </div>  
       
           
          <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
             <div class="form-group">
              <input type="email" class="form-control" id="clientCompanyName" placeholder="Company Name">
            </div>
          </div>  
          <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
              <div class="form-group">
                 <textarea class="form-control" rows='3' id="clientAddress" placeholder="Your Address"></textarea>
              </div>
           </div>

            
          

         <div class="form-group">
           <input type="date" class="form-control" id="invoiceDate" placeholder="Invoice Date">
         </div>
         <div class="form-group">
           <input type="number" class="form-control amountDue" id="amountDueTop" placeholder="Amount Due">
         </div>
           </div>
         </div>
         <h2>&nbsp;</h2>
           
         
         <div class='row'>
           <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
             <table  border="1" class="table">
           <thead>
             <tr>
               <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/> SNo</th>
               <th width="15%">Item No</th>
               <th width="38%">Item Name</th>
               <th width="15%">Price</th>
               <th width="15%">Quantity</th>
               <th width="15%">Total</th>
             </tr>
           </thead>
           <tbody>
             <tr>
              <th width="2%"><input class="case" type="checkbox"/></th>
              <td> <select class="form-control itemName" id='sel_depart1' name='sel_depart'>
    <option value='0'>-- Select department --</option>
    @foreach($rsdepartmentData['data'] as $department)
      <option value='{{ $department->country_name }}'>{{ $department->country_name }}</option>
    @endforeach

 </select></td>
              
              <td><input class="form-control autocomplete_txt" type='text' data-type="country_code" id='country_code_1' name='country_code[]'/> </td>
                <td><input type="number" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
               <td><input type="number" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
               <td><input type="number" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
             </tr>
           </tbody>
         </table>
           </div>
         </div>
         <div class='row'>
           <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
             <button class="btn btn-danger delete" type="button">- Delete</button>
             <button class="btn btn-success addmore" type="button">+ Add More</button>
           </div>
           <div class='col-xs-12 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-sm-5 col-md-5 col-lg-5'>
         <form class="form-inline">
           <div class="form-group">
             <label>Subtotal: &nbsp;</label>
             <div class="input-group">
               <div class="input-group-addon">$</div>
               <input type="number" class="form-control" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
             </div>
           </div>

           <div class="form-group">
             <label>Tax: &nbsp;</label>
             <div class="input-group">
               <div class="input-group-addon">$</div>
               <input type="number" class="form-control" id="tax" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
             </div>
           </div>
           <div class="form-group">
             <label>Tax Amount: &nbsp;</label>
             <div class="input-group">
               <input type="number" class="form-control" id="taxAmount" placeholder="Tax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
               <div class="input-group-addon">%</div>
             </div>
           </div>
           
           <div class="form-group">
             <label>Total: &nbsp;</label>
             <div class="input-group">
               <div class="input-group-addon">$</div>
               <input type="number" class="form-control" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
             </div>
           </div>

           <div class="form-group">
             <label>Amount Paid: &nbsp;</label>
             <div class="input-group">
               <div class="input-group-addon">$</div>
               <input type="number" class="form-control" id="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
             </div>
           </div>
           <div class="form-group">
             <label>Amount Due: &nbsp;</label>
             <div class="input-group">
               <div class="input-group-addon">$</div>
               <input type="number" class="form-control amountDue" id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
             </div>
           </div>
         </form>
       </div>
         </div>
         <h2>Notes: </h2>
         <div class='row'>
           <div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
             <div class="form-group">
           <textarea class="form-control" rows='5' id="notes" placeholder="Your Notes"></textarea>
         </div>
           </div>
         </div>		
     </div>
   
      
     
     
  <script >
    
var i=$('table tr').length;
$(".addmore").on('click',function(){

 
	html = '<tr>';
  html += '<td><input class="case" type="checkbox"/></td>';
  html += '<td><select class="form-control" id="sel_user'+i+'"><option value="0">- Select -</option></select></td>';
	html += '<td><input type="text" data-type="country_code" name="country_code[]" id="country_code_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<td><input type="text" name="price[]" id="price_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '<td><input type="text" name="quantity[]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '<td><input type="text" name="total[]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '</tr>';
  updateselect2('sel_user'+i);
	$('table').append(html);
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
});

//deletes the selected table rows
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});

 

//price change
$(document).on('change keyup blur','.changesNo',function(){

	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	quantity = $('#quantity_'+id[1]).val();
	price = $('#price_'+id[1]).val();
	if( quantity!='' && price !='' ) $('#total_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) );	
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
	$('#totalAftertax').val( total.toFixed(2) );
	calculateAmountDue();
}

$(document).on('change keyup blur','#amountPaid',function(){
	calculateAmountDue();
});

//due amount calculation
function calculateAmountDue(){
	amountPaid = $('#amountPaid').val();
	total = $('#totalAftertax').val();
	if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
		amountDue = parseFloat(total) - parseFloat( amountPaid );
		$('.amountDue').val( amountDue.toFixed(2) );
	}else{
		total = parseFloat(total).toFixed(2);
		$('.amountDue').val( total );
	}
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

//datepicker
$(function () {
   // $('#invoiceDate').datepicker({});
});
 </script>


   
 
 @endsection
 