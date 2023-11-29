document.getElementById("registerForm").addEventListener("submit", function (event) {
    var firstnameValid = checkFirstname();
    var lastnameValid = checkLastname();
    var emailValid = checkEmail();
    var passwordValid = checkPassword();

    if (!firstnameValid || !lastnameValid || !emailValid || !passwordValid) {
        // If validations fail the form won't submit
        event.preventDefault();
        return false;
    }
    // If validations pass then the form will submit
});

let first_firstname = document.getElementById("fname");
let first_lastname = document.getElementById("lname");
let first_email = document.getElementById("email");
let first_pass = document.getElementById("password");

first_firstname.addEventListener("input", function() {
    let valid = /^[^\d\s!@#$%^&*()_+=[\]{};':"\\|,.<>/?]*$/;
    if (!first_firstname.value.match(valid)) {
        first_firstname.setCustomValidity("Invalid First Name");
        first_firstname.reportValidity();
    } else {
        first_firstname.setCustomValidity('');
    }
});

first_lastname.addEventListener("input", function() {
    let valid = /^[^\d\s!@#$%^&*()_+=[\]{};':"\\|,.<>/?]*$/;
    if (!first_lastname.value.match(valid)) {
        first_lastname.setCustomValidity("Invalid Last Name");
        first_lastname.reportValidity();
    } else {
        first_lastname.setCustomValidity('');
    }
});

first_email.addEventListener("input", function() {
    let valid = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!first_email.value.match(valid)) {
        first_email.setCustomValidity("Invalid Email Address");
        first_email.reportValidity();
    } else {
        first_email.setCustomValidity('');
    }
});

first_pass.addEventListener("input", function() {
    if (first_pass.value.length < 8)
        first_pass.setCustomValidity("Password too short");
    else
        first_pass.setCustomValidity('');
});
