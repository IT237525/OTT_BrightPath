   // Disable the update button by default if form is not valid
   const updateButton = document.querySelector('.update-btn');
   const form = document.getElementById('profileForm');

   // Add event listeners to each form field
   form.addEventListener('input', () => {
       checkFormValidity();
   });

   function checkFormValidity() {
       // Check if all required fields are filled
       const firstName = document.getElementById('firstName').value.trim();
       const lastName = document.getElementById('lastName').value.trim();
       const email = document.getElementById('email').value.trim();
       const phone = document.getElementById('phone').value.trim();
       
       if (firstName !== '' && lastName !== '' && email !== '') {
           updateButton.disabled = false;  // Enable the button
       } else {
           updateButton.disabled = true;  // Disable the button
       }
   }

   // Confirmation on update
   form.addEventListener('submit', (e) => {
       const confirmation = confirm('Are you sure you want to update your profile details?');
       if (!confirmation) {
           e.preventDefault();  // Stop form submission if not confirmed
       }
   });

   // Add interactivity for course edit button (edit_course.php)
   document.querySelectorAll('.courses-section a').forEach((editLink) => {
       editLink.addEventListener('click', function(event) {
           event.preventDefault();
           const courseId = this.getAttribute('href').split('=')[1];
           const confirmEdit = confirm('Do you want to edit this course?');
           if (confirmEdit) {
               window.location.href = `edit_course.php?id=${courseId}`;
           }
       });
   });

   // Run form validity check on page load
   window.addEventListener('load', checkFormValidity);