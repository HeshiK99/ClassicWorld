$("#addItemsBtn").click(function () {
    
    var newRow = $(".single-product:first").clone(); // Clone the first row
    newRow.find("select").val("Select Product"); // Reset the dropdown
    newRow.find("input[type='text']").val(""); // Clear the quantity input
    $(".container-product").append(newRow); // Append the cloned row to the container

});

$("#stock-add").click(function (event) {
    event.preventDefault();

    var stockName = $('#stock-name').val();
    var stockDate = $('#stock-date').val();

    var dataArray = [];

    // Iterate through each row and push values to the array
    $(".row.mb-4.single-product").each(function () {
        var product = $(this).find("select").val();
        var quantity = $(this).find("input[type='text']").val();

        // Check if both product and quantity are not empty
        if (product !== "Select Product" && quantity !== "") {
            dataArray.push({
                product: product,
                quantity: quantity
            });
        }
    });

    $.ajax(
    {
        url: 'stock-store',
        method: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            stock_name: stockName,
            stock_date: stockDate,
            dataArray: dataArray

        },
        success: function (data) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Stock Created",
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

    // Log the array (you can send it to the server or perform any other action)
    console.log(dataArray);
});