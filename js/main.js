$(document).on("click", ".openImageDialog", function () {
    console.log('Ok');
});

$(document).on("click", ".openImageDialog", function () {
    var imageId = $(this).data('id');
});

$(document).on("click", ".openImageDialog", function () {
    var imageId = $(this).data('id');
    $(".modal-body #modal-image").attr("src", imageId);
});