<?php
    // Initialize the session
    session_start();
    include 'includes/header.php';
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>

<section>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 order-1">
                <div class="p-5">
                    <h2 class="display-4">Submit a dog!</h2>
                    <p>We're always looking for more dogs to fill the Doghouse. Use the form to submit a picture, and we'll invite it on in.</p>   
                </div>
            </div>

            <div class="col-md-6 order-2">
                <div class="p-5">
                    <form class="container" action="upload.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image-title">Image title</label>
                            <input type="text" class="form-control" id="image-title" name="image-title">
                        </div>
                        <div class="form-group">
                            <label for="image-upload">Select image to upload:</label>
                            <input type="file" class="form-control-file" name="fileToUpload" id="image-upload">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    include 'includes/footer.php';
?>