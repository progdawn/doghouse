$(document).on("click", ".openImageDialog", function () {
    console.log('Ok');
});

$(document).on("click", ".openImageDialog", function () {
    var imageId = $(this).data('filename');
    var imageTitle = $(this).data('title');
    var modal = $(this);
});

$(document).on("click", ".openImageDialog", function () {
    var imageId = $(this).data('filename');
    var imageTitle = $(this).data('title');
    var modal = $('#image-modal');
    $(".modal-body #modal-image").attr("src", imageId);
    modal.find('.modal-title').text(imageTitle);
});
