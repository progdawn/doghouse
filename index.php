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
                    echo '<div class="col-md-6 col-lg-4 item"><img class="img-fluid image scale-on-hover" src="'.$image.'"></div>';
                    $imageCounter++;
                }
            ?>
        </div>
    </div>
</section>   

<?php
    include 'includes/footer.php';
?>
