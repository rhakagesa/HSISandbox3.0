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
                        <h4 class="card-title">Set Profile</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data User</h5>
                        </div>
                        <form action="/profile/update/{{$userData['id']}}" method="post">
                        @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Set Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$userData['name']}}">
                                </div>    
                                <div class="form-group">
                                    <label for="email">Set Email</label>
                                    <input type="text" class="form-control" name="email" value="{{$userData['email']}}"> 
                                </div>
                                <div class="form-group">
                                    <label for="password">Set Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mx-auto"><i class="fa fa-save">Save changes</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>

@endsection