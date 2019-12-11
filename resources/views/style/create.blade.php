@extends('layouts.admin')

@section('pagetitle','Style')
    



@section('content')               
  
        <div class="row">
            <div class="col-md-8 col-md-offset-2 ">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">New </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/style') }}" enctype="multipart/form-data"
                         method="post" class="form-horizontal form-bordered">
                            <div class="form-body">
                            <br>
                            @csrf
                            @method('post')
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Style Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" maxlength="50" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group row ">
                                    <label class="control-label text-right col-md-3"  for="author">Image</label>
                                    <div class="col-md-6">
                                         <input type="file" class="form-control" name="bookcover"/>
                                    </div>
                                </div>
                                

                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Cutting Price</label>
                                    <div class="col-md-6">
                                        <input type="text" name="cuttingprice" maxlength="50" class="form-control">
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Power Table Price</label>
                                    <div class="col-md-6">
                                        <input type="text" name="pprice" maxlength="50" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Singer Price</label>
                                    <div class="col-md-6">
                                        <input type="text" name="singerprice" maxlength="50" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kaja Button Price</label>
                                    <div class="col-md-6">
                                        <input type="text" name="kajaprice" maxlength="50" class="form-control">
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Checking Price</label>
                                    <div class="col-md-6">
                                        <input type="text" name="checkingprice" maxlength="50" class="form-control">
                                    </div>
                                </div> 
            
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Ironing Price </label>
                                    <div class="col-md-6">
                                        <input type="text" name="ironprice" maxlength="50" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Packing Price </label>
                                    <div class="col-md-6">
                                        <input type="text" name="packingprice" maxlength="50" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Size Name</label>
                                        <div class="col-md-6">
                                            <select class="form-control js-example-basic-single"
                                             id='size_code'
                                            name='size_code'>    
                                            <option value="0">--Select--</option>                            
                                            @foreach($size as $department)
                                              <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                            @endforeach
                                         </select>
                                        </div>
                                    </div>
                                                                <div class='col-md-10'>
                                                                        <div class='col-md-10'>
                                                                                <div id='d'>
                                                                                     <table border="1" class="formcontrol table"><thead><tr>
                                                                                         <th width="2%">S.No</th>
                                                                                         <th width="5%"> <input type ="text" id="size1"  class="form-control" readonly name="size1"  width="5%"/></th>
                                                                                         <th width="5%"> <input type ="text" id="size2"  class="form-control" readonly name="size2"   width="5%"/></th>
                                                                                         <th width="5%"> <input type ="text" id="size3"  class="form-control" readonly name="size3"   width="5%"/></th>
                                                                                         <th width="5%"> <input type ="text" id="size4" class="form-control" readonly name="size4"   width="5%"/></th>
                                                                                         <th width="5%"> <input type ="text" id="size5"  class="form-control" readonly name="size5"   width="5%"/></th>
                                                                                         <th width="5%"> <input type ="text" id="size6"  class="form-control" readonly name="size6"   width="5%"/></th>
                                                                                         <th width="5%"> <input type ="text"  id="size7" class="form-control" readonly name="size7"   width="5%"/></th>
                                                                                         <th width="5%"> <input type ="text" id="size8"  class="form-control" readonly name="size8"   width="5%"/></th>
                                                                                         </tr></thead>
                                                                                         <tr><td>Weight</td>
                                                                                             <td><input type="text"   name="weight_0" class="form-control"></td>
                                                                                             <td><input type="text"   name="weight_1" class="form-control"></td>
                                                                                             <td><input type="text"    name="weight_2" class="form-control"></td>
                                                                                             <td><input type="text"    name="weight_3" class="form-control"></td>
                                                                                             <td><input type="text"   name="weight_4" class="form-control"></td>
                                                                                             <td><input type="text"    name="weight_5" class="form-control"></td>
                                                                                             <td><input type="text"   name="weight_6" class="form-control"></td>
                                                                                             <td><input type="text"   name="weight_7" class="form-control"></td>
                                                                                         </tr></table>
                                                                                         
                                                 
                                                                                 </div>
                                                                         </div>
                                                 
                            </div>
                          
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Fabric Name -I</label>
                                <div class="col-md-2">
                                    <select class="form-control js-example-basic-single"
                                             id='fabric_code1'
                                            name='fabric_code1'>    
                                            <option value="0">--Select--</option>                            
                                            @foreach($fabric as $department)
                                              <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                            @endforeach
                                         </select>
                                </div>
                           
                                <label class="control-label text-right col-md-2">Colour Name-I</label>
                                <div class="col-md-2">
                                    <select class="form-control js-example-basic-single"
                                    id='colour_code1'
                                   name='colour_code1'>    
                                   <option value="0">--Select--</option>                            
                                   @foreach($colour as $department)
                                     <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                   @endforeach
                                </select>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Fabric Name -II</label>
                                <div class="col-md-2">
                                    <select class="form-control js-example-basic-single"
                                    id='fabric_code2'
                                   name='fabric_code2'>    
                                   <option value="0">--Select--</option>                            
                                   @foreach($fabric as $department)
                                     <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                   @endforeach
                                </select>
                                </div>
                           
                                <label class="control-label text-right col-md-2">Colour Name-II</label>
                                <div class="col-md-2">
                                    <select class="form-control js-example-basic-single"
                                    id='colour_code2'
                                   name='colour_code2'>    
                                   <option value="0">--Select--</option>                            
                                   @foreach($colour as $department)
                                     <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                   @endforeach
                                </select>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Fabric Name -III</label>
                                <div class="col-md-2">
                                    <select class="form-control js-example-basic-single"
                                    id='fabric_code3'
                                   name='fabric_code3'>    
                                   <option value="0">--Select--</option>                            
                                   @foreach($fabric as $department)
                                     <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                   @endforeach
                                </select>
                                </div>
                           
                                <label class="control-label text-right col-md-2">Colour Name-III</label>
                                <div class="col-md-2">
                                    <select class="form-control js-example-basic-single"
                                    id='colour_code3'
                                   name='colour_code3'>    
                                   <option value="0">--Select--</option>                            
                                   @foreach($colour as $department)
                                     <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                   @endforeach
                                </select>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Fabric Name -IV</label>
                                <div class="col-md-2">
                                    <select class="form-control js-example-basic-single"
                                    id='fabric_code4'
                                   name='fabric_code4'>    
                                   <option value="0">--Select--</option>                            
                                   @foreach($fabric as $department)
                                     <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                   @endforeach
                                </select>
                                </div>
                           
                                <label class="control-label text-right col-md-2">Colour Name-IV</label>
                                <div class="col-md-2">
                                    <select class="form-control js-example-basic-single"
                                    id='colour_code4'
                                   name='colour_code4'>    
                                   <option value="0">--Select--</option>                            
                                   @foreach($colour as $department)
                                     <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                   @endforeach
                                </select>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label class="control-label text-right col-md-2">Fabric Name -V</label>
                                <div class="col-md-2">
                                    <select class="form-control js-example-basic-single"
                                    id='fabric_code5'
                                   name='fabric_code5'>    
                                   <option value="0">--Select--</option>                            
                                   @foreach($fabric as $department)
                                     <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                   @endforeach
                                </select>
                                </div>
                           
                                <label class="control-label text-right col-md-2">Colour Name-V</label>
                                <div class="col-md-2">
                                    <select class="form-control js-example-basic-single"
                                    id='colour_code5'
                                   name='colour_code5'>    
                                   <option value="0">--Select--</option>                            
                                   @foreach($colour as $department)
                                     <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                   @endforeach
                                </select>
                                </div>
                            </div>        

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-3 col-md-7">
                                               
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                                <a href="{{ url('admin/style') }}" class="btn btn-inverse">Cancel</a>
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
                $('#size_code').on('change',function()
                {
                       
                    var total=0;
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
                    var size_code=$('#size_code').val();
                    var _token = $('input[name="_token"]').val(); 
                    var size1,size2,size3,size4,size5,size6,size7,size8;
                    var weight_0,weight_1,weight_2,weight_3,weight_4,weight_5,weight_6,weight_7;
                    $.ajax({
                          url:"{{ route('size.fetchtable') }}",
                          method:"POST", 
                          data:{_token:_token,size_code:size_code},  
                          success: function(response){   
                            $.each(response, function (index, value) {
                                total=0;
                                alert(response);
                                size1=(this.size1);size2=(this.size2);size3=(this.size3);size4=(this.size4);
                                size5=(this.size5);size6=(this.size6);size7=(this.size7);size8=(this.size8);
                                $("#size1").val(size1);
                                $("#size2").val(size2);
                                $("#size3").val(size3);
                                $("#size4").val(size4);
                                $("#size5").val(size5);
                                $("#size6").val(size6);
                                $("#size7").val(size7);
                                $("#size8").val(size8);
                              
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
            </script>                
                                   
@endsection
