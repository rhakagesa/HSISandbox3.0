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
                        <h4 class="card-title">Setting Discount</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @foreach($discount as $setDiscount)
                        <form action="/discount/update/{{$setDiscount->id}}" method="post">
                        @csrf
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th><label for="shipping_total">Set Shipping Total</label></th>
                                    <th><label for="item_discount">Set Discount</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="bg-light">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="shipping_total" value="{{$setDiscount->shipping_total}}">    
                                                <div 
                                                    class="input-group-prepend"><span class="input-group-text">Rp.</span>
                                                </div>
                                        </div>
                                    </td>
                                    <td class="bg-light">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="item_discount" value="{{$setDiscount->item_discount}}">
                                                <div 
                                                    class="input-group-append"><span class="input-group-text">%</span>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save">Save changes</i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>

@endsection