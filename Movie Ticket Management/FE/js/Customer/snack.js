document.addEventListener("DOMContentLoaded", () => {
    const snackList = document.getElementById("snackList");
    const totalPriceElement = document.getElementById("totalPrice");
    const checkoutButton = document.getElementById("checkoutButton");

    let total = 0;
    const selectedSnacks = {}; // Store selected snack quantities as an object

    // Get transactionID from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const transactionID = urlParams.get('transactionID');

    if (!transactionID) {
        alert('Transaction ID not found.');
        return;
    }

    // Display initial ticketAmount (optional for the frontend)
    console.log('Transaction ID:', transactionID);

    // Fetch snack data from backend
    fetch("../../BE/Customer/snack.php")
        .then(response => response.json())
        .then(data => {
            console.log("Fetched data:", data); // Debugging
            if (data.length > 0) {
                data.forEach(snack => {
                    const snackItem = document.createElement("div");
                    snackItem.className = "d-flex justify-content-between align-items-center mb-4";

                    snackItem.innerHTML = `
                        <div>
                            <h4 class="h5">${snack.name}</h4>
                            <p class="text-muted small mb-0">${snack.price} VND</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-light btn-lg" onclick="updateQuantity('${snack.snackID}', -1, ${snack.price})">-</button>
                            <span class="mx-3 fs-4" id="snack-${snack.snackID}-quantity">0</span>
                            <button class="btn btn-outline-light btn-lg" onclick="updateQuantity('${snack.snackID}', 1, ${snack.price})">+</button>
                        </div>
                    `;

                    snackList.appendChild(snackItem);
                });
            }
        })
        .catch(error => console.error("Error fetching snacks:", error));

    // Update quantity and total price
    window.updateQuantity = (snackID, change, price) => {
        const quantityElement = document.getElementById(`snack-${snackID}-quantity`);
        let currentQuantity = parseInt(quantityElement.textContent);

        // Prevent negative quantities
        if (currentQuantity === 0 && change < 0) {
            return; // No change if already at 0 and trying to subtract
        }

        currentQuantity = Math.max(0, currentQuantity + change); // Update quantity
        quantityElement.textContent = currentQuantity;

        // Update snack selection in the selectedSnacks object
        if (currentQuantity > 0) {
            selectedSnacks[snackID] = currentQuantity; // Store the selected quantity
        } else {
            delete selectedSnacks[snackID]; // Remove snack from selection if quantity is 0
        }

        // Update total price only if change is valid
        total += change * price;
        total = Math.max(0, total); // Prevent negative total

        // Update total price display
        totalPriceElement.textContent = `Tổng tiền: ${total.toLocaleString()} VND`;

        // Enable/disable checkout button
        checkoutButton.disabled = total === 0;
    };

    const pricePerSeat = 100000;
    // Checkout functionality
    checkoutButton.addEventListener("click", function () {
        const selectedSeats = JSON.parse(sessionStorage.getItem('selectedSeats') || '[]');

        // Prepare the selected snacks data to send to the backend
        const selectedSnackItems = selectedSnacks; // The object with snack IDs and quantities

        // Prepare data to send to the backend
        if (!transactionID) {
            alert('Transaction ID is missing.');
            return;
        }

        // When preparing the data for POST request in snack.js (checkoutButton)
        const params = new URLSearchParams();
        params.append('transactionID', transactionID);
        params.append('seats', JSON.stringify(selectedSeats));
        params.append('snacks', JSON.stringify(selectedSnackItems)); // Send the selected snacks object as JSON
        params.append('ticketAmount', selectedSeats.length * pricePerSeat); // Ensure ticketAmount is included

        fetch('../../BE/Customer/update_transaction.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: params
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = `payment.html?transactionID=${transactionID}`;
            } else {
                alert('Error updating transaction: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error during checkout:', error);
            alert('An error occurred during checkout.');
        });

    });
});
