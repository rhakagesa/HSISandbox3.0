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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itemTypeCreate">
                        <i class="fa fa-plus"></i>    
                        Add Item Type
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Item Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($itemTypeData as $itemType)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$itemType->name_item_type}}</td>
                                    <td>
                                        <a href="#itemTypeEdit{{$itemType->id}}" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-edit"></i>Edit</a>
                                        <a href="#itemTypeDelete{{$itemType->id}}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Remove</a>
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


<div class="modal fade bd-example-modal-lg" id="itemTypeCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Item Type</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/itemtype/store" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name_item_type">Item Type</label>
                    <input type="text" class="form-control" name="name_item_type" placeholder="Item Type" required>
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

@foreach($itemTypeData as $itemTypeEdit)                            
<div class="modal fade bd-example-modal-lg" id="itemTypeEdit{{$itemTypeEdit->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Item Type</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/itemtype/update/{{$itemTypeEdit->id}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="name_item_type">Item Type</label>
                    <input type="text" value="{{$itemTypeEdit->name_item_type}}" class="form-control" name="name_item_type" placeholder="Item Type" required>
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

@foreach($itemTypeData as $itemTypeDelete)                            
<div class="modal fade bd-example-modal-lg" id="itemTypeDelete{{$itemTypeDelete->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove Item Type</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/itemtype/destroy/{{$itemTypeDelete->id}}" method="get">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <h5>Do you want to remove this item type data ?</h5>
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