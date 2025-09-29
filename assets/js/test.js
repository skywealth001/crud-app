document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("itemForm");
    const successMessage = document.querySelector(".message.success");
    const errorMessage = document.querySelector(".message.error");

    // Highlight messages for a few seconds
    [successMessage, errorMessage].forEach(msg => {
        if (msg) {
            msg.style.transition = "opacity 0.5s";
            setTimeout(() => msg.style.opacity = "0", 4000); // fade out after 4s
        }
    });

    // Prevent accidental form resubmission (browser back/refresh issue)
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    // (Optional) confirm before deleting
    document.querySelectorAll("a.btn-danger").forEach(btn => {
        btn.addEventListener("click", function (e) {
            if (!confirm("Are you sure you want to delete this item?")) {
                e.preventDefault();
            }
        });
    });
});

