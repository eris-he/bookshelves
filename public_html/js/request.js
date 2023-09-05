document.addEventListener('DOMContentLoaded', function() {
    // Reference to the form and success toast
    const requestForm = document.getElementById('request-form');
    const successToast = document.getElementById('success-toast');

    // Add an event listener for the form submission
    requestForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Serialize the form data to send via fetch
        const formData = new FormData(requestForm);

        // Send the form data to the server via AJAX
        // Replace 'submitRequest.php' with the actual server-side processing script
        fetch('request_controller.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            console.log(response)
            return response.json()
        })
        .then(data => {
            console.log(data)
            if (data.status === 'success') {
                // Display the success toast
                successToast.style.display = 'block';
                console.log("success");
            }
        })
        .catch(error => {
            console.log("error")
            console.error('Error:', error);

            // if (error.response) {
            //     error.response.json() // Parse the response as JSON
            //       .then(errorData => {
            //         // Handle and display the JSON data from the error
            //         console.error('Error response data:', errorData);
            //       })
            //       .catch(innerError => {
            //         console.error('Error parsing error response:', innerError);
            //       });
            //   }
        });
    });
});
