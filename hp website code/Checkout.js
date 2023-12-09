document.getElementById("addressForm").addEventListener("submit", function(event) {
    var email = document.getElementById("email").value;
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var address = document.getElementById("address").value;
    var city = document.getElementById("city").value;
    var country = document.getElementById("country").value;
    var postcode = document.getElementById("postcode").value;
    var phone = document.getElementById("phone").value;

    if (!validateEmail(email)) {
        alert("Please enter a valid email address.");
        event.preventDefault();
    } else if (!validateName(fname) || !validateName(lname)) {
        alert("Names should only contain letters.");
        event.preventDefault();
    } else if (address.trim() === '') {
        alert("Please enter your address.");
        event.preventDefault();
    } else if (city.trim() === '') {
        alert("Please enter your city.");
        event.preventDefault();
    } else if (country.trim() === '') {
        alert("Please enter your country.");
        event.preventDefault();
    } else if (postcode.trim() === '') {
        alert("Please enter your postcode.");
        event.preventDefault();
    } else if (!validatePhone(phone)) {
        alert("Please enter a valid phone number (numbers only).");
        event.preventDefault();
    }
});

function validateEmail(email) {
    var emailRegex = /.+@.+\..+/;
    return emailRegex.test(email);
}

function validateName(name) {
    var nameRegex = /^[A-Za-z]+$/;
    return nameRegex.test(name);
}

function validatePhone(phone) {
    var phoneRegex = /^\d+$/;
    return phoneRegex.test(phone);
}

// Add your card form open and close functions here
        const cardForm = document.getElementById('cardForm');
        const cardOverlay = document.getElementById('cardOverlay');
        const cardLink = document.getElementById('cardLink');

        cardLink.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            openCardForm();
        });

        function openCardForm() {
            cardForm.style.display = 'block';
            cardOverlay.style.display = 'block';
        }

        function closeCardForm() {
            cardForm.style.display = 'none';
            cardOverlay.style.display = 'none';
        }

        document.getElementById("cardForm").addEventListener("submit", function(event) {
            var cardholderName = document.getElementById("cardholderName").value;
            var expiryDate = document.getElementById("expiryDate").value;
            var cvv = document.getElementById("cvv").value;
            var cardNumber = document.getElementById("cardNumber").value;
        
            if (cardholderName.trim() === '') {
                alert("Please enter the cardholder's name.");
                event.preventDefault();
            } else if (!validateExpiryDate(expiryDate)) {
                alert("Please enter a valid expiry date in MM/YY format.");
                event.preventDefault();
            } else if (!validateCVV(cvv)) {
                alert("Please enter a valid CVV.");
                event.preventDefault();
            } else if (!validateVisaCard(cardNumber)) {
                alert("Please enter a valid card number.");
                event.preventDefault();
            }
        });
        
        function validateExpiryDate(date) {
            var dateRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
            if (!dateRegex.test(date)) return false;
        
            var today = new Date();
            var [month, year] = date.split('/');
            var inputDate = new Date('20' + year, month - 1);
        
            return inputDate > today;
        }
        
        function validateCVV(cvv) {
            var cvvRegex = /^[0-9]{3,4}$/;
            return cvvRegex.test(cvv);
        }
        
        function validateVisaCard(cardNumber) {
            var visaCardRegex = /^4[0-9]{12}(?:[0-9]{3})?$/;
            return visaCardRegex.test(cardNumber);
        }
