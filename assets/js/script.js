// Utility functions
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide messages
    const messages = document.querySelectorAll('.message');
    messages.forEach(message => {
        setTimeout(() => {
            message.style.opacity = '0';
            setTimeout(() => message.remove(), 300);
        }, 5000);
    });

    // Confirm deletions
    const deleteButtons = document.querySelectorAll('.btn-danger');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to delete this item?')) {
                e.preventDefault();
            }
        });
    });

    // Form loading states
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            if (button) {
                button.disabled = true;
                button.innerHTML = '<span class="loading">Processing...</span>';
            }
        });
    });

    // Password visibility toggle
    const passwordInputs = document.querySelectorAll('input[type="password"]');
    passwordInputs.forEach(input => {
        const toggle = document.createElement('button');
        toggle.type = 'button';
        toggle.innerHTML = '👁️';
        toggle.className = 'password-toggle';
        toggle.style.cssText = 'background:none;border:none;cursor:pointer;margin-left:0.5rem;';
        
        toggle.addEventListener('click', () => {
            if (input.type === 'password') {
                input.type = 'text';
                toggle.innerHTML = '👁️‍🗨️';
            } else {
                input.type = 'password';
                toggle.innerHTML = '👁️';
            }
        });

        input.parentNode.style.display = 'flex';
        input.parentNode.appendChild(toggle);
    });
});