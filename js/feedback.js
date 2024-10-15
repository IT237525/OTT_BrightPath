document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const doneButtons = document.querySelectorAll('.done-btn');
    
    editButtons.forEach((btn, index) => {
        btn.addEventListener('click', function() {
            const textarea = this.closest('.edit-form').querySelector('textarea');
            textarea.removeAttribute('readonly');
            textarea.focus();
            this.style.display = 'none';
            doneButtons[index].style.display = 'inline-block';
        });
    });
    
    doneButtons.forEach((btn) => {
        btn.addEventListener('click', function() {
            const textarea = this.closest('.edit-form').querySelector('textarea');
            textarea.setAttribute('readonly', 'readonly');
        });
    });
});
