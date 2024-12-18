async function isUserLoggedIn() {
    try {
        const response = await fetch('../../BE/Common/check_login.php', {
            method: 'GET',
            credentials: 'include', // Important: Ensure cookies are included with the request
        });

        if (!response.ok) {
            console.error("Failed to check login status");
            return { loggedIn: false };
        }

        const result = await response.json();
        return {
            loggedIn: result.loggedIn,
            role: result.role,
            user: result.user,
            customerID: result.customerID,
        };
    } catch (error) {
        console.error("Error checking login status:", error);
        return { loggedIn: false };
    }
}
