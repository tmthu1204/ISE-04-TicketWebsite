// Get theaterID from the URL
const urlParams = new URLSearchParams(window.location.search);
const theaterID = urlParams.get('theaterID');
console.log('Theater ID:', theaterID);

// Handle the delete confirmation event
document.getElementById('confirm-delete').addEventListener('click', function() {
    deleteTheater(theaterID);
});

// Handle the cancel delete event
document.getElementById('cancel-delete').addEventListener('click', function() {
    // Redirect to the theater list page
    window.location.href = 'show_theater.html';
});

// Function to delete the theater
function deleteTheater(theaterID) {
    fetch('delete_theater.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'theaterID=' + encodeURIComponent(theaterID)
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Redirect to the theater list page after successful deletion
            window.location.href = 'show_theater.html';
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        alert('An error occurred: ' + error);
    });
}
