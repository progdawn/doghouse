<?php
    // Initialize the session
    session_start(); 
    include 'includes/header.php';
?>

<section>
    <div class="container">
        <img class="img-fluid image" name="selected-image" id="selected-image">
        <h2 id="image-title" name="image-title">Blank title</h2>
        <p id="image-user" name="image-user">Blank user</p>
        <p id="image-date" name="image-date">Blank datetime</p>
        <p id="image-description" name="image-description">Blank description</p>
    </div>
</section>

<?php
    include 'includes/footer.php';
?>