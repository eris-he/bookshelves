document.addEventListener('DOMContentLoaded', function() {
    // Reference to the form and success toast
    const requestForm = document.getElementById('request-form');

    // Add an event listener for the form submission
    requestForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Serialize the form data to send via fetch
        const formData = new FormData(requestForm);

        // Send the form data to the server via AJAX
        fetch('request_controller.php', {
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
                    message: "Your request has been submitted successfully! <br/> If you do not receive an email with your reservation number, please check your spam folder first.",
                    status: TOAST_STATUS.SUCCESS,
                    timeout: 10000
                }
                Toast.create(toast);
            } else {
                let toast = {
                    title: "Error",
                    message: "Your request could not be submitted",
                    status: TOAST_STATUS.ERROR,
                    timeout: 5000
                }
                Toast.create(toast);
            }
            requestForm.reset();
        })
        .catch(error => {
            console.log("error")
            console.error('Error:', error);
            requestForm.reset();
        });
    });
});
