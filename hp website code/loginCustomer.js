document.getElementById('login-form').addEventListener('submit', function (event) {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    checkPassword();

    if (email === '' || password === '') {
        alert('All fields must be filled out');
        event.preventDefault();
    }
});

let form = document.getElementById("login-form");
let first_pass = form.password;
first_pass.onchange = checkPassword;

function checkPassword() {
    let form = document.getElementById("login-form");

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
