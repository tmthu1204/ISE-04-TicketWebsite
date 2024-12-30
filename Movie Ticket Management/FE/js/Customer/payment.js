document.addEventListener('DOMContentLoaded', function () {
    // Collect required data from sessionStorage
    const customerID = sessionStorage.getItem('customerID');
    const showtimeID = sessionStorage.getItem('showtimeID');
    const selectedSeats = JSON.parse(sessionStorage.getItem('selectedSeats') || '[]');
    const ticketAmount = sessionStorage.getItem('ticketAmount');
    const selectedSnacks = JSON.parse(sessionStorage.getItem('selectedSnacks') || '[]');
    const snackAmount = sessionStorage.getItem('snackAmount');

    console.log('showtimeID from sessionStorage:', showtimeID);

    if (!showtimeID || !selectedSeats.length) {
        alert('Missing required information. Please complete your selection first.');
        window.location.href = 'select_seats.html'; // Redirect to seat selection
        return;
    }

    // Function to fetch transaction details based on sessionStorage data
    const fetchTransactionDetails = () => {
        const url = `../../BE/Customer/get_transaction_details.php?customerID=${customerID}&showtimeID=${showtimeID}&selectedSeats=${JSON.stringify(selectedSeats)}&ticketAmount=${ticketAmount}&selectedSnacks=${JSON.stringify(selectedSnacks)}&snackAmount=${snackAmount}`;

        // Fetch transaction details based on sessionStorage data
        return fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch transaction details. Status: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    throw new Error(data.error);
                }

                // Process and display data (populate payment details on the page)
                document.getElementById('movieTitle').textContent = data.title || 'Unknown Title';
                document.getElementById('moviePoster').src = data.poster ? `../images/${data.poster}` : '../images/default-poster.png';
                document.getElementById('movieTheater').textContent = `Theater: ${data.showtime.theater || 'Unknown Theater'}`;
                document.getElementById('showtimeRoom').textContent = `Room: ${data.showtime.room || 'Unknown Room'}`;
                document.getElementById('showtimeTime').textContent = `Time: ${data.showtime.startTime || ''} - ${data.showtime.endTime || ''}`;
                document.getElementById('seatList').textContent = `Seats: ${data.seatsBooked || 'None'}`;
                document.getElementById('snackList').textContent = `Snacks: ${data.snack?.join(', ') || 'None'}`;
                document.getElementById('totalAmount').textContent = `Total: ${data.totalAmount || '0'} VND`;
            })
            .catch(err => {
                console.error('Error fetching transaction details:', err.message);
                alert('An error occurred while fetching transaction details.');
            });
    };

    // Fetch transaction details when page loads based on sessionStorage data
    fetchTransactionDetails();

    // Add event listener for payment method forms
    document.querySelectorAll('button[type="button"]').forEach(button => {
        button.addEventListener('click', async function (e) {
            e.preventDefault(); // Prevent the default behavior of the button
    
            let paymentMethod = '';
            if (this.textContent.includes('ZALO')) {
                paymentMethod = 'ZALO';
            } else if (this.textContent.includes('ATM')) {
                paymentMethod = 'ATM';
            }
    
            if (!paymentMethod) {
                alert('Please select a valid payment method.');
                return;
            }
    
            try {
                // Check if the selected seats are available
                const seatsAvailable = await checkSeatAvailability(showtimeID, selectedSeats);
                console.log("Check results: ", seatsAvailable);
    
                if (seatsAvailable.success === false) {
                    alert('One or more of your selected seats are already booked. Please choose other seats.');
                    window.location.href = '../../FE/Customer/Homepage-user.html'; // Redirect to Homepage if seat is already booked
                    console.log("AAAAAAAAA")
                }
                // Initialize the transaction with the selected payment method
                const transactionID = await initTransaction(paymentMethod);
                if (!transactionID) throw new Error('Transaction ID not generated.');
    
                console.log('Transaction initialized:', transactionID);
    
                // Save transactionID into sessionStorage
                sessionStorage.setItem('transactionID', transactionID);
    
                for (let seat of selectedSeats) {
                    const { row, col } = extractRowCol(seat);
                    console.log("row: ", row)
                    console.log("col: ", col)
                    const status = "1"; // 1 for booked
                    updateSeatStatus(row-1, col-1, status);
                }
    
                // Redirect to the respective payment page
                if (paymentMethod === 'ZALO') {
                    window.location.href = '../../BE/Customer/Payment/zalo_payment.php';
                } else if (paymentMethod === 'ATM') {
                    window.location.href = '../../BE/Customer/Payment/atm_payment.php';
                }
            } catch (error) {
                console.error('Error initializing transaction:', error.message);
                alert('Failed to initialize transaction. Please try again.');
            }
        });
    });

    // Extract row and column from seat identifier
    const extractRowCol = (seat) => {
        const match = seat.match(/^R(\d+)C(\d+)$/);  // Regex to extract row and column
        if (match) {
            return { row: parseInt(match[1], 10), col: parseInt(match[2], 10) };
        }
        return { row: null, col: null };
    };
    
    
    // Initialize transaction function (used when choosing payment method)
    const initTransaction = (paymentMethod) => {
        const currentDatetime = new Date();
        const formattedDatetime = currentDatetime.getFullYear() + '-' + 
                                  ('0' + (currentDatetime.getMonth() + 1)).slice(-2) + '-' + 
                                  ('0' + currentDatetime.getDate()).slice(-2) + ' ' + 
                                  ('0' + currentDatetime.getHours()).slice(-2) + ':' + 
                                  ('0' + currentDatetime.getMinutes()).slice(-2) + ':' + 
                                  ('0' + currentDatetime.getSeconds()).slice(-2);
        return fetch('../../BE/Customer/init_transaction.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                customerID,
                showtimeID,
                selectedSeats,
                ticketAmount,
                selectedSnacks,
                snackAmount,
                paymentInfo: {
                    method: paymentMethod,
                    datetime: formattedDatetime,
                    status: 0, // Default status (pending)
                }
            }),
        })
        .then(response => response.text()) // Get the response as text
        .then(text => {
            console.log('Response Text:', text); // Log the raw response to check if it's HTML or JSON
            try {
                return JSON.parse(text); // Attempt to parse JSON
            } catch (error) {
                throw new Error('Response is not valid JSON: ' + error.message);
            }
        })
            .then(data => {
                if (data.error) {
                    throw new Error(data.error);
                }
                return data.transactionID;
            });
    };

    const checkSeatAvailability = async (showtimeID, selectedSeats) => {
        try {
            const response = await fetch('../../BE/Customer/check_seat_availability.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    showtimeID: showtimeID,
                    selectedSeats: selectedSeats
                }),
            });
    
            const text = await response.text();
            console.log("Response text: ", text); // Log the response for debugging
            console.log("Request body:", JSON.stringify({
                showtimeID: showtimeID,
                selectedSeats: selectedSeats
            }));
            const data = JSON.parse(text);
            return data;
        } catch (error) {
            console.error('Error:', error);
            throw error;
        }
    };

    // Function to update the seat status in the database
    function updateSeatStatus(row, col, status) {
        const showtimeID = sessionStorage.getItem('showtimeID') || urlParams.get('showtimeID');
        console.log('Retrieved showtimeID:', showtimeID);

        if (!showtimeID) {
            alert('Invalid showtime ID.');
            return;
        }


        fetch('../../BE/Customer/update_seat.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                showtimeID,
                row,
                col,
                status
            })
        })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    alert(`Failed to update seat status: ${data.error}`);
                } else {
                    console.log(
                        `Seat [Row ${row + 1}, Col ${col + 1}] updated to ${status === "1" ? "selected" : "available"}`
                    );
                }
            })
            .catch(error => {
                console.error('Error updating seat status:', error);
                alert('Error updating seat status.');
            });
    }
});
