document.addEventListener('DOMContentLoaded', () => {
    const userIdInput = document.getElementById('user-name');
    const userIdMessage = document.getElementById('user-name-message');
    const emailInput = document.getElementById('email');
    const emailMessage = document.getElementById('email-message');
    const mobileInput = document.getElementById('mobile');
    const mobileMessage = document.getElementById('mobile-message');
    const dobInput = document.getElementById('dob');
    const dobMessage = document.getElementById('dob-message');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm-password');
    const passwordMessage = document.getElementById('password-message');
    const confirmPasswordMessage = document.getElementById('confirm-password-message');
    const termsCheckbox = document.getElementById('terms');
    const submitButton = document.querySelector('.submit');

    // User ID validation
    userIdInput.addEventListener('input', () => {
        const userIdValue = userIdInput.value;
        const regex = /^(?=.*\d.*\d)/; // At least 2 numbers
        if (userIdValue.length < 6 || !regex.test(userIdValue)) {
            userIdInput.style.borderColor = 'red';
            userIdMessage.textContent = 'Invalid User Name (must have at least 2 numbers)';
        } else {
            userIdInput.style.borderColor = '';
            userIdMessage.textContent = '';
        }
    });

    // Email validation
    emailInput.addEventListener('input', () => {
        const emailValue = emailInput.value;
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email validation
        if (!regex.test(emailValue)) {
            emailInput.style.borderColor = 'red';
            emailMessage.textContent = 'Invalid Email';
        } else {
            emailInput.style.borderColor = '';
            emailMessage.textContent = '';
        }
    });
    
    // Date of Birth validation
    dobInput.addEventListener('input', function() {
        const dobValue = new Date(dobInput.value);
        const today = new Date();

        // Calculate the minimum date (16 years ago from today)
        const minDate = new Date();
        minDate.setFullYear(today.getFullYear() - 16);

        // Check if the selected date is in the future
        if (dobValue > today) {
            dobMessage.textContent = "Date of birth cannot be in the future.";
            dobMessage.style.color = 'red';
          
        } 
        // Check if the selected date is within the last 8 years
        else if (dobValue > minDate) {
            dobMessage.textContent = "You must be at least 16 years old.";
            dobMessage.style.color = 'red';
           
        } 
        else {
            dobMessage.textContent = "";
            dobMessage.style.color = '';
        }
        
    });

    // Mobile number validation
    mobileInput.addEventListener('input', () => {
        const mobileValue = mobileInput.value;
        if (mobileValue.length !== 10 || !/^\d+$/.test(mobileValue)) {
            mobileInput.style.borderColor = 'red';
            mobileMessage.textContent = 'Invalid Mobile Number (must be 10 digits)';
        } else {
            mobileInput.style.borderColor = '';
            mobileMessage.textContent = '';
        }
    });

    // Password validation
    passwordInput.addEventListener('input', () => {
        const passwordValue = passwordInput.value;
        const regex = /^(?=.*[A-Z])(?=.*\d).{6,}$/; // Starts with capital, has number, minimum length
        if (!regex.test(passwordValue)) {
            passwordInput.style.borderColor = 'red';
            passwordMessage.textContent = 'Password must start with a capital letter, contain a number, and be at least 6 characters long';
        } else {
            passwordInput.style.borderColor = '';
            passwordMessage.textContent = '';
        }

        // Trigger confirm password validation after password input
        confirmPasswordInput.dispatchEvent(new Event('input'));
    });

    // Confirm password validation
    confirmPasswordInput.addEventListener('input', () => {
        if (confirmPasswordInput.value !== passwordInput.value) {
            confirmPasswordInput.style.borderColor = 'red';
            confirmPasswordMessage.textContent = 'Passwords do not match';
        } else {
            confirmPasswordInput.style.borderColor = '';
            confirmPasswordMessage.textContent = '';
        }
    });

    // Enable submit button if terms are accepted
    termsCheckbox.addEventListener('change', () =>{

        submitButton.disabled = !termsCheckbox.checked;
    });
});

