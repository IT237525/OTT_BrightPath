document.addEventListener('DOMContentLoaded', function() {
    // Get all the edit buttons
    const editButtons = document.querySelectorAll('.edit-btn');
    
    editButtons.forEach(function(editButton) {
        editButton.addEventListener('click', function() {
            const row = editButton.closest('tr'); // Get the row of the clicked button
            const inputs = row.querySelectorAll('input[type="text"]'); // Get all text inputs in the row
            const doneButton = row.querySelector('.done-btn'); // Get the done button
            
            // Enable the inputs
            inputs.forEach(function(input) {
                input.disabled = false;
            });

            // Hide the edit button and show the done button
            editButton.style.display = 'none';
            doneButton.style.display = 'inline-block';
        });
    });
});
