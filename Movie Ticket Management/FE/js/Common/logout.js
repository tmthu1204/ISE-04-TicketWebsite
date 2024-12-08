async function logout() {
    try {
        const response = await fetch('../../BE/Common/logout.php', {
            method: 'GET',
            credentials: 'include', // Bao gồm cookies cho session
        });

        if (!response.ok) {
            console.error("Failed to log out");
            return;
        }

        // Sau khi đăng xuất thành công, chuyển hướng về trang đăng nhập
        window.location.href = '../../FE/Common/login.html';
    } catch (error) {
        console.error("Error logging out:", error);
    }
}

// Gắn sự kiện đăng xuất vào nút "Đăng xuất"
document.getElementById('logoutButton').addEventListener('click', logout);
