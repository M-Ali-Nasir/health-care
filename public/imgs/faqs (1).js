document.addEventListener('DOMContentLoaded', function() {
    // Get all accordion buttons
    const accordions = document.querySelectorAll('.accordion');

    // Add click event listener to each accordion button
    accordions.forEach(button => {
        button.addEventListener('click', function() {
            // Toggle the active class on the clicked button
            this.classList.toggle('active');

            // Get the associated panel
            const panel = this.nextElementSibling;

            // Toggle the panel's display
            if (panel.style.display === 'block') {
                panel.style.display = 'none';
            } else {
                panel.style.display = 'block';
            }
        });
    });
});
