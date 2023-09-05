<?php
    require "../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable("../../");
    $dotenv->load();
    require '../imports.php';
    // require 'request_controller.php';

    // $processNewRequest = new requestProcessing();

    // // Check if the form is submitted
    // if (isset($_POST['submit'])) {
    //     // Perform server-side processing
    //     $response = $processNewRequest->processRequest($_POST);

    //     if ($response['status'] == 'success') {
    //         // Success: Show a toast message
    //         $toastMessage = $response['message'];
    //     } else {
    //         $toastMessage = $response['message'];
    //     }
    // }

?>

<!DOCTYPE html>
<head>
    <link href="/css/request.css" rel="stylesheet" />
    <script src="/js/request.js"></script>
</head>
<div class='body-template'>
    <!-- <div class="toast" id="success-toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 0; right: 0;">
        <div class="toast-header">
            <strong class="mr-auto">Request Submitted</strong>
            <small>Just now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Your request has been submitted successfully!
        </div>
    </div> -->
    <div class="body-styling">
        <h1>Request a Book</h1>   
    </div>
    <div style="text-align:center">
        <p>
            Can't find the book you're looking for in our store? Request it here and we'll do our best to get it for you!
        </p> 
        <p>
            (Requested books are automatically added as a reserved book for you once we get it in stock.)
        </p>
    </div>
    <div class="body-styling">
        <form id="request-form">
            <label class="form-label" for="title">Title <span style="color: red;">*</span> </label>
            <input class="form-input" type="text" name="title" id="title" required>
            <br>
            <label class="form-label" for="author">Author <span style="color: red;">*</span> </label>
            <input class="form-input" type="text" name="author" id="author" required>
            <br>
            <label class="form-label" for="isbn">ISBN</label>
            <input class="form-input" type="text" name="isbn" id="isbn">
            <br>
            <button class="btn btn-success form-input" type="submit">Submit</button>
        </form>
    </div>

</div>
    
