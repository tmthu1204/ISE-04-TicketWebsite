const movieSession = {
  movieTitle: "Cu Li Không Bao Giờ Khóc",
  theater: "Selenia Đống Đa",
  cinema: "Rạp 2",
  timeSlot: "18:00",
  bookingTimeLimit: 300,
  seatPrice: {
      regular: 120000,
  }
};

const seatLayout = {
  rows: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'],
  seatsPerRow: 15,
  unavailableSeats: ['A1', 'A2', 'B5', 'C7', 'D10', 'E15', 'F8', 'G3', 'H12', 'I9', 'J14']
};

window.movieSession = movieSession;
window.seatLayout = seatLayout;