$.fn.dataTable.ext.order['dom-text'] = function(settings, col) {
    return this.api().column(col, {
        order: 'index'
    }).nodes().map(function(td, i) {
        return $('input', td).val();
    });
}
$.fn.dataTable.ext.order['dom-text-numeric'] = function(settings, col) {
    return this.api().column(col, {
        order: 'index'
    }).nodes().map(function(td, i) {
        return $('input', td).val() * 1;
    });
}
/* Create an array with the values of all the select options in a column */
$.fn.dataTable.ext.order['dom-select'] = function(settings, col) {
    return this.api().column(col, {
        order: 'index'
    }).nodes().map(function(td, i) {
        return $('select', td).val();
    });
}
/* Create an array with the values of all the checkboxes in a column */
$.fn.dataTable.ext.order['dom-checkbox'] = function(settings, col) {
    return this.api().column(col, {
        order: 'index'
    }).nodes().map(function(td, i) {
        return $('input', td).prop('checked') ? '1' : '0';
    });
}
/* Initialise the table with the required column ordering data types */
// $(document).ready(function() {
$('#example').DataTable({
    "columns": [
        null,
        {
            "orderDataType": "dom-text-numeric"
        },
        {
            "orderDataType": "dom-text",
            type: 'string'
        },
        {
            "orderDataType": "dom-select"
        }
    ],
    "oLanguage": {
        "oPaginate": {
            "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
            "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
        },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Results :  _MENU_",
    },
    "stripeClasses": [],
    "lengthMenu": [7, 10, 20, 50],
    "pageLength": 7
});

$(document).ready(function (){
    $('#brand-form').on('submit', function(event){
        event.preventDefault();
        var brandName =$('#brand-name').val();
        $.ajax (
            {
                url :'brands-store',
                method:'POST',
                data:{
                    _token:$('meta[name="csrf-token"]').attr('content'),
                    name:brandName,
                },
                success:function(data){

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Brand Created",
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
});

$(document).ready(function () {

    var changedArray = [];

    // Listen for changes in the form elements within each row
    $('#brandTable').on('keyup change', 'input, select', function () {
        // Get the closest <tr> parent
        var row = $(this).closest('tr');
        
        // Build an array of changed values
        var changedValues = {
            'brandid': row.find('#brandid').text(),
            'brandname': row.find('#brand-name').val(),
            'createdate': row.find('#createdate').val(),
            'activestatus': row.find('#activestatus').val()
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

    $('.update-brand').on("click", function() {

        $.ajax (
            {
                url :'brands-update',
                method:'POST',
                data:{
                    _token:$('meta[name="csrf-token"]').attr('content'),
                    changedArray: changedArray,
                },
                success:function(data){

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Brands Updated",
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

    $('.delete-brand').on("click", function() {

        var brand_id = $(this).attr("data-id");

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
                    url :'brand-delete',
                    method:'POST',
                    data:{
                        _token:$('meta[name="csrf-token"]').attr('content'),
                        brand_id: brand_id,
                    },
                    success:function(data){
        
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "Brand Deleted",
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