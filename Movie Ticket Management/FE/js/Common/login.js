document.getElementById('formLogin').addEventListener('submit', async function (event) {
    event.preventDefault();

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();

    const response = await fetch('../../BE/Common/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            email: email,
            password: password
        }),
    });

    const result = await response.json();

    if (result.success) {
        if (result.role === "admin") {
            window.location.href = '../Admin/payment.html';
        } else if (result.role === "customer") {
            window.location.href = '../Customer/Homepage-user.html';
        }
    } else {
        result.errors.forEach(error => {
            if (error.field === 'email') {
                document.getElementById('emailErr').innerText = error.message;
                document.getElementById('emailErr').style.display = 'block';
            }
            if (error.field === 'password') {
                document.getElementById('passwordErr').innerText = error.message;
                document.getElementById('passwordErr').style.display = 'block';
            }
            if (error.field === 'general') {
                document.getElementById('errorMess').innerText = error.message;
                document.getElementById('errorMess').style.display = 'block';
            }
        });
    }
});



