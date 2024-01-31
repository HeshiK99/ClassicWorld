$(document).ready(function () {

    $(".invoice-item").on("click", function() {

        var invoice_id = $(this).attr("data-invoice-id");
        console.log(invoice_id);

        $.ajax(
        {
            url: '/get-invoice-details',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                invoice_id: invoice_id,
            },
            success: function (data) {
                console.log(data);

                $(".inv-customer-name").html(data.user['name']);
                $(".inv-street-addr").html(data.user['address']);
                $(".inv-email-address").html(data.user['email']);

                $(".inv-number").html('#' + data.order['id']);
                var formattedDate = moment(data.order['date']).format("DD MMM YYYY");
                $(".inv-date").html(formattedDate);

                var items = data.order_items;

                var tableHtml = '<table class="table">' +
                                    '<thead>' +
                                        '<tr>' +
                                            '<th scope="col">S.No</th>' +
                                            '<th scope="col">Items</th>' +
                                            '<th class="text-right" scope="col">Qty</th>' +
                                            '<th class="text-right" scope="col">Unit Price</th>' +
                                            '<th class="text-right" scope="col">Amount</th>' +
                                        '</tr>' +
                                    '</thead>' +
                                    '<tbody>';

                // Iterate over the array and create rows
                items.forEach(function(items, index) {
                    tableHtml += '<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + items.name + '</td>' +
                                    '<td class="text-right">' + items.quantity + '</td>' +
                                    '<td class="text-right">LKR ' + items.individual_price + '</td>' +
                                    '<td class="text-right">LKR ' + items.price + '</td>' +
                                '</tr>';
                });

                tableHtml += '</tbody></table>';
                $('.table-responsive').html(tableHtml);

                $(".sub-total").html(data.order['total']);
                $(".grand-total").html(data.order['total']);

                console.log(data.order_items);
            },
            error: function (error) {
                console.error(error.reponseText);
            },
        });

    });

});