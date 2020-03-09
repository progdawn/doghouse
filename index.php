<?php
    // Initialize the session
    session_start(); 
    include 'includes/header.php';
?>

<section class="gallery-block grid-gallery">
    <div class="container">
        <div class="row">
            <?php
                include ("connect.php");

                $sql = "SELECT * FROM images";

                if($stmt = mysqli_prepare($link, $sql)){
                    if(mysqli_stmt_execute($stmt)){
                        $result = $stmt->get_result();
                        while($row = $result->fetch_array(MYSQLI_NUM)){
                            echo '<div class="col-md-6 col-lg-4 item"><a data-toggle="modal" data-target="#image-modal" href="#image-modal" data-name="'.$row[1].'" class="openImageDialog"><img class="img-fluid image scale-on-hover" src="'.$row[1].'"></a></div>';
                        }
                    }
                    mysqli_stmt_close($stmt);
                }
                mysqli_close($link);
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
