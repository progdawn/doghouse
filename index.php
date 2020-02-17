<?php
// Initialize the session
session_start();
 
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="css/main.css" rel="stylesheet">
        <title>Doghouse</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Dogs<span class="sr-only">(current)</span></a>
                    </li>
                    <?php
                        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                            echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link" href="upload-dog.php">Upload</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="account.php">Account</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </nav>

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


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
    </body>
</html>