document.addEventListener("DOMContentLoaded", () => {
    const snackList = document.getElementById("snackList");
    const totalPriceElement = document.getElementById("totalPrice");
    const checkoutButton = document.getElementById("checkoutButton");

    let total = 0;
    const selectedSnacks = {}; // Store selected snack quantities as an object
    let snackData = []; // To store the fetched snack data from the backend

    // Fetch snack data from backend
    fetch("../../BE/Customer/snack.php")
        .then(response => response.json())
        .then(data => {
            snackData = data; // Store the fetched data
            console.log("Fetched snack data:", snackData); // Debugging
            if (snackData.length > 0) {
                snackData.forEach(snack => {
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

        // Save snack data to sessionStorage immediately
        sessionStorage.setItem('selectedSnacks', JSON.stringify(selectedSnacks));

        // Calculate snackAmount (total price for selected snacks) and save it in sessionStorage
        const snackAmount = Object.keys(selectedSnacks).reduce((sum, snackID) => {
            const snack = snackData.find(s => s.snackID === snackID);
            return sum + selectedSnacks[snackID] * snack.price; // Calculate total price
        }, 0);
        sessionStorage.setItem('snackAmount', snackAmount);
    };

    // Checkout functionality
    checkoutButton.addEventListener("click", function () {
        const selectedSeats = JSON.parse(sessionStorage.getItem('selectedSeats') || '[]');
        const showtimeID = sessionStorage.getItem('showtimeID');
        const ticketAmount = parseInt(sessionStorage.getItem('ticketAmount')) || 0;

        if (!showtimeID || selectedSeats.length === 0) {
            alert('Dữ liệu không đầy đủ. Vui lòng kiểm tra lại.');
            return;
        }

        // Calculate snackAmount
        const snackAmount = Object.keys(selectedSnacks).reduce((total, snackID) => {
            const snack = snackData.find(s => s.snackID === snackID);
            return total + selectedSnacks[snackID] * snack.price;
        }, 0);

        // Store all required data in sessionStorage
        sessionStorage.setItem('selectedSnacks', JSON.stringify(selectedSnacks));
        sessionStorage.setItem('snackAmount', snackAmount);

        // Redirect to payment page
        window.location.href = `payment.html`;
    });

});
