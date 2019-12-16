@extends('layouts.admin')

@section('pagetitle','Cutting Program - List')
    



@section('content')               
        <div class="row">
                <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                    <div class="row justify-content-between">
                                            <div class="col-4">
                                                <h4 class="card-title">Cutting Program</h4>
                                            </div>
                                            <div class="col-6">
                                                    <div class="float-right"><a class="btn btn-sm  btn-primary" href="{{ url('admin/cuttingproduction/create') }}">Add New</a></div>
                                                
                                            </div>
                                          </div>
                                       
                             
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                 
                                                <th>Production Number</th>
                                                <th>Production Date</th>
                                                <th>Supervisor</th>
                                                <th>Style</th>
                                                <th>Total Pcs</th>                                           
                                                <th>Remarks</th>   
                                                <th>Production</th>                                               
                                                <th class="text-nowrap">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rsdepartmentData['data'] as $d)
                                            <tr>
                                                
                                                <td>{{$d->productionnumber}}</td>
                                                <td>{{$d->production_date}}</td>
                                                <td>{{$d->accountsname}}</td>
                                                <td>{{$d->stylename}}</td>
                                                <td>{{  number_format((float)$d->total_pcs, 0, '.', '') }}</td>
                                                <td>{{$d->remarks}}</td>
                                                <td class="text-nowrap">
                                                        <button type="button" 
                                                        data-id="{{$d->productionnumber}}"  
                                                        data-toggle="modal" data-target="#edit-modal"
                                                        class="btn btn-success" id="edit-item">Update Production 
                                                    </button> 
                                                </td>    
                                                <td class="text-nowrap">
                                                    <a href="{{ url('admin/cuttingproduction') }}/{{$d->productionnumber}}/edit" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="javascript:void(0);" onclick="$(this).find('form').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                                    <form action="{{ url('admin/cuttingproduction') }}/{{$d->productionnumber}}" method="post">
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
              <h5 class="modal-title" id="edit-modal-label">Update Cutting Production</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
              <form id="edit-form" class="form-horizontal" method="POST" action="">
                <div class="card text bg-dark mb-0">
                   
                  <div class="card-body">
                    
                        <div class="form-group">
                                <label for="exampleInputEmail1">Production No</label> 
                                <input type="text" readonly class="form-control" id="prodno" name="prodno"
                                 placeholder="Production Number" >
                        </div>
                    
                    <div class="table-responsive  m-t-40">
                    <table  id="welcome" class="table table-bordered table-striped">
                            <thead>
                               <tr>     <th width="5%">S.No</th> 
                                        <th  width="5%" >Size</th>  
                                        <th width="5%">Pcs</th> 
                                        <th width="5%">FRN</th> 
                                        <th width="5%">Fabric</th> 
                                        <th width="5%">Colour</th> 
                                        <th width="5%">Cut.Weight</th> 
                                 </tr>  
                            </thead>
                        </table>
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
         
          
            var id=$('#prodno').val();	
            
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
           // $('#welcome').html('');
            var  id = $(e.relatedTarget).data('id');  
            $('#prodno').val(id);
            var html=''; 
            updatecolour(id); 
            function updatecolour(id)
            {
                var _token = $('input[name="_token"]').val();
                $.ajax
                ({
                    url:"{{ route('cuttingproduction.fetchproduction') }}",
                    method:"POST", 
                    data:{_token:_token,id:id},  
                    success: function(response)
                    {        
                       alert(response); 
                       $('#welcome').append(response);   
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
