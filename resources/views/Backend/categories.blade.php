@extends('Backend.Layout.app')
@section('content')
<div id="content" class="main-content">
    <!-- <div class="container">
        <div class="container"> -->
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">

            <div class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Add Categories</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{route('categories.store')}}" method="post" id="categories-form">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <select class="form-control basic" id="brand-id" name="brand_id">
                                        @foreach ($brands as $single_brand)
                                        <option value="{{$single_brand->id}}">{{$single_brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">

                                    <input type="text" class="form-control" placeholder="Categories" id="category-name"
                                        name="categoryname">
                                    <!-- <select name="brand_id" id="brand-id"></select> -->
                                </div>

                            </div>
                            <input type="submit" class="btn btn-primary">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- </div>
    </div> -->

</div>
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mt-4 mb-4">
                        <table id="categoryTable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created_Date</th>
                                    <th>Active</th>
                                    <th>Brand</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $single_categories)
                                <tr>
                                    <td id="category_id" name="category_id">{{$single_categories->id}}</td>
                                    <td><input type="text" id="category_name" class="form-control" name="category_name"
                                            value="{{$single_categories->name}}"></td>
                                    <td><input type="date" id="category_created" class="form-control" readonly
                                            name="category_created"
                                            value="{{ ProductHelper::viewDateInput($single_categories->created_at) }}">
                                    </td>
                                    <td><select size="1" id="category_status" class="form-control"
                                            name="category_status">
                                            <option value="1" @if($single_categories->active == 1)selected="selected"
                                                @endif>
                                                Active
                                            </option>
                                            <option value="0" @if($single_categories->active == 0)selected="selected"
                                                @endif>
                                                Deactive
                                            </option>

                                        </select></td>
                                    <td><select size="1" id="brand_id" class="form-control"
                                            name="brand_id">
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" @if($brand->id ==
                                                $single_categories->brand_id) selected="selected"
                                                @endif>
                                                {{ $brand->name }}
                                            </option>
                                            @endforeach

                                        </select></td>
                                    <td style="text-align: center;">
                                        <input type="submit" name="time" class="btn btn-danger delete-category" data-id="{{$single_categories->id}}" value="Delete">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created_Date</th>
                                    <th>Active</th>
                                    <th>Brand</th>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="submit" name="time" class="btn btn-primary update-category" value="Update">
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {

        var changedArray = [];

        // Listen for changes in the form elements within each row
        $('#categoryTable').on('keyup change', 'input, select', function () {
            // Get the closest <tr> parent
            var row = $(this).closest('tr');
            
            // Build an array of changed values
            var changedValues = {
                'categoryid': row.find('#category_id').text(),
                'categoryname': row.find('#category_name').val(),
                'createdate': row.find('#category_created').val(),
                'activestatus': row.find('#category_status').val(),
                'brandid': row.find('#brand_id').val()
            };

            // Check if the row is already in the changedArray
            var existingIndex = changedArray.findIndex(function (item) {
                return item.brandid === changedValues.brandid;
            });

            // If the row is not in the changedArray, add it; otherwise, update the existing entry
            if (existingIndex === -1) {
                changedArray.push(changedValues);
            } else {
                changedArray[existingIndex] = changedValues;
            }

            // Log the updated array of changed values to the console
            console.log(changedArray);
        });

        $('.update-category').on("click", function() {

            $.ajax (
            {
                url :'categories-update',
                method:'POST',
                data:{
                    _token:$('meta[name="csrf-token"]').attr('content'),
                    changedArray: changedArray,
                },
                success:function(data){

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Categories Updated",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    location.reload();

                },
                error:function(error){
                    console.error(error.reponseText);
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "Try Again",
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
            });
        });

        $('.delete-category').on("click", function() {

            var category_id = $(this).attr("data-id");

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax (
                    {
                        url :'category-delete',
                        method:'POST',
                        data:{
                            _token:$('meta[name="csrf-token"]').attr('content'),
                            category_id: category_id,
                        },
                        success:function(data){

                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Category Deleted",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            location.reload();

                        },
                        error:function(error){
                            console.error(error.reponseText);
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: "Try Again",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        },
                    });
                }
            });
        });

    });
</script>

<script>
    // Check if the session has a success message and show SweetAlert
    @if(session()->has('success'))
        Swal.fire({
            position: "top-end",
            icon: 'success',
            title: 'Success!',
            text: '{{ session()->get('
            success ') }}',
            showConfirmButton: false,
            timer: 3000 // Set the timer for auto-close if needed
        });
    @elseif(session()->has('error'))
        Swal.fire({
            position: "top-end",
            icon: 'error',
            title: 'Error!',
            text: '{{ session()->get('
            success ') }}',
            showConfirmButton: false,
            timer: 3000 // Set the timer for auto-close if needed
        });
    @endif
</script>

@stop