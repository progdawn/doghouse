<?php
    // Initialize the session
    session_start(); 
    include 'includes/header.php';
?>

<section>
    <div class="container">
        <?php
            include ("includes/connect.php");

            $imageId = $_GET['id'];

            $sql = "SELECT * FROM images WHERE id = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "i", $param_imageId);
            
                // Set parameters
                $param_imageId = $imageId; 
                if(mysqli_stmt_execute($stmt)){
                    $result = $stmt->get_result();
                    while($row = mysqli_fetch_assoc($result)){
                            echo '<img class="img-fluid image" name="selected-image" id="selected-image" src="'.$row["filename"].'">
                            <h2 id="image-title" name="image-title">'.$row["title"].'</h2>
                            <p id="image-user" name="image-user">'.$row["user"].'</p>
                            <p id="image-date" name="image-date">'.$row["created_at"].'</p>
                            <p id="image-description" name="image-description">'.$row["description"].'</p>';
                    }
                }
                mysqli_stmt_close($stmt);
            }
            mysqli_close($link);
        ?>
    </div>
</section>

<?php
    include 'includes/footer.php';
?>