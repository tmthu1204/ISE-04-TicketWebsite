document.getElementById("sendpassBtn").addEventListener("click", function () {
    const formData = new FormData();
    formData.append("action", "sendpass");
    formData.append("email", document.getElementById("Forgotemail").value); // Get email from input field
    
    // Send OTP verification request to PHP
    fetch("../../BE/Common/forgot_password.php", {
        method: "POST",
        body: formData,
    })
        .then(response => response.json()) // Parse JSON response
        .then(data => {
            console.log(JSON.stringify(data));
            if (data.success) {
                alert(data.message); // Show success message
                window.location.href = "login.html"; 
                // document.getElementById("forgot_pass").style.display = "none";
            } else {
                alert(data.message);
            }
        })
        .catch((error) => {
            console.error("Error:", error); 
            alert("Có lỗi xảy ra. Vui lòng thử lại.");
        });
});
