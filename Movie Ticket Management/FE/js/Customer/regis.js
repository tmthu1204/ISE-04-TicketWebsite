// Handle registration and OTP verification
document.getElementById("registerBtn").addEventListener("click", function () {
    const formData = new FormData(document.getElementById("registerForm"));
    const errorFields = {
        username: "userNameErr",
        email: "emailErr",
        password: "passwordErr",
        repass: "repassErr",
    };

    // Clear previous errors
    for (let key in errorFields) {
        document.getElementById(errorFields[key]).innerHTML = ""; // Clear old error messages
    }

    // Append action to form data for the register action
    formData.append("action", "register");

    // Send data to PHP for registration
    fetch("../../BE/Common/Register.php", {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json()) // Parse JSON response
        .then((data) => {
            console.log(JSON.stringify(data)); // Log data for debugging
            if (data.success) {
                // If registration is successful, show OTP section
                document.getElementById("otpSection").style.display = "block"; 
                alert(data.message); // Show success message
            } else {
                // Show error messages for invalid fields
                data.errors.forEach((error) => {
                    const field = error.field; // Field with error ('username', 'email', ...)
                    const message = error.message; // Error message

                    if (field && errorFields[field]) {
                        const errorDiv = document.getElementById(errorFields[field]);
                        const errorMsg = document.createElement("p"); // Create <p> for error message
                        errorMsg.classList.add("text-danger");
                        errorMsg.innerText = message; // Set error message
                        errorDiv.appendChild(errorMsg); // Append error message to the error div
                    }
                });
            }
        })
        .catch((error) => {
            console.error("Error:", error); // Log any errors during fetch
            alert("Có lỗi xảy ra. Vui lòng thử lại.");
        });
});

// Handle OTP verification
document.getElementById("verifyOtpBtn").addEventListener("click", function () {
    const formData = new FormData();
    formData.append("action", "verify");
    formData.append("otp", document.getElementById("otp").value); // Get OTP from input field
    formData.append("email", document.getElementById("email").value); // Get email from input field

    // Send OTP verification request to PHP
    fetch("../../BE/Common/Register.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            console.log(JSON.stringify(data));
            if (data.success) {
                alert(data.message); // Show success message
                window.location.href = "login.html"; // Redirect to login page after OTP verification
            } else {
                // Handle errors if OTP verification fails
                alert("Mã OTP không chính xác. Vui lòng thử lại.");
            }
        })
        .catch((error) => {
            console.error("Error:", error); // Log any errors during OTP verification
            alert("Có lỗi xảy ra. Vui lòng thử lại.");
        });
});
