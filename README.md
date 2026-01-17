\# LAB PHP – Session \& Authentication



\## Mô tả

Bài thực hành PHP sử dụng Session và MySQL (PDO) gồm:

\- Đăng ký tài khoản

\- Đăng nhập / Đăng xuất

\- Trang Dashboard (bảo vệ bằng Session)

\- Giỏ hàng đơn giản dùng Session



\## Cấu trúc file

\- db\_connect.php

\- register.php

\- login.php

\- dashboard.php

\- logout.php

\- cart.php



\## Database

\- Tên database: `buoi2\_php`

\- Sử dụng MySQL (phpMyAdmin)

\- Kết nối bằng PDO



\## Cách chạy

1\. Bật Apache \& MySQL (XAMPP)

2\. Copy thư mục vào `htdocs`

3\. Truy cập:

&nbsp;  - Register: `register.php`

&nbsp;  - Login: `login.php`

&nbsp;  - Dashboard: `dashboard.php`

&nbsp;  - Cart: `cart.php`



\## Ghi chú

\- Mật khẩu được mã hóa bằng `password\_hash`

\- Kiểm tra đăng nhập bằng Session

\- Giỏ hàng lưu bằng `$\_SESSION`



