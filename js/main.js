$(document).on("click", ".openImageDialog", function () {
    var imageFilename = $(this).data('filename');
    var imageTitle = $(this).data('title');
    var imageUser = $(this).data('user');
    var imageDescription = $(this).data('description');
    var imageId = $(this).data('id');
    var modal = $('#image-modal');
    $(".modal-body #modal-image").attr("src", imageFilename);
    modal.find('.modal-title').text(imageTitle);
    modal.find('#modal-description').text(imageDescription);
    modal.find('#modal-user').text('Uploaded by ' + imageUser);
    $('.modal-footer #modal-id').attr('href', ("image.php?id=" + imageId));
});
