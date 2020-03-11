<?php
    // Initialize the session
    session_start(); 
    include 'includes/header.php';
?>

<section class="gallery-block grid-gallery">
    <div class="container">
        <div class="row">
            <?php
                include ("includes/connect.php");

                $sql = "SELECT * FROM images";

                if($stmt = mysqli_prepare($link, $sql)){
                    if(mysqli_stmt_execute($stmt)){
                        $result = $stmt->get_result();
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<div class="col-md-6 col-lg-4 item">
                                <a data-toggle="modal" data-target="#image-modal" href="#image-modal" data-filename="'.$row["filename"].'" data-title="'.$row["title"].'" data-user="'.$row["user"].'" data-description="'.$row["description"].'" class="openImageDialog">
                                    <img class="img-fluid image scale-on-hover" src="'.$row["filename"].'">
                                </a>
                            </div>';
                        }
                        
                        echo '</div>
                            </div>
                                <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="image-modal-label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="image-modal-label">Title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">x</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="modal-image" class="img-fluid image" src="" alt="">
                                                <p id="modal-description">Description</p>
                                            </div>
                                            <div class="modal-footer">
                                                <p id="modal-user">User</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>';                         
                        }
                        mysqli_stmt_close($stmt);
                    }
                    mysqli_close($link);
        
    
            ?>

<?php
    include 'includes/footer.php';
?>