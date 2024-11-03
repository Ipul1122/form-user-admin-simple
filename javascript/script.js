
// register form
function togglePassword(fieldId) {
    const passwordField = document.getElementById(fieldId);
    const eyeIcon = passwordField.nextElementSibling;

    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.innerHTML = "&#128065;"; // Change icon to open eye
    } else {
        passwordField.type = "password";
        eyeIcon.innerHTML = "&#128065;"; // Change icon to closed eye
    }
}