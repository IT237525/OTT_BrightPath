document.addEventListener('DOMContentLoaded', function() {
  
    const editButtons = document.querySelectorAll('.edit-btn');
    
    editButtons.forEach(function(editButton) {
        editButton.addEventListener('click', function() {
            const row = editButton.closest('tr'); 
            const inputs = row.querySelectorAll('input[type="text"]'); 
            const doneButton = row.querySelector('.done-btn'); 
            
            
            inputs.forEach(function(input) {
                input.disabled = false;
            });

            
            editButton.style.display = 'none';
            doneButton.style.display = 'inline-block';
        });
    });
});
