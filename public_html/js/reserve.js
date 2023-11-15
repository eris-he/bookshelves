document.addEventListener('DOMContentLoaded', function() {
    // Reference to the form and success toast
    const reserveForm = document.getElementById('reserve-form');

    // Add an event listener for the form submission
    reserveForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Serialize the form data to send via fetch
        const formData = new FormData(reserveForm);

        // gray out the form
        reserveForm.style.opacity = 0.5;
        reserveForm.style.pointerEvents = "none";

        // set cursor to spinner
        document.body.style.cursor = "wait";

        // Send the form data to the server via AJAX
        fetch('reservation_controller.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            return response.json()
        })
        .then(data => {
            if (data.status === 'success') {
                let toast = {
                    title: "Success",
                    message: "Your reservation has been submitted successfully! <br/> If you do not receive an email with your reservation number, please check your spam folder first.",
                    status: TOAST_STATUS.SUCCESS,
                    timeout: 10000
                }
                let redirectToast = {
                    title: "Redirecting",
                    message: "You will be redirected to the home page shortly",
                    status: TOAST_STATUS.INFO,
                    timeout: 5000
                }
                Toast.create(toast);
                // reset the form
                reserveForm.reset();
                // reset the form opacity
                reserveForm.style.opacity = 1;
                reserveForm.style.pointerEvents = "auto";
                // reset the cursor
                document.body.style.cursor = "default";

                // redirect to home page
                Toast.create(redirectToast);
                setTimeout(function() {
                    window.location.href = "/";
                }, 3000);
            } else {
                let toast = {
                    title: "Error",
                    message: "Your reservation could not be submitted",
                    status: TOAST_STATUS.ERROR,
                    timeout: 5000

                }
                Toast.create(toast);
                // reset the form opacity
                reserveForm.style.opacity = 1;
                reserveForm.style.pointerEvents = "auto";
                // reset the cursor
                document.body.style.cursor = "default";
            }
            reserveForm.reset();
        })
        .catch(error => {
            console.log("error")
            console.error('Error:', error);
            reserveForm.reset();
        });
    });
});
