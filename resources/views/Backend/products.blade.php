@extends('Backend.Layout.app')
@section('content')

<style>
#preview-container {
    display: flex;
    flex-wrap: wrap;
    margin-top: 20px;
}

.preview-image {
    max-width: 150px;
    /* Set the desired max-width */
    max-height: 150px;
    /* Set the desired max-height */
    margin: 0 10px 10px 0;
}
</style>

<div id="content" class="main-content">
    <!--div class="container">
        <div class="container"-->


    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Add Products</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form id="products-form">
                    @csrf
                    <div class="row mb-4">
                        <div class="col">
                            <select class="form-control basic" id="category-id">
                                @foreach ($categories as $single_category)
                                <option value="{{$single_category->id}}">{{$single_category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <input type="text" class="form-control" placeholder="Product Name" id="product-name"
                                name="product-name">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Price" id="product-price"
                                name="product-price">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Quantity" id="product-quantity"
                                name="product-quantity">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <input type="file" name="fileInput" id="fileInput" accept=".jpg, .jpeg, .png, .webp">
                            <div id="preview-container" style="width: 50%; height: 50%;"></div>
                        </div>
                    </div>
                    <input type="submit" name="time" class="btn btn-primary">
                </form>
            </div>

        </div>
    </div>
</div>

</div>
</div>
<!--/div-->
<!--/div-->
</div>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mt-4 mb-4">
                        <table id="productTable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Categories</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $single_product)
                                <tr>
                                    <td id="product_id" name="product_id" class="d-none">{{$single_product->id}}</td>
                                    <td><select size="1" id="category_id" class="form-control" name="category_id">
                                            @foreach ($categories as $single_category)
                                            <option value="{{$single_category->id}}" @if($single_product->category_id ==
                                                $single_category->id) selected="selected" @endif>
                                                {{$single_category->name}}
                                            </option>
                                            @endforeach

                                        </select></td>


                                    <td><input type="text" id="productname" class="form-control" name="productname"
                                            value="{{$single_product->name}}"></td>
                                    <td><input type="text" id="productprice" class="form-control" name="productprice"
                                            value="{{$single_product->price}}"></td>
                                    <td><input type="text" id="productquantity" class="form-control" readonly
                                            name="productquantity" value="{{$single_product->quantity}}"></td>
                                    <td><select size="1" id="product_status" class="form-control"
                                            name="product_status">
                                            <option value="1" @if($single_product->active == 1)selected="selected"
                                                @endif>
                                                Active
                                            </option>
                                            <option value="0" @if($single_product->active == 0)selected="selected"
                                                @endif>
                                                Deactive
                                            </option>

                                    </select></td>
                                    <td style="text-align: center;">
                                        <input type="submit" name="time" class="btn btn-danger delete-product" data-id="{{$single_product->id}}" value="Delete">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Categories</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="submit" name="time" class="btn btn-primary update-product" value="Update">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->
<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{asset('backend/plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('js/pages/backend_product.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('fileInput').addEventListener('change', handleFileSelect);

function handleFileSelect(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById('preview-container');
    previewContainer.innerHTML = '';

    for (const file of files) {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewImage = document.createElement('img');
                previewImage.className = 'preview-image';
                previewImage.src = e.target.result;
                previewContainer.appendChild(previewImage);
            };

            reader.readAsDataURL(file);
        }
    }
}
</script>
@stop