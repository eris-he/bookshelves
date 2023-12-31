<!DOCTYPE html>
<link href="/css/footer.css" rel="stylesheet" />
<div id="footer-spacer">
</div>
<div id="footer">
    <?php
    // This is a back button to the admin page.
    // Commented it out because it might be unnecessary due to the inclusion of the admin page at the top.
    // if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    //     if ($_SESSION['is_admin'] == true) {
    //     echo '
    //         <div class="center">
    //             <button href="/admin/admin-dashboard.php" class="btn btn-primary">Back to Admin Dashboard</button>
    //         </div>';
    //     }
    // }
    ?>
    <hr />
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <h3> Contact Us </h3>
                <p> Well Red Coffee, Books, & Wine <br/> 
                223 Opelika Road
                Auburn, AL 36830 </p>
                <p> richard@wellredau.com <br/>
                    (334) 246-3021 </p>
            </div>  
            <div class="col-sm-4">
                <h3> Hours </h3>
                <p> Mon - Thurs: 7am - 9pm <br/>
                    Fri: 7am - 10pm <br/>
                    Sat: 8am - 10pm <br/>
                    Sun: 9am - 2pm </p>
            </div>
            <div class="col-sm-4">
                <img src="/img/wellredfox.png" alt="Well Red Fox" id="footer-img"/>
            </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
