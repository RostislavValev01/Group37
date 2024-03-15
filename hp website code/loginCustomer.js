document.getElementById('login-form').addEventListener('submit', function (event) {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    checkEmail();
    checkPassword();


    if (email === '' || password === '') {
        alert('All fields must be filled out');
        event.preventDefault();
    }
});

