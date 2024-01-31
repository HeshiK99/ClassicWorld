$(".product-remove").on("click", function() {

    var product_id = $(this).attr("data-id");

    $.ajax(
    {
        url: '/remove-from-cart',
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: product_id
        },
        success: function (data) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Item Removed",
                showConfirmButton: false,
                timer: 1500
            });
            location.reload();
        },
        error: function (error) {
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