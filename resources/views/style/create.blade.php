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
                        <form action="{{ url('admin/style') }}" method="post" class="form-horizontal form-bordered">
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
                                <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Size Name</label>
                                        <div class="col-md-6">
                                            <select class="form-control js-example-basic-single"
                                             id='size_code'
                                            name='size_code'>                                
                                            @foreach($size as $department)
                                            <option value="0">--Select--</option>
                                              <option value='{{ $department->id }}'>{{ $department->name }}</option>
                                            @endforeach
                                         </select>
                                        </div>
                                    </div>
                            <div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
                                    <div id='d'>
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
         html='<table border="1" class="form-control table"><thead><tr>';
         html+='<th width="2%">S.No</th>';        
        var total=0;
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
        var size_code=$('#size_code').val();
        var _token = $('input[name="_token"]').val(); 
        var size1,size2,size3,size4,size5,size6,size7,size8;
        $.ajax({
              url:"{{ route('size.fetchtable') }}",
              method:"POST", 
              data:{_token:_token,size_code:size_code},  
              success: function(response){   
                $.each(response, function (index, value) {
                    total=0;


                    // console.log(response.size1);
                   //  console.log(JSON.stringify(response));
                     //console.log(JSON.stringify(response)->size1);
                    //console.log(response.GetDataResult.size1);
                    size1=(this.size1);size2=(this.size2);size3=(this.size3);size4=(this.size4);
                    size5=(this.size5);size6=(this.size6);size7=(this.size7);size8=(this.size8);
                    if (!!size1) 
                    {
                       total=1;
                       html+='<th width="5%">'+size1+'</th>';
                    }
                    if (!!size2) 
                    {
                       total=total+1;
                       html+='<th width="5%">'+size2+'</th>';
                    }
                    if (!!size3) 
                    {
                       total=total+1;
                       html+='<th width="5%">'+size3+'</th>';
                    }
                    if (!!size4) 
                    {
                       total=total+1;
                       html+='<th width="5%">'+size4+'</th>';
                    }
                    if (!!size5) 
                    {
                       total=total+1;
                       html+='<th width="5%">'+size5+'</th>';
                    }
                    if (!!size6) 
                    {
                       total=total+1;
                       html+='<th width="5%">'+size6+'</th>';
                    }
                    if (!!size7) 
                    {
                       total=total+1;
                       html+='<th width="5%">'+size7+'</th>';
                    }
                    if (!!size8) 
                    {
                       total=total+1;
                       html+='<th width="5%">'+size8+'</th>';
                    }
                   
                    html+='</tr></thead>';
                    html+='<tr><td>Weight</td>';
                    var i=0;
                    for(i = 0;i < total;i++)
                    {
 html+='<td><input type="text" name="weight[]"  id="weight_'+i+'" class="form-control"></td>';
                    }
                    html+='</tr></table>';
                    
                    $('#d').html(html);
                })
               // var dataa = response.split("$");
			  //   $("#remarks").val(dataa[0]);
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
