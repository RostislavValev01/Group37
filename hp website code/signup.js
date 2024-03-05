document.getElementById("registerForm").addEventListener("submit", function (event) {
    var firstnameValid = checkFirstname();
    var lastnameValid = checkLastname();
    var emailValid = checkEmail();
    var passwordValid = checkPassword();

    if (!firstnameValid || !lastnameValid || !emailValid || !passwordValid) {
        // If validations fail, prevent the form from submitting
        event.preventDefault();
        return false;
    } else {
        alert("Account Successfully created!");
    }
});

let first_firstname = document.getElementById("fname");
let first_surname = document.getElementById("surname");
let first_email = document.getElementById("email");
let first_pass = document.getElementById("password");
let first_number = document.getElementById("mnumber");

first_firstname.addEventListener("input", function () {
    validateInput(first_firstname, /^[a-zA-Z'-]+$/, "Invalid First Name");
});

first_surname.addEventListener("input", function () {
    validateInput(first_surname, /^[a-zA-Z'-]+$/, "Invalid Last Name");
});

first_email.addEventListener("input", function () {
    validateInput(first_email, /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/, "Invalid Email Address");
});

first_pass.addEventListener("input", function () {
    validatePassword(first_pass);
});

function checkFirstname() {
    
    return /^[a-zA-Z'-]+$/.test(first_firstname.value);
}

function checkLastname() {
    
    return /^[a-zA-Z'-]+$/.test(first_surname.value);
}

function checkEmail() {
    
    return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(first_email.value);
}

function checkPassword() {
    
    let password = first_pass.value;
    let errors = [];

    if (password.length < 8) {
        errors.push("Too short, must be at least 8 characters long");
    }

    // Check if there are no errors
    return errors.length === 0;
}



function validateInput(inputElement, regex, errorMessage) {
    if (!inputElement.value.match(regex)) {
        inputElement.setCustomValidity(errorMessage);
        inputElement.reportValidity();
    } else {
        inputElement.setCustomValidity('');
    }
}


function validatePassword(passwordElement) {
    let errors = [];
    let password = passwordElement.value;

    if (password.length < 8) {
        errors.push("Too short, must be at least 8 characters long");
    }


    if (errors.length > 0) {
        passwordElement.setCustomValidity(errors.join(', '));
    } else {
        passwordElement.setCustomValidity('');
    }
}
