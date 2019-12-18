@extends('layouts.admin')

@section('pagetitle','Purchase')
    



@section('content')               
        <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                    <div class="row justify-content-between">
                                            <div class="col-4">
                                                <h4 class="card-title">Purchase</h4>
                                            </div>
                                            <div class="col-6">
                                                    <div class="float-right"><a class="btn btn-sm  btn-primary" href="{{ url('admin/knittedfabric/create') }}">Add New</a></div>
                                                
                                            </div>
                                          </div>
                                       
                             
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                 
                                                <th>Inward Number</th>
                                                <th>Inward Date</th>
                                                <th>Supplier</th>
                                                <th>Supplier Ref No</th>
                                                <th>Total Qty</th>
                                                <th>Total Amount</th>
                                                <th>Remarks</th> 
                                                <th class="text-nowrap">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rsdepartmentData['data'] as $d)
                                            <tr>
                                                
                                                <td>{{$d->inwardnumber}}</td>
                                                <td>{{$d->inward_date}}</td>
                                                <td>{{$d->name}}</td>
                                                <td>{{$d->reference}}</td>
                                                <td> {{number_format((float)$d->total_weight, 3, '.', '') }}</td>                                                    
                                                <td>{{number_format((float)$d->net_value, 2, '.', '') }}</td>
                                                <td>{{$d->remarks}}</td>
                                                
                                                        <td class="text-nowrap">
                                                    <a href="{{ url('admin/knittedfabric') }}/{{$d->inwardnumber}}/edit" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                
                                                   
                                                    <a href="javascript:void(0);" onclick="$(this).find('form').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                                            <form action="{{ url('admin/knittedfabric') }}/{{$d->inwardnumber}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>

                                    {{ $rsdepartmentData['data']->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
 
<script>
      function savefrn()
      {
         
          
            var id=$('#inw_no').val();	
            
           // data:{_token:_token,id:id},  
            var sno = $('input[name="sno[]"]').map(function(){ 
                    return this.value; 
                }).get();

            var recdweight = $('input[name="recdweight[]"]').map(function(){ 
                    return this.value; 
                }).get();    

             var frnnumber = $('input[name="frnnumber[]"]').map(function(){ 
                    return this.value; 
                }).get();  

            var _token = $('input[name="_token"]').val();
               $.ajax
                ({
                    url:"{{ route('knittedfabric.savefrn') }}",
                    method:"POST",
                    data:{'sno[]':sno,'recdweight[]':recdweight,'frnnumber[]':frnnumber, id:id,_token:_token},                                  
                    success: function(response)
                    {      
                       
                      alert(response);
                      $('#edit-modal').modal('toggle');
                        
                    } ,                       
                   headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    } 
                });
            
      }
      
    
    $('#edit-modal').on('show.bs.modal', function(e) {
       
        $('#welcome').html('');
        var  id = $(e.relatedTarget).data('id');  
        $('#inw_no').val(id);
            var html='';
            html +='<div class="table-responsive  m-t-40">';
            html +='<table id="myTable" class="table table-bordered table-striped">';
            html +='<tr> <th  width="5%">S.No</th> <th  width="5%" >Colour</th> ';
            html +=' <th  width="5%">Fabric</th>';
            html +='<th width="5%" >FRN</th>';
            html +='<th width="5%" >Bill.Weight</th>';
            html +='<th width="5%" >Recd.Weight</th>';
            html +='</tr>';
            html +='';
              
                                    
        //    $("#modal-input-id").val('welcome');
            updatecolour(id);
           
        
    //////////////////////////////////////////////////////////////////////////////   
            function updatecolour(id)
            {
                var _token = $('input[name="_token"]').val();
                $.ajax
                ({
                    url:"{{ route('knittedfabric.fetchfrn') }}",
                    method:"POST", 
                    data:{_token:_token,id:id},  
                    success: function(response)
                    {           
                       $.each(response,function(index)
                       {
                        var x = parseFloat(response[index].weight);
                        

    html +='<tr>';
    html +='<td>'+response[index].indx+' <input type="hidden" class="sno" name="sno[]" value="'+response[index].indx+'"/></td>';
    html +='<td>'+response[index].coloursname+'<input type="hidden"   name="colourname[]"  value="'+response[index].coloursid+'"/></td>';
    html +='<td>'+response[index].fabricsname+'<input type="hidden"  name="fabricname[]"  value="'+response[index].fabricsid+'"/></td>';
    html +='<td><input type="text"  name="frnnumber[]"  value="'+response[index].frnnumber+'"/></td>';
    html +='<td>'+response[index].weight+'</td>';
    html +='<td><input type="number"  style=" width: 100px;"  name="recdweight[]"   value="'+response[index].delivery_weight+'"/></td>';
    html +='</tr>';
                           
                       })   
                       html +='</tbody> </table> </div>';     
                       $('#welcome').append(html);   
                    },
                    ////////////////////////////////////////////////////////////////////////////// 
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
                     //////////////////////////////////////////////////////////////////////////////       
                   headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    } 
                });
            }
    //////////////////////////////////////////////////////////////////////////////        
    });


</script>        
@endsection
