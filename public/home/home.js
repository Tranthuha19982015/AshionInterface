function addTocart(event) {
    event.preventDefault();
    let urlCart = $(this).data('url');
    $.ajax({
        type: 'GET',
        url: urlCart,
        dataType: 'json',
        success: function (data) {
            if (data.code === 200) {
                alert('Thêm thành công')
            }
        },
        error: function () {

        }
    });
}

$(function () {
    $(document).on('click','.add_to_cart', addTocart)
});
