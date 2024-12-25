# ISE-06-TicketWebsite

## Mô tả
ISE-06-TicketWebsite là một ứng dụng quản lý vé sự kiện, cho phép người dùng đăng ký, mua và quản lý vé sự kiện một cách dễ dàng. Dự án này được xây dựng sử dụng công nghệ PHP, MySQL và XAMPP để triển khai trên môi trường máy chủ cục bộ.

## Yêu cầu hệ thống
- **XAMPP**: Gói phần mềm bao gồm Apache, MySQL, PHP và Perl.
- **Trình duyệt web**: Chrome hoặc các trình duyệt hiện đại khác.

## Hướng dẫn cài đặt

### Bước 1: Tải XAMPP
Tải và cài đặt XAMPP từ trang chính thức:
[https://www.apachefriends.org/download.html](https://www.apachefriends.org/download.html)

### Bước 2: Cài đặt XAMPP
- Mở file cài đặt vừa tải về.
- Làm theo hướng dẫn trên màn hình để hoàn thành cài đặt.
- Khởi động **Apache** và **MySQL** từ **XAMPP Control Panel**.

### Bước 3: Bỏ source code vào thư mục `htdocs`
- Sao chép toàn bộ mã nguồn dự án vào thư mục `htdocs` của XAMPP, sao cho đường dẫn của project là (..\xampp\htdocs) so với folder XAMPP.

### Bước 4: Chạy localhost trên trình duyệt Chrome
- Mở trình duyệt Chrome.
- Truy cập địa chỉ: [http://localhost/ISE-06-TicketWebsite](http://localhost/ISE-06-TicketWebsite)
- Nếu mọi thứ được cài đặt chính xác, bạn sẽ thấy giao diện trang chủ của ứng dụng.

### Bước 5: Cấu hình lại nếu cần (port)
Nếu bạn gặp vấn đề về cổng (port) khi chạy XAMPP, làm theo các bước sau:
1. Mở **XAMPP Control Panel**.
2. Nhấp vào **Config** cạnh Apache.
3. Chọn **`httpd.conf`**.
4. Tìm dòng `Listen 80` và thay đổi thành một cổng khác, ví dụ `Listen 8080`.
5. Lưu file và khởi động lại Apache.
6. Truy cập lại ứng dụng với địa chỉ mới, ví dụ: [http://localhost:8080/ISE-06-TicketWebsite](http://localhost:8080/ISE-06-TicketWebsite)

## License: MIT