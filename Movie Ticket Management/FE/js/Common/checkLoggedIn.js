async function isUserLoggedIn() {
    try {
        const response = await fetch('../../BE/Common/check_login.php', {
            method: 'GET',
            credentials: 'include', // Bao gồm cookies cho session
        });

        if (!response.ok) {
            console.error("Failed to check login status");
            return { loggedIn: false };
        }

        const result = await response.json();
        return {
            loggedIn: result.loggedIn,
            role: result.role,       // 'admin' or 'customer'
            user: result.user,       // { username, email } or null
        };
    } catch (error) {
        console.error("Error checking login status:", error);
        return { loggedIn: false };
    }
}
