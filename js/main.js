$(document).on("click", ".openImageDialog", function () {
    console.log('Ok');
});

$(document).on("click", ".openImageDialog", function () {
    var imageId = $(this).data('name');
});

$(document).on("click", ".openImageDialog", function () {
    var imageId = $(this).data('name');
    $(".modal-body #modal-image").attr("src", imageId);
});