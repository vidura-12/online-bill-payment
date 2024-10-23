function check() {
    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("confirmPassword");

    if (password.value !== confirmPassword.value) {
        confirmPassword.setCustomValidity("Passwords do not match");
    } else {
        confirmPassword.setCustomValidity('');
    }
}

document.getElementById("password").addEventListener("input", checkPasswordMatch);
document.getElementById("confirmPassword").addEventListener("input", checkPasswordMatch);