document.getElementById("registerForm").addEventListener("submit", function (event) {
    var firstname = document.getElementById("fname").value;
    var lastname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    console.log(firstname, lastname, email, password)
    // checkValues(firstname, lastname, password);
    checkEmail();
    checkPassword();
    if (firstname == "" || lastname == "" || password == "" || email == ""){
        alert('All fields must be filled out')
        event.preventDefault();
    }
});

let form = document.getElementById("registerForm");
let first_pass = form.password;
let first_email = form.email;
let first_firstname = form.firstname;
first_email.onchange = checkEmail; 
first_pass.onchange = checkPassword;

function checkEmail() {
    let form = document.getElementById("registerForm");
    let first_email = form.email;
    let errors = [];
    var valid = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (!first_email.value.match(valid)) {
        errors.push("Invalid Email Address");
        
    }
    

    first_email.setCustomValidity(errors.join(', '));
    first_email.reportValidity();
}

function checkPassword() {
    let form = document.getElementById("registerForm");

    let first_pass = form.password;
    let errors = [];
    if (first_pass.value.length < 8)
        errors.push("Too short");
    if (!first_pass.value.match(/^[a-zA-Z0-9]+$/))
        errors.push("Only alphanumeric chars allowed");
    if (!first_pass.value.match(/[a-z]/))
        errors.push("Lower case letter required");
    if (!first_pass.value.match(/[A-Z]/))
        errors.push("Upper case letter required");
    if (!first_pass.value.match(/[0-9]/)) {
        errors.push("Number required");
    }
    first_pass.setCustomValidity(errors.join(', '));
    first_pass.reportValidity();
}   

