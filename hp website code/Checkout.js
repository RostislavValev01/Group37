document.querySelector('.Contactinfo form').addEventListener('submit', function(event) {
    let email = document.getElementById('email').value;
    let fname = document.getElementById('fname').value;
    let lname = document.getElementById('lname').value;
    let address = document.getElementById('address').value;
    let city = document.getElementById('city').value;
    let country = document.getElementById('country').value;
    let postcode = document.getElementById('postcode').value;
    let phone = document.getElementById('phone').value;

    const fields = [email, fname, lname, address, city, country, postcode, phone];

    for (let i = 0; i < fields.length; i++) {
        if (fields[i].trim() === '') {
            alert('All fields must be filled out');
            event.preventDefault();
            return;
        }
    }
});
