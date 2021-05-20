function cartUpdate(event) {
    event.preventDefault();
    let urlUpdateCart = $('.update_cart_url').data('url');
    let id = $(this).data('id');
    let quantity = $(this).parents('tr').find('input.quantity').val();

    $.ajax({
        type: 'GET',
        url: urlUpdateCart,
        data: {
            id: id,
            quantity: quantity
        },
        success: function (data) {
            if (data.code === 200) {
                $('.shop-cart').html(data.cart_component);
            }
        },
        error: function () {

        }
    });
}

function cartDelete(event){
    event.preventDefault();
    let urlDeleteCart = $('.cart').data('url');
    let id = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: urlDeleteCart,
        data: {
            id: id
        },
        success: function (data) {
            if (data.code === 200) {
                $('.shop-cart').html(data.cart_component);
            }
        },
        error: function () {

        }
    });
}

$(function () {
    $(document).on('click', '.cart_update', cartUpdate);
    $(document).on('click', '.cart_delete', cartDelete);
});
