$(document).on('click', '.pagination a', function (e) {
    e.preventDefault();

    var page = $(this).attr('href').split('page=')[1];
    getClothes(page);
});


$(document).on('click', '#createClothButton', function (e) {
    e.preventDefault();

    $.ajax({
        url: "/cloth",
        type: 'POST',
        data: $('#createClothesForm').serialize(),
        dataType: 'json',
        success: function (result) {
            if(result.success) {
                $('#error').css('display','none');;
                getClothes(1);
                $('#createClothesForm')[0].reset();
                $('#createClothButton').modal('toggle');
            } else {
                $('#createClothesForm p#error').css('display','block');
            }
        }
    });
});

function getClothes(page)
{
    $.ajax({
        url: "/cloth",
        type: 'GET',
        data: {
            page: page
        },
        dataType: 'json',
        success: function (result) {
            $('#clothesTable').html(result);
        }
    });
}

$(document).on('click', '#createModal', function () {
    $('#createClothesForm')[0].reset();
});