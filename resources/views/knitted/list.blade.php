@extends('layouts.admin')

@section('pagetitle','Knitted Fabric Inward')
    



@section('content')               
        <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                    <div class="row justify-content-between">
                                            <div class="col-4">
                                                <h4 class="card-title">Knitted Fabric Inward </h4>
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
                                                <th>Total Weight</th>
                                                <th>Total Amount</th>
                                                <th>Remarks</th>
                                                <th class="text-nowrap">FRN</th>
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
                                                <td> {{  number_format((float)$d->total_weight, 3, '.', '') }}</td>                                                    
                                                <td>{{  number_format((float)$d->net_value, 2, '.', '') }}</td>
                                                <td>{{$d->remarks}}</td>
                                                <td>

                                                        <button type="button" 
                                                        data-id="{{$d->inwardnumber}}"  
                                                        data-toggle="modal" data-target="#edit-modal"
                                                        class="btn btn-success" id="edit-item">Edit FRN 
                                                    </button>
                                                </td>
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
<!-- Attachment Modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="edit-modal-label">Edit Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
              <form id="edit-form" class="form-horizontal" method="POST" action="">
                <div class="card text bg-dark mb-0">
                   
                  <div class="card-body">
                    
                        <div class="form-group">
                                <label for="exampleInputEmail1">Entry No</label> 
                                <input type="text" class="form-control" id="inw_no" name="inw_no" placeholder="Inward Number" >
                        </div>
                    <div id="welcome">

                    </div>
                    
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="#save-item"
                 onClick="savefrn()"  >Done</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /Attachment Modal -->
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
