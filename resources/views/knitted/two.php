
@extends('layouts.admin')

@section('pagetitle','Knitted Fabric Inward') 
@section('content')    
<input type="textbox" id="ToSend" Width="300px"> 

<ul>
<li value="smile" class="smile">example 1</li>
<li value="smile" class="smile">example 2</li>
</ul>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script>

$(document).on('click', 'li', function(){  
                
                  $(ToSend).val($(this).text());  
                  $('#idcountryList1').fadeOut();  
              });  
</script>
@endsection