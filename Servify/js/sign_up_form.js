(() => {
  'use strict';

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation');

  // Loop over forms to prevent submission if invalid
  Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
          }
          form.classList.add('was-validated');
      }, false);
  });
})();

// Password validation and confirm password handling
(() => {
  'use strict';

  // Password and confirm password fields
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('confirmPassword');

  // Password validation regex
  const passwordCriteria = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/;

  // Dynamic feedback elements
  const feedbackContainer = document.createElement('ul');
  feedbackContainer.classList.add('password-feedback');
  passwordInput.parentNode.appendChild(feedbackContainer);

  const criteriaList = {
      length: { regex: /.{8,16}/, message: '8-16 characters long', valid: false },
      uppercase: { regex: /[A-Z]/, message: 'At least one uppercase letter', valid: false },
      lowercase: { regex: /[a-z]/, message: 'At least one lowercase letter', valid: false },
      number: { regex: /\d/, message: 'At least one number', valid: false },
      special: { regex: /[@$!%*?&]/, message: 'At least one special character', valid: false },
  };

  // Update feedback list dynamically
  function updateFeedback() {
      feedbackContainer.innerHTML = '';
      let allValid = true;

      Object.keys(criteriaList).forEach(key => {
          const criteria = criteriaList[key];
          const isValid = criteria.regex.test(passwordInput.value);
          criteria.valid = isValid;
          allValid = allValid && isValid;

          const listItem = document.createElement('li');
          listItem.textContent = criteria.message;
          listItem.style.color = isValid ? 'green' : 'red';
          feedbackContainer.appendChild(listItem);
      });

      if (allValid) {
          passwordInput.classList.remove('is-invalid');
          passwordInput.classList.add('is-valid');
      } else {
          passwordInput.classList.remove('is-valid');
          passwordInput.classList.add('is-invalid');
      }
  }

  // Add event listener for password validation
  passwordInput.addEventListener('input', updateFeedback);

  // Add event listener for confirm password validation
  confirmPasswordInput.addEventListener('input', () => {
      const invalidFeedback = confirmPasswordInput.nextElementSibling;
      if (confirmPasswordInput.value === passwordInput.value) {
          confirmPasswordInput.classList.remove('is-invalid');
          confirmPasswordInput.classList.add('is-valid');
          invalidFeedback.textContent = '';
      } else {
          confirmPasswordInput.classList.remove('is-valid');
          confirmPasswordInput.classList.add('is-invalid');
          invalidFeedback.textContent = 'Passwords do not match.';
      }
  });

  // Prevent form submission if password criteria or confirm password validation fails
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
          const allFieldsValid = form.checkValidity();
          const passwordsMatch = passwordInput.value === confirmPasswordInput.value;
          const passwordCriteriaValid = Object.values(criteriaList).every(c => c.valid);

          if (!allFieldsValid || !passwordsMatch || !passwordCriteriaValid) {
              event.preventDefault();
              event.stopPropagation();

              if (!passwordCriteriaValid) {
                  passwordInput.classList.add('is-invalid');
              }

              if (!passwordsMatch) {
                  confirmPasswordInput.classList.add('is-invalid');
              }
          } else {
              // Show the modal if the form is valid
              const successModal = new bootstrap.Modal(document.getElementById('SuccessModal'));
              successModal.show();
              event.preventDefault(); // Prevent actual form submission for demonstration
          }

          form.classList.add('was-validated');
      }, false);
  });
})();