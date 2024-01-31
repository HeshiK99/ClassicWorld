$(".login-add-cart").on("click", function () {

    var route = $(".called-route").html();

    $.ajax(
        {
            url: '/update-route-session',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                update_route: route
            },
            success: function (data) {
                console.log("session created successful");
                window.location.href = "/login";
            },
            error: function (error) {
                console.error(error.reponseText);
            },
        });

});

$(".add-cart").on("click", function () {

    var product_id = $(".product-id").html();
    var quantity = $(".quantity").val();

    $.ajax(
        {
            url: '/add-to-cart',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: product_id,
                quantity: quantity
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

$(".review-submit-login").on("click", function () {

    window.location.href = "/login";

});

$(".review-submit").on("click", function () {
    event.preventDefault();
    var review = $(".review").val();
    var product_id = $('.review-product-id').html();

    $.ajax(
        {
            url: '/post-review',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                review: review,
                product_id: product_id
            },
            success: function (data) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Review Submitted",
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

$(document).ready(function () {
    $(".show-reviews").click(function () {
        
        var targetOffset = $(".comments-area").offset().top;

        $("html, body").animate({
            scrollTop: targetOffset
        }, 1000);
    });

    $(".open-comment-form").click(function () {
        
        var targetOffset = $(".comment-respond").offset().top;

        $("html, body").animate({
            scrollTop: targetOffset
        }, 1000);
    });
});