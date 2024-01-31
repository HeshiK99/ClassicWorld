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
                                <h4>Add Brand</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form id="brand-form">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Brand Name" id="brand-name"
                                        name="brandname" required>
                                </div>
                                <!-- <div class="col">
                                        <input type="text" class="form-control" placeholder="Last name">
                                    </div> -->
                            </div>
                            <input type="submit" name="time" class="btn btn-primary">

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- </div> -->
    <!-- </div> -->
</div>
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mt-4 mb-4">
                        <table id="brandTable" class="table table-hover" style="width:100%">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created_Date</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($brands as $single_brand)
                                <tr>
                                    <td id="brandid" name="brandid">{{$single_brand->id}}</td>
                                    <td><input type="text" id="brand-name" class="form-control" name="brandname"
                                            value="{{$single_brand->name}}"></td>
                                    <td><input type="date" id="createdate" class="form-control" name="createdate" readonly
                                            value="{{ ProductHelper::viewDateInput($single_brand->created_at) }}"></td>
                                    <td><select size="1" id="activestatus" class="form-control" name="activestatus">
                                            <option value="1" @if($single_brand->active == 1)selected="selected" @endif>
                                                Active
                                            </option>
                                            <option value="0" @if($single_brand->active == 0)selected="selected" @endif>
                                                Deactive
                                            </option>

                                        </select></td>
                                    <td style="text-align: center;">
                                        <input type="submit" name="time" class="btn btn-danger delete-brand" data-id="{{$single_brand->id}}" value="Delete">
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Craeted_Date</th>
                                    <th>Active</th>
                                </tr>
                            </tfoot>
                        </table>
                        <input type="submit" name="time" class="btn btn-primary update-brand" value="Update">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--  END CONTENT AREA  -->
</div>


<!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
<script src="{{asset('backend/plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('js/pages/backend_brands.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stop