<?php
    require '../imports.php';

    //only display page if user is logged in and is admin

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
        header("Location: /errors/unprivileged-user.php");
    }
?>

<!DOCTYPE html>
<head>
    <link href="../css/admin-dashboard.css" rel="stylesheet" />
    <title>Admin Dashboard</title>
</head>
<!-- Create cards that link to different admin pages -->
<div class="footer-wrap">
    <div class="body-template container-fluid">
        <div class="center">
            <h1>Admin Dashboard</h1>
        </div>
        <!-- Create cards that link to different admin pages -->
        <div class="row card-container">

            <div class="card admin-card center">
                <i class="fas fa-user fa-5x card-img-top"></i>
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">Add, edit, or delete users.</p>
                    <a href="manage-users.php" class="btn btn-light stretched-link">Manage Users</a>
                </div>
            </div>
            <div class="card admin-card center">
                <i class="fas fa-book fa-5x card-img-top"></i>
                <div class="card-body">
                    <h5 class="card-title">Manage Reservations</h5>
                    <p class="card-text">Change, edit, or delete reservations.</p>
                    <a href="view-reservations.php" class="btn btn-light stretched-link">Manage Reservations</a>
                </div>
            </div>
            <div class="card admin-card center">
                <i class="fas fa-gift fa-5x card-img-top"></i>
                <div class="card-body">
                    <h5 class="card-title">Manage Requests</h5>
                    <p class="card-text">Change, edit, or delete requests.</p>
                    <a href="view-requests.php" class="btn btn-light stretched-link">Manage Requests</a>
                </div>
            </div>
            <div class="card admin-card center">
                <i class="fas fa-folder-open fa-5x card-img-top"></i>
                <div class="card-body">
                    <h5 class="card-title">Update Inventory</h5>
                    <p class="card-text">Update the inventory</p>
                    <a href="update-inventory.php" class="btn btn-light stretched-link">Update Inventory</a>
                </div>
            </div>

        </div>
    </div>
    <?php
        require '../footer.php';
    ?>
</div>
