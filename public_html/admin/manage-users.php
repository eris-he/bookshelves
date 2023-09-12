<?php
require_once '../imports.php';

    //only display page if user is logged in and is admin

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header("Location: /errors/unprivileged-user.php");
}

?>

<!DOCTYPE html>
<link href="../css/manage-users.css" rel="stylesheet">
<div class="footer-wrap">
    <div class="body-template center">
        <h1>Manage Users</h1>
        <!-- PUT YOUR CONTENT HERE, IN BETWEEN THESE CLASSES PLS AND THANK YOU. -->
        <button class="btn btn-success btn-large" id="createUserBtn" data-bs-toggle="modal" data-bs-target="#createUserModal">
            Create New User
        </button>
    </div>
    <?php
    require_once '../footer.php';
    ?>
</div>

<div class="modal" tabindex="-1" id="createUserModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
            <form id="createUserForm">
                <label class="form-label" for="username">Username <span style="color: red;">*</span> </label>
                <input class="form-input" type="username" name="username" id="newUsername" required>
                <br>
                <label for="password">Password</label>
                <input id="newPassword" type="password" placeholder="Enter Password" name="password" required>
                <br>               
                <label for="password">Confirm Password</label>
                <input type="password" placeholder="Enter Password" name="password" required>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="createUserSubmit">Submit</button>
      </div>
    </div>
  </div>
</div>

<script src="../js/manage-users.js"></script>