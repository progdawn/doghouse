$(document).on("click", ".openImageDialog", function () {
    var imageId = $(this).data('filename');
    var imageTitle = $(this).data('title');
    var imageUser = $(this).data('user');
    var imageDescription = $(this).data('description');
    var modal = $('#image-modal');
    $(".modal-body #modal-image").attr("src", imageId);
    modal.find('.modal-title').text(imageTitle);
    modal.find('#modal-description').text(imageDescription);
    modal.find('#modal-user').text('Uploaded by ' + imageUser);
});
