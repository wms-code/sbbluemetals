@extends('layouts.admin') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Add New Role</div>

                <div class="card-body">
    @include('admin.message')
                    <form action="{{ route('admin.role.store') }}" method="post">
                        @csrf
                        <div class="form-group col-md-10">
                            <label for="role">Role Name</label>
                            <input type="text" placeholder="Give an awesome name for role" name="name" class="form-control" id="role" required>
                        </div>
                        <div class="offset-sm-3 col-md-7">
                            <a href="{{ route('admin.roles') }}" class="btn btn-danger">Back</a>
                            &nbsp; &nbsp; &nbsp;
                        <button type="submit" class="btn btn-primary">Store</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection