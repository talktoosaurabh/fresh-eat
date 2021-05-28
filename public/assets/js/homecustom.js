$(document).ready(function() {
    $('body').addClass('loaded');
    $(".select_category").on('change', function() {

        if ($(this).data('src') == 'products') {
            window.location.href = site_url + '/all_products/category/' + $(this).data('id');
        } else {
            window.location.href = site_url + '/all_products/sub-category/' + $(this).data('id');
        }
    });

    // $("#checkout-discount-input").on('change',function(){

    // })

    $(".update_cart_qty").on('change', function() {
        var cartid = $(this).attr('id');
        var qty = $(this).val();
        $.ajax({
            url: site_url + '/updatecartqty',
            method: "POST",
            data: { _token: $('input[name="_token"]').val(), "cart_id": cartid, "quantity": qty },
            dataType: "json",
            success: function(response) {
                if (response != '') {
                    $("#price_item_" + cartid).html(response.item_price);
                }
            }
        });
    });

    $(".pay_type").on('click', function() {
        $("#type_payment").val($(this).attr('id'));
    })

    $('#user_login').click(function(e) {

        e.preventDefault();
        var form = $("#pop_login");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            }
        });
        $.ajax({

            'url': site_url + '/userlogin',

            'data': form.serialize(),

            'type': 'POST',

            success: function(data) {
                debugger;
                if (data.error === true) {

                    if (data.messages !== undefined) {

                        for (var item in data.messages) {

                            var msg = data.messages[item];

                            form.find('#error-' + item).text(msg[0]);

                        }

                    }

                    if (data.messages.message_error !== undefined) {

                        form.find('.message-error').html(data.messages.message_error);

                    }


                }
                if (data.redirect !== undefined && data.redirect) {

                    window.location.href = data.redirect

                }
            }
        });


    })

    $(".shipping_type").on('change', function() {
        var total_price = $("#grand_total").val();
        var sum_total = parseInt(total_price) + parseInt($(this).val());
        var format_money = 'Rs. ' + sum_total;
        $("#total_grand").text(format_money);

    })

    $('#add_user').click(function(e) {

        e.preventDefault();

        let rform = $("#pop_register");

        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')

            }

        });

        $.ajax({

            'url': site_url + '/userregister',

            'data': rform.serialize(),

            'type': 'POST',

            success: function(data) {

                if (data.error === true) {

                    if (data.messages !== undefined) {

                        for (var item in data.messages) {

                            var msg = data.messages[item];

                            rform.find('#rerror_' + item).text(msg[0]);

                        }

                    }

                    if (data.messages.message_error !== undefined) {

                        rform.find('.rmessage-error').html(data.messages.message_error);

                    }

                }

                if (data.redirect !== undefined) {

                    window.location.href = data.redirect

                }

            },

        });

    })

});