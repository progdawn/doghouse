<?php
    // Initialize the session
    session_start(); 
    include 'includes/header.php';
?>

<section class="gallery-block grid-gallery">
    <div class="container">
        <div class="row">
            <?php
                $dirname = "dog-images/*";
                $images = glob($dirname);
                $imageCounter = 0;

                foreach($images as $image) {
                    echo '<div class="col-md-6 col-lg-4 item"><a data-toggle="modal" data-target="#image-modal" href="#image-modal" data-id="'.$image.'" class="openImageDialog"><img class="img-fluid image scale-on-hover" src="'.$image.'"></a></div>';
                    $imageCounter++;
                }
            ?>
        </div>
    </div>
    <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="image-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="image-modal-label">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modal-image" class="img-fluid image" src="" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</section>   

<?php
    include 'includes/footer.php';
?>
