document.addEventListener("DOMContentLoaded", function() {
    // Get the form element
    const form = document.getElementById("record-form");

    // Function to display a confirmation message
    function showConfirmation() {
        alert("Your seizure record has been successfully submitted.");
    }

    // Function to handle form submission
    function handleSubmit(event) {
        event.preventDefault(); // Prevent the default form submission

        // Basic validation
        if (form.checkValidity()) {
            // Display confirmation message
            showConfirmation();
            
            // Reset the form
            form.reset();
        } else {
            alert("Please fill out all required fields.");
        }
    }

    // Add event listener for form submission
    form.addEventListener("submit", handleSubmit);
});
