@extends('layout.layout')
@section('content')
<div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Data Table</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userCreate">
                        <i class="fa fa-plus"></i>    
                        Add User
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($userData as $user)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>
                                        <a href="#userEdit{{$user->id}}" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-edit"></i>Edit</a>
                                        <a href="#userDelete{{$user->id}}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>


<div class="modal fade bd-example-modal-lg" id="userCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Data User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/user/store" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="name">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="" hidden>Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="cashier">Cashier</option>
                    </select>
                </div>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo">Close</i></button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save">Save changes</i></button>
            </div>
            </form>
        </div>
    </div>
</div>

@foreach($userData as $userEdit)                            
<div class="modal fade bd-example-modal-lg" id="userEdit{{$userEdit->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/user/update/{{$userEdit->id}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{$userEdit->name}}" class="form-control" name="name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="email" value="{{$userEdit->email}}" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="name">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="name">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="" hidden>Select Role</option>
                        <option <?php if($userEdit->role == 'admin') echo "Selected";?> value="admin">Admin</option>
                        <option <?php if($userEdit->role == 'cashier') echo "Selected";?> value="cashier">Cashier</option>
                    </select>
                </div>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo">Close</i></button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save">Save changes</i></button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@foreach($userData as $userDelete)                            
<div class="modal fade bd-example-modal-lg" id="userDelete{{$userDelete->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove Data User</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/user/destroy/{{$userDelete->id}}" method="get">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <h5>Do you want to remove this user data ?</h5>
                </div>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo">Close</i></button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash">Remove</i></button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection