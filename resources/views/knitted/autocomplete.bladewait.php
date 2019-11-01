@extends('layouts.admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('pagetitle','Inward Knitted Fabric')
@section('content')


 <!-- Department Dropdown -->
 Department : <select id='sel_depart1' name='sel_depart'>
    <option value='0'>-- Select department --</option>

    <!-- Read Departments -->
    @foreach($rsdepartmentData['data'] as $department)
      <option value='{{ $department->country_name }}'>{{ $department->country_name }}</option>
    @endforeach

 </select>

 <!-- Department Dropdown -->
 Department : <select id='sel_emp1' name='sel_emp'>
    <option value='0'>-- Select department --</option> </select>
 <select id="sel_user">
    <option value="0">- Select -</option>
 </select>
  

 <script type='text/javascript'>

  $(document).ready(function(){

    //$('.sel_depart').change(function(){
      $(document).on('change', "[id^=sel_depart]", function(){
   //   var id = $(this).val();
    //  var name = $('div[id^="sel_depart"]');
    //  var nameid = $(this).attr('id');        
      var _token = $('input[name="_token"]').val();
    //  url: 'getEmployees/'+id,
      $.ajax({
           url:"{{ route('knittedfabric.fetch') }}",
           method:"POST", 
           data:{_token:_token},      
        //    dataType: 'json', 
           success: function(response){
                   
            var len = response.length;
            $("#sel_emp1").append(response);
                        
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





  });
});
    </script>
@endsection