function updateNavbar() {
    const isLoggedIn = checkLoginStatus();
    const loggedOutNav = document.getElementById("loggedOutNav");
    const loggedInNav = document.getElementById("loggedInNav");
    const logoutButton = document.getElementById("logoutButton");
    const username = document.getElementById("username");

    if (isLoggedIn) {
        const userLogin = JSON.parse(localStorage.getItem("userLogin"));
        if (loggedOutNav) loggedOutNav.classList.add("d-none");
        if (loggedInNav) loggedInNav.classList.remove("d-none");
        if (logoutButton) logoutButton.classList.remove("d-none");
        if (username) username.textContent = userLogin.userName;
    } else {
        if (loggedOutNav) loggedOutNav.classList.remove("d-none");
        if (loggedInNav) loggedInNav.classList.add("d-none");
        if (logoutButton) logoutButton.classList.add("d-none");
    }
}

document.getElementById('navbar').innerHTML = `
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(45deg, #e8dccc, #373234);">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="./images/png-clipart-red-river-theatres-cinema-film-logo-reel-miscellaneous-angle-removebg-preview.png"
                alt="Cinema Logo" style="height: 60px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="Homepage.html">Trang Chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="movie-tab.html">Phim</a></li>
                <li id="loggedOutNav" class="nav-item"><a class="nav-link" href="login.html">Đăng Nhập</a></li>
                <li id="loggedInNav" class="nav-item d-none"><a class="nav-link" href="#" id="username">Tên người dùng</a></li>
                <li id="logoutButton" class="nav-item d-none">
                    <a class="nav-link" href="#" onclick="handleLogout()">Đăng Xuất</a>
                </li>
            </ul>
            <form class="d-flex ms-3">
                <input class="form-control me-2" type="search" placeholder="Nhập tên phim" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>
</nav>
`;

function handleLogout() {
    localStorage.removeItem("userLogin");
    window.location.href = "login.html";
}

// Initialize navbar state
document.addEventListener('DOMContentLoaded', updateNavbar);