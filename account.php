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

                $sql = "SELECT filename FROM images WHERE user = ?";

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
<?php
    include 'includes/footer.php';
?>