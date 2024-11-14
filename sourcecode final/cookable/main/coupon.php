<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Coupon</title>
    <link rel="stylesheet" href="../css/stylecoupun.css">
    <link rel="shortcut icon" type="image/jpg" href="../imgs/icon.jpg"/>
</head>
<body>
    <header>
        <h1>Mã giảm giá tháng 4/2024</h1>
    </header>
    <main>
        <div class="container">
            <div class="notification">
                <p>Ghi chú: Mã giảm giá áp dụng cho mọi ứng dụng đặt hàng.</p>
            </div>
            <div class="coupon">
                <div class="coupon-item red">
                    <button class="copy-button" onclick="copyToClipboard(this)">Sao chép mã</button>
                    <h2>Giảm 20% cho đơn hàng đầu tiên</h2>
                    <p>Sử dụng mã</p>
                    <p class="code">FOOD20</p>
                    <p>Áp dụng cho đơn hàng trên 100,000 VND</p>
                </div>
                <div class="coupon-item blue">
                    <button class="copy-button" onclick="copyToClipboard(this)">Sao chép mã</button>
                    <h2>Giảm 50,000 VND cho mỗi đơn hàng</h2>
                    <p>Sử dụng mã</p>
                    <p class="code">SAVE50</p>
                    <p>Không giới hạn giá trị đơn hàng</p>
                </div>
                <div class="coupon-item green">
                    <button class="copy-button" onclick="copyToClipboard(this)">Sao chép mã</button>
                    <h2>Giảm 30% cho đơn hàng đặt trước</h2>
                    <p>Sử dụng mã</p>
                    <p class="code">PREORDER30</p>
                    <p>Áp dụng cho đơn hàng từ 200,000 VND</p>
                </div>
                <div class="coupon-item yellow">
                    <button class="copy-button" onclick="copyToClipboard(this)">Sao chép mã</button>
                    <h2>Giảm 5% TỔNG BILL</h2>
                    <p>Sử dụng mã</p>
                    <p class="code">ABC50</p>
                    <p>Áp dụng cho đơn hàng trên 300,000 VND</p>
                </div>
                <div class="coupon-item red">
                    <button class="copy-button" onclick="copyToClipboard(this)">Sao chép mã</button>
                    <h2>Giảm 20% cho đơn hàng </h2>
                    <p>Sử dụng mã</p>
                    <p class="code">FOOD20</p>
                    <p>Áp dụng cho đơn hàng trên 0 VND</p>
                </div>
                <div class="coupon-item blue">
                    <button class="copy-button" onclick="copyToClipboard(this)">Sao chép mã</button>
                    <h2>Giảm 5% cho mỗi đơn hàng</h2>
                    <p>Sử dụng mã</p>
                    <p class="code">SAVE50</p>
                    <p>Áp dụng cho đơn hàng trên 30,000 VND</p>
                </div>
                <div class="coupon-item green">
                    <button class="copy-button" onclick="copyToClipboard(this)">Sao chép mã</button>
                    <h2>Giảm 10% cho đơn hàng đặt trước, tối thiểu 250,000 VND</h2>
                    <p>Sử dụng mã</p>
                    <p class="code">PREORDER30</p>
                    <p>Áp dụng cho đơn hàng từ 200,000 VND</p>
                </div>
                <div class="coupon-item yellow">
                    <button class="copy-button" onclick="copyToClipboard(this)">Sao chép mã</button>
                    <h2>Giảm 10% TỔNG BILL</h2>
                    <p>Sử dụng mã</p>
                    <p class="code">ABC50</p>
                    <p>Áp dụng cho đơn hàng trên 500,000 VND</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>Cookable.com</h3>
                <p>Mang đến cho bạn những ưu đãi tốt nhất từ hàng trăm cửa hàng trên toàn quốc.</p>
            </div>
            <div class="footer-column">
                <h3>Liên hệ</h3>
                <p>Email: info@Cookable.com</p>
                <p>Hotline: 0123456789</p>
            </div>
            <div class="footer-column">
                <h3>Theo dõi chúng tôi</h3>
                <div class="social-icons">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function copyToClipboard(button) {
            let codeElement = button.parentElement.querySelector('.code');
            let tempInput = document.createElement('input');
            tempInput.value = codeElement.innerText;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            button.innerText = 'Đã sao chép';
            button.disabled = true;
        }
    </script>
</body>
</html>
