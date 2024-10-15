document.addEventListener('DOMContentLoaded', () => {
    const userIdInput = document.getElementById('user-id');
    const userIdMessage = document.getElementById('user-id-message');
    const emailInput = document.getElementById('email');
    const emailMessage = document.getElementById('email-message');
    const mobileInput = document.getElementById('mobile');
    const mobileMessage = document.getElementById('mobile-message');
    const userDOB = document.getElementById('dob');
    const userDOBmessage = document.getElementById('dob-message');
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
            userIdMessage.textContent = 'Invalid User ID (must have at least 2 numbers)';
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

    // Mobile number validation
    mobileInput.addEventListener('input', () => {
        const mobileValue = mobileInput.value;
        if (mobileValue.length < 10) {
            mobileInput.style.borderColor = 'red';
            mobileMessage.textContent = 'Invalid Mobile Number';
        } else {
            mobileInput.style.borderColor = '';
            mobileMessage.textContent = '';
        }
    });

    //DOB validation
    userDOB.addEventListener('input', () => {
        const DOBvalue=userDOB.value;
        const Today=new Date();
        const age=Today-DOBvalue;

        if(age<16)
        {
            DOBvalue.style,borderColor='red';
            userDOBmessage.textContent=''; 
        } else{
            DOBvalue.style,borderColor='';
            userDOBmessage.textContent='';

        }

    });

    // Password validation
    passwordInput.addEventListener('input', () => {
        const passwordValue = passwordInput.value;
        const regex = /^(?=.*[A-Z])(?=.*\d).{6,}$/; // Starts with capital, has number, minimum length
        if (!regex.test(passwordValue)) {
            passwordInput.style.borderColor = 'red';
            passwordMessage.textContent = 'Password must start with a capital letter<br> contain a number<br> and be at least 6 characters long';
        } else {
            passwordInput.style.borderColor = '';
            passwordMessage.textContent = '';
        }

        // Confirm password check
        confirmPasswordInput.dispatchEvent(new Event('input'));
    });

    confirmPasswordInput.addEventListener('input', () => {
        if (confirmPasswordInput.value !== passwordInput.value) {
            confirmPasswordInput.style.borderColor = 'red';
            confirmPasswordMessage.textContent = 'Passwords do not match';
        } else {
            confirmPasswordInput.style.borderColor = '';
            confirmPasswordMessage.textContent = '';
        }
    });

    // Enable submit button when terms are accepted
    termsCheckbox.addEventListener('change', () => {
        submitButton.disabled = !termsCheckbox.checked;
    });
});
