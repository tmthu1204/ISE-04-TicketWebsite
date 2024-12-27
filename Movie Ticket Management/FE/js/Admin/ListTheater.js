function createTheaterCard(theater) {
    // Tạo thẻ (card)
    const card = document.createElement('div');
    card.style.background = '#e8dccc';
    card.style.border = '1px solid #ddd';
    card.style.borderRadius = '8px';
    card.style.padding = '16px';
    card.style.width = '300px';
    card.style.textAlign = 'center';
    card.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
    card.style.transition = 'transform 0.2s, box-shadow 0.2s';
    card.style.margin = '10px'; // Khoảng cách giữa các thẻ

    card.addEventListener('mouseover', () => {
        card.style.transform = 'translateY(-5px)';
        card.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
    });

    card.addEventListener('mouseout', () => {
        card.style.transform = 'none';
        card.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
    });

    // Tiêu đề (tên rạp)
    const title = document.createElement('h3');
    title.textContent = theater.name;
    title.style.margin = '0 0 10px';
    title.style.fontSize = '1.5rem';
    title.style.color = '#333';

    // Liên kết "Xem phim tại rạp"
    const link = document.createElement('a');
    link.href = `showMovies.html?theaterID=${theater.theaterID}`;
    link.textContent = 'Điều chỉnh suất chiếu';
    link.style.textDecoration = 'none';
    link.style.color = '#007bff';
    link.style.fontWeight = 'bold';
    link.style.fontSize = '1rem';

    link.addEventListener('mouseover', () => {
        link.style.color = '#0056b3';
    });

    link.addEventListener('mouseout', () => {
        link.style.color = '#007bff';
    });

    // Thêm các phần tử vào thẻ
    card.appendChild(title);
    card.appendChild(link);

    return card;
}

// Lấy danh sách rạp từ API
fetch('../../BE/Admin/show_theater.php')
    .then(response => response.json())
    .then(theaters => {
        const theaterListDiv = document.getElementById('theater-list');
        theaterListDiv.style.display = 'flex';
        theaterListDiv.style.flexWrap = 'wrap';
        theaterListDiv.style.justifyContent = 'center';
        theaterListDiv.style.gap = '20px'; // Khoảng cách giữa các thẻ
        theaterListDiv.style.padding = '20px'; // Khoảng cách xung quanh

        theaterListDiv.innerHTML = ''; // Xóa nội dung cũ

        // Tạo thẻ cho từng rạp và thêm vào danh sách
        theaters.forEach((theater) => {
            const card = createTheaterCard(theater);
            theaterListDiv.appendChild(card);
        });
    })
    .catch(error => alert('Có lỗi khi tải danh sách rạp: ' + error));
