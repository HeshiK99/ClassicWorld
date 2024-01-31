@extends('Backend.Layout.app')
@section('content')
<div id="content" class="main-content">

    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Add Stock</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form>
                    <div class="row mb-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Stock name" id="stock-name"
                                name="stock-name">
                        </div>
                        <div class="col">
                            <input type="date" id="stock-date" name="stock-date" class="form-control" placeholder="Recieved Date">
                        </div>
                    </div>
                    <h6> Add Stock Items </h6>
                    <div class="container-product">
                        <div class="row mb-4 single-product">
                            <div class="col">
                                <select class="form-control basic">
                                    @foreach($product as $single_product)
                                    <option value="{{ $single_product->id }}">{{ $single_product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Quantity">
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="stock-add" id="stock-add" class="btn btn-primary">
                    <input type="button" name="addItemsBtn" id="addItemsBtn" class="btn btn-primary" value="Add Items">
                </form>
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/pages/backend_stock.js')}}"></script>

@stop