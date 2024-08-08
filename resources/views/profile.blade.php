<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Hồ Sơ Người Dùng - Music Beats</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/cufon-replace.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        a {
            color: white;
            text-decoration: none;
        }
        .profile-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .profile-header {
            flex: 1;
            max-width: 300px;
        }
        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .profile-details {
            flex: 2;
            max-width: 700px;
        }
        .profile-section {
            margin-bottom: 20px;
        }
        .profile-section h3 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .profile-section ul {
            list-style-type: none;
            padding: 0;
        }
        .profile-section ul li {
            margin-bottom: 10px;
        }
        .profile-section a {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>

<body id="page1">
    <!-- BẮT ĐẦU NGUỒN TRANG -->
    <div class="wrap">
        <header>
            <div class="container">
                <h1><a href="#">Music Beats</a></h1>
                <nav>
                    <ul>
                        <li class="m1"><a href="/"><span>Bài Hát</span></a></li>
                        <li class="m2"><a href="/playlists"><span>Danh Sách Phát</span></a></li>
                        <li class="m2"><a href="/profile" class="active"><span>Hồ Sơ</span></a></li>
                        <li class="m3"><a href="/contribute"><span>Đóng Góp</span></a></li>
                        <li class="m4"><a href="/about"><span>Về Chúng Tôi</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="container">
            <section id="content">
                <div class="wrapper">
                    <div class="profile-container">
                        <article class="profile-header">
                            <img src="images/download (5).jpeg" alt="Ảnh Hồ Sơ">
                            <h2>Tên Người Dùng</h2>
                            <p>Email: user@example.com</p>
                            <p>Điện thoại: (123) 456-7890</p>
                        </article>
                        <article class="profile-details">
                            <div class="profile-section">
                                <h3>Thông Tin Cá Nhân</h3>
                                <p>Họ và Tên: John Doe</p>
                                <p>Ngày Sinh: 1 tháng 1, 1990</p>
                                <p>Địa Chỉ: 123 Main St, Anytown, USA</p>
                                <p>Giới Tính: Nam</p>
                            </div>
                            <div class="profile-section">
                                <h3>Cài Đặt Tài Khoản</h3>
                                <a href="/change-password">Đổi Mật Khẩu</a>
                                <a href="/update-info">Cập Nhật Thông Tin Cá Nhân</a>
                            </div>
                            <div class="profile-section">
                                <h3>Hoạt Động Của Bạn</h3>
                                <h4>Bài Hát Được Thích</h4>
                                <ul>
                                    <li><a href="#">Tên Bài Hát 1</a></li>
                                    <li><a href="#">Tên Bài Hát 2</a></li>
                                </ul>

                                <h4>Bài Hát Được Bình Luận</h4>
                                <ul>
                                    <li><a href="#">Tên Bài Hát 3</a></li>
                                    <li><a href="#">Tên Bài Hát 4</a></li>
                                </ul>

                                <h4>Bài Hát Được Đánh Giá</h4>
                                <ul>
                                    <li><a href="#">Tên Bài Hát 5</a></li>
                                    <li><a href="#">Tên Bài Hát 6</a></li>
                                </ul>

                                <h4>Danh Sách Phát Của Bạn</h4>
                                <ul>
                                    <li><a href="#">Tiêu Đề Danh Sách Phát 1</a></li>
                                    <li><a href="#">Tiêu Đề Danh Sách Phát 2</a></li>
                                </ul>
                            </div>
                            <div class="profile-section">
                                <h3>Đóng Góp Của Bạn</h3>
                                <p>Bài Hát Đóng Góp:</p>
                                <ul>
                                    <li><a href="#">Đóng Góp Bài Hát 1</a> - Trạng Thái: Đang Chờ</li>
                                    <li><a href="#">Đóng Góp Bài Hát 2</a> - Trạng Thái: Đã Phê Duyệt</li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
            <div class="clear"></div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="footerlink">
                <p class="lf">Bản quyền &copy; 2023 <a href="#">Music Beats</a> - Bảo Lưu Tất Cả Quyền</p>      
                <div style="clear:both;"></div>
            </div>
        </div>
    </footer>
    <script type="text/javascript">
        Cufon.now();
    </script>
    <!-- KẾT THÚC NGUỒN TRANG -->
</body>

</html>
