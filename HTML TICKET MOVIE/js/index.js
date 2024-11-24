// Lay du lieu tren local
const userLogin = JSON.parse(localStorage.getItem("userLogin")) || {};
const userLoginE = document.getElementById("userLogin");
const userInfoE = document.getElementById("userInfo");

if (userLogin && userLogin.userName) {
  // Display the logged-in user's name with a greeting message
  userInfoE.innerHTML = `
        <div style="margin-top: 8px;>
            <span style="font-size: 16.5px; ">${userLogin.userName}</span>
            <br>
            <a href="#" id="logoutLink" style="color: #000000; text-decoration: underline; cursor: pointer;">Đăng Xuất</a>
        </div>
    `;

  // Hide "Đăng Nhập" and "Đăng Ký" links
  const loginLink = document.querySelector('.nav-link[href="login.html"]');
  const registerLink = document.querySelector(
    '.nav-link[href="Register.html"]'
  );

  if (loginLink) loginLink.style.display = "none";
  if (registerLink) registerLink.style.display = "none";

  // Add event listener for the logout link
  const logoutLink = document.getElementById("logoutLink");
  logoutLink.addEventListener("click", function () {
    // Remove the user information from localStorage and redirect to login
    localStorage.removeItem("userLogin");
    window.location.href = "login.html";
  });
} else {
  // If no user is logged in, clear the userInfo display
  userInfoE.innerHTML = "";
}
