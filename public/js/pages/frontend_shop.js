$(".product-add-to-cart").on("click", function() {

    var product_id = $(this).attr("data-id");

    $.ajax(
    {
        url: '/add-to-cart',
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            product_id: product_id,
            quantity: 1
        },
        success: function (data) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Item added to cart",
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

$(".filter-by-price").on("click", function() {
    
    var price_range = $('.price-amount').val();

    var matches = price_range.match(/\d+/g);
    var [min_value, max_value] = matches.map(Number);

    window.location.href = "/shop/filter-price/" + min_value + "/" + max_value;

});

$(document).ready(function() {
    $('.filter-dropdown').change(function() {
        var selectedUrl = $(this).val();
        console.log(selectedUrl);
        if (selectedUrl) {
            window.location.href = selectedUrl;
        }
    });
});