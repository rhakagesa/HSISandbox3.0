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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itemCreate">
                        <i class="fa fa-plus"></i>    
                        Add Item
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
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($itemData as $items)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$items->item_name}}</td>
                                    <td>{{$items->name_item_type}}</td>
                                    <td>{{$items->item_price}}</td>
                                    <td>{{$items->stocks}}</td>
                                    <td>
                                        <a href="#itemEdit{{$items->id}}" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-edit"></i>Edit</a>
                                        <a href="#itemDelete{{$items->id}}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Remove</a>
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


<div class="modal fade bd-example-modal-lg" id="itemCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Item</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/item/store" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="item_name">Name Item</label>
                    <input type="text" class="form-control" name="item_name" placeholder="Name Item" required>
                </div>
                <div class="form-group">
                <label for="item_type_id">Item Type</label>
                    <select name="item_type_id" class="form-control" required>
                        <option value="">Select Item Type</option>
                        @foreach($itemTypeData as $itemTypes)
                        <option value="{{$itemTypes->id}}">{{$itemTypes->name_item_type}}</option>
                        @endforeach
                    </select>
                </div>  
                <div class="form-group">
                    <label for="item_price">Item Price</label>
                    <input type="number" class="form-control" name="item_price" placeholder="Item Price" required>
                </div>
                <div class="form-group">
                    <label for="stocks">Stock</label>
                    <input type="number" class="form-control" name="stocks" placeholder="Stock" required>
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

@foreach($itemData as $itemEdit)
<div class="modal fade bd-example-modal-lg" id="itemEdit{{$itemEdit->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Item</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/item/update/{{$itemEdit->id}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="item_name">Name Item</label>
                    <input type="text" class="form-control" name="item_name" placeholder="Name Item" required>
                </div>
                <div class="form-group">
                <label for="item_type_id">Item Type</label>
                    <select name="item_type_id" class="form-control" required>
                        <option value="" hidden>Select Item Type</option>
                        @foreach($itemTypeData as $itemTypeDataEdit)
                        <option value="{{$itemTypeDataEdit->id}}">{{$itemTypeDataEdit->name_item_type}}</option>
                        @endforeach
                    </select>
                </div>  
                <div class="form-group">
                    <label for="item_price">Item Price</label>
                    <input type="number" class="form-control" name="item_price" placeholder="Item Price" required>
                </div>
                <div class="form-group">
                    <label for="stocks">Stock</label>
                    <input type="number" class="form-control" name="stocks" placeholder="Stock" required>
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

@foreach($itemData as $itemDelete)                            
<div class="modal fade bd-example-modal-lg" id="itemDelete{{$itemDelete->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove Item Type</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="/item/destroy/{{$itemDelete->id}}" method="get">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <h5>Do you want to remove this item data ?</h5>
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