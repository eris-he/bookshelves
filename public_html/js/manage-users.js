document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("createUserSubmit").addEventListener(submit, function(e) {
        e.preventDefault();

        // send this to create-user.php using the fetch API
        // on success, create a toast that says "User created successfully!"
        // on fail, create a toast that says "Something went wrong! Please try again"
    });
});

