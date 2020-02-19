<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Welcome</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Dogs</a>
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

        <section>
            <div class="container">
                <h1>Welcome back, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.</h1>
            </div>
            <div class="container">
                <ul class="list-group">
                    <li class="list-group-item"><a href="reset-password.php" class="btn btn-link">Reset Password</a></li>
                    <li class="list-group-item"><a href="logout.php" class="btn btn-link">Sign Out</a></li>
                </ul>
            </div>
        </section>

        <section class="gallery-block grid-gallery">
            <div class="container">
                <h2>Your Images</h2>
                <div class="row">
                    <?php
                        include ("connect.php");

                        $sql = "SELECT name FROM images WHERE user = ?";

                        if($stmt = mysqli_prepare($link, $sql)){
                            mysqli_stmt_bind_param($stmt, "s", $param_user);
                        
                            // Set parameters
                            $param_user = $_SESSION["username"]; 
                            if(mysqli_stmt_execute($stmt)){
                                $result = $stmt->get_result();
                                while($row = $result->fetch_array(MYSQLI_NUM)){
                                    foreach($row as $r)
                                        echo '<div class="col-md-6 col-lg-4 item"><img class="img-fluid image scale-on-hover" src="'.$r.'"></div>';
                                }
                            }
                            mysqli_stmt_close($stmt);
                        }
                        mysqli_close($link);
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