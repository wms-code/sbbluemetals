@extends('layouts.admin')

@section('pagetitle','Fabric Stock List')
    
@push('script')
<script src="{{ url('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>

@endpush


@section('content')               
        <div class="row">
                <div class="col-12">
                        <div class="card">
                                <div class="card-block">
                                        <div class="row justify-content-between">
                                                <div class="col-4">
                                                    <h4 class="card-title">Fabric Stock  List </h4>
                                                </div> 
                                              </div>
                                   
                                        <div class="table-responsive  m-t-40">
                                            <table id="myTable" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                         
                                                        <th>Fabric Name</th>
                                                        <th>Colour Name</th>                                                        
                                                         <th>Weight</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($accounts as $d)
                                                    <tr>
                                                
                                                                                                  
                                                        <td>{{$d->fabricsname}}</td>                                               
                                                        <td>{{$d->colourssname}}</td>                 
                                                        <td>{{$d->total}}</td>  
                                                                    
                                                      
                                                    </tr>   
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
        
                                           
                                        </div>
                                </div>
                        </div>

                </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
@endsection
