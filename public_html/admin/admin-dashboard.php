<?php
    require '../imports.php';

    //only display page if user is logged in and is admin

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
        header("Location: /errors/unprivileged-user.php");
    }
?>

<!DOCTYPE html>
<!-- Create cards that link to different admin pages -->
<div class="footer-wrap">
    <div class="body-template">
        <div>
            <h1>Admin Dashboard</h1>
        </div>
    </div>
    <?php
        require '../footer.php';
    ?>
</div>
