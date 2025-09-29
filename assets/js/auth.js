// Simple authentication form enhancements
document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.auth-form')) {
        initPasswordToggle();
        initFormValidation();
    }
});

function initPasswordToggle() {
    const passwordInputs = document.querySelectorAll('input[type="password"]');
    
    passwordInputs.forEach(input => {
        if (!input.nextElementSibling || !input.nextElementSibling.classList.contains('password-toggle')) {
            const toggle = document.createElement('button');
            toggle.type = 'button';
            toggle.innerHTML = '👁️';
            toggle.className = 'password-toggle';
            toggle.style.background = 'none';
            toggle.style.border = 'none';
            toggle.style.cursor = 'pointer';
            toggle.style.marginLeft = '0.5rem';
            
            toggle.addEventListener('click', function() {
                if (input.type === 'password') {
                    input.type = 'text';
                    toggle.innerHTML = '👁️‍🗨️';
                } else {
                    input.type = 'password';
                    toggle.innerHTML = '👁️';
                }
            });
            
            input.parentNode.style.display = 'flex';
            input.parentNode.style.alignItems = 'center';
            input.parentNode.appendChild(toggle);
        }
    });
}

function initFormValidation() {
    const forms = document.querySelectorAll('.auth-form form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const inputs = form.querySelectorAll('input[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    showFieldError(input, 'This field is required');
                    isValid = false;
                } else {
                    clearFieldError(input);
                }

                // Simple email validation
                if (input.type === 'email' && input.value.trim()) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(input.value)) {
                        showFieldError(input, 'Please enter a valid email address');
                        isValid = false;
                    }
                }

                // Simple password validation
                if (input.type === 'password' && input.value.trim()) {
                    if (input.value.length < 6) {
                        showFieldError(input, 'Password must be at least 6 characters long');
                        isValid = false;
                    }
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });
    });
}

function showFieldError(input, message) {
    clearFieldError(input);
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'field-error';
    errorDiv.textContent = message;
    errorDiv.style.color = 'red';
    errorDiv.style.fontSize = '0.8rem';
    errorDiv.style.marginTop = '0.25rem';
    
    input.style.borderColor = 'red';
    input.parentNode.appendChild(errorDiv);
}

function clearFieldError(input) {
    const existingError = input.parentNode.querySelector('.field-error');
    if (existingError) {
        existingError.remove();
    }
    input.style.borderColor = '';
}