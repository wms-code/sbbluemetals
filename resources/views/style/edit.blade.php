
@extends('layouts.admin')

@section('pagetitle','Edit Style')
    



@section('content')  

    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Edit </h4>
                </div>
                @foreach($rsstyle as $style)
                                      
                @endforeach
                <div class="card-body">
                    <form action="{{ url('admin/style') }}/{{ $style->id }}" method="post" class="form-horizontal form-bordered">
                        <div class="form-body">
                        <br>
                        @csrf
                        @method('put')
                        
                        <div class="form-group row">
                                <label class="control-label text-right col-md-3">Style ID</label>
                                <div class="col-md-6">
                                    <input type="text" name="id" readonly value="{{ $style->id }}" class="form-control">
                                   
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Style Name</label>
                                <div class="col-md-6">                                    
                                    <input type="text" name="name" maxlength="50" value="{{ $style->name }}" class="form-control">
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Size Name</label>
                                <div class="col-md-6">
                                    <select readonly class="form-control js-example-basic-single"
                                     id='size_code'
                                    name='size_code'>    
                                    <option value="0">--Select--</option>                            
                                    @foreach($size as $department)
                                    <option value='{{ $department->id }}'
                                        {{ $department->id== $style->size_code ? 'selected' : ''}}>
                                        {{ $department->name }}</option>

                                      
                                    @endforeach
                                 </select>
                                </div>
                            </div>
                            @foreach($rsdetails as $details)
                                      
                            @endforeach
                            @foreach($rsdetails1 as $details1)
                                      
                            @endforeach
                           <div class='col-md-10'>
                               <div id='d'>
                                    <table border="1" class="formcontrol table"><thead><tr>
                                        <th width="2%">S.No</th>
                                        <th width="5%"> <input type ="text"  id="size1" value= {{ $details->size1 }} class="form-control" readonly name="size1"  width="5%"/></th>
                                        <th width="5%"> <input type ="text" id="size2" value= {{ $details->size2 }} class="form-control" readonly name="size2"   width="5%"/></th>
                                        <th width="5%"> <input type ="text" id="size3" value= {{ $details->size3 }} class="form-control" readonly name="size3"   width="5%"/></th>
                                        <th width="5%"> <input type ="text" id="size4" value= {{ $details->size4 }} class="form-control" readonly name="size4"   width="5%"/></th>
                                        <th width="5%"> <input type ="text" id="size5" value= {{ $details->size5 }} class="form-control" readonly name="size5"   width="5%"/></th>
                                        <th width="5%"> <input type ="text" id="size6" value= {{ $details->size6 }} class="form-control" readonly name="size6"   width="5%"/></th>
                                        <th width="5%"> <input type ="text" id="size7" value= {{ $details->size7 }} class="form-control" readonly name="size7"   width="5%"/></th>
                                        <th width="5%"> <input type ="text" id="size8"  value= {{ $details->size8 }} class="form-control" readonly name="size8"   width="5%"/></th>
                                        </tr></thead>
                                        <tr><td>Weight</td>
                                            <td><input type="text" value= {{ $details1->size1 }}  name="weight_0" class="form-control"></td>
                                            <td><input type="text" value= {{ $details1->size2 }}  name="weight_1" class="form-control"></td>
                                            <td><input type="text" value= {{ $details1->size3 }}  name="weight_2" class="form-control"></td>
                                            <td><input type="text" value= {{ $details1->size4 }}  name="weight_3" class="form-control"></td>
                                            <td><input type="text" value= {{ $details1->size5 }}  name="weight_4" class="form-control"></td>
                                            <td><input type="text" value= {{ $details1->size6 }}  name="weight_5" class="form-control"></td>
                                            <td><input type="text" value= {{ $details1->size7 }}  name="weight_6" class="form-control"></td>
                                            <td><input type="text" value= {{ $details1->size8 }}  name="weight_7" class="form-control"></td>
                                        </tr></table>
                                        

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
                                            <option value='{{ $department->id }}'
                                                {{ $department->id== $style->fabric_code1 ? 'selected' : ''}}>
                                                {{ $department->name }}</option>
    
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
                                   <option value='{{ $department->id }}'
                                   {{ $department->id== $style->colour_code1 ? 'selected' : ''}}>
                                   {{ $department->name }}</option>
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
                                   <option value='{{ $department->id }}'
                                   {{ $department->id== $style->fabric_code2 ? 'selected' : ''}}>
                                   {{ $department->name }}</option>
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
                                   <option value='{{ $department->id }}'
                                   {{ $department->id== $style->colour_code2 ? 'selected' : ''}}>
                                   {{ $department->name }}</option>
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
                                   <option value='{{ $department->id }}'
                                   {{ $department->id== $style->fabric_code3 ? 'selected' : ''}}>
                                   {{ $department->name }}</option>
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
                                   <option value='{{ $department->id }}'
                                   {{ $department->id== $style->colour_code3 ? 'selected' : ''}}>
                                   {{ $department->name }}</option>
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
                                   <option value='{{ $department->id }}'
                                   {{ $department->id== $style->fabric_code4 ? 'selected' : ''}}>
                                   {{ $department->name }}</option>
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
                                   <option value='{{ $department->id }}'
                                   {{ $department->id== $style->colour_code4 ? 'selected' : ''}}>
                                   {{ $department->name }}</option>
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
                                   <option value='{{ $department->id }}'
                                   {{ $department->id== $style->fabric_code5 ? 'selected' : ''}}>
                                            {{ $department->name }}</option>
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
                                   <option value='{{ $department->id }}'
                                   {{ $department->id== $style->colour_code5 ? 'selected' : ''}}>
                                   {{ $department->name }}</option>
                                   @endforeach
                                </select>
                                </div>
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
