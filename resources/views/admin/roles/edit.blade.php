@extends('layouts.admin') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit this Role</div>

                <div class="card-body">
                    <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                        @csrf @method('patch')                        
                        <div class="form-group col-md-10">
                            <label for="role">Role Name</label>
                            <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="role">
                        </div>
                        <div class="offset-sm-3 col-md-7">
                            <a href="{{ route('admin.roles') }}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-primary ">Change</button>&nbsp; &nbsp; &nbsp;
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection