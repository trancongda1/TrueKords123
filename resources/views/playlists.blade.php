<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Music Beats - Danh Sách Phát</title>
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
        header h1 a {
            color: #007bff;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            padding: 0;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a.active {
            color: #0056b3;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            display: flex;
            flex-direction: row;
        }

        aside {
            width: 25%;
            margin-right: 20px;
        }

        aside h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        aside .news {
            list-style: none;
            padding: 0;
        }

        aside .news li {
            margin-bottom: 15px;
        }

        aside .news a {
            color: #007bff;
            text-decoration: none;
        }

        section#content {
            width: 75%;
        }

        article {
            margin-bottom: 20px;
        }

        article h2 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        article img {
            max-width: 100%;
            height: auto;
            /* Để giữ tỷ lệ khung hình */
            object-fit: cover;
            /* Để ảnh không bị biến dạng */
        }

        .p1,
        .p0 {
            margin-bottom: 20px;
        }

        .list {
            list-style: none;
            padding: 0;
        }

        .list li {
            margin-bottom: 15px;
        }

        .list a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        footer {
            background-color: #fff;
            border-top: 1px solid #ddd;
            padding: 20px 0;
            text-align: center;
        }

        footer .footerlink p {
            font-size: 14px;
            margin: 0;
        }

        footer .footerlink a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="#">Music Beats</a></h1>
            <nav>
                <ul>
                    <li class="m1"><a href="/"><span>Bài Hát</span></a></li>
                    <li class="m2"><a href="/playlists" class="active"><span>Danh Sách Phát</span></a></li>
                    <li class="m2"><a href="/profile"><span>Hồ Sơ</span></a></li>
                    <li class="m3"><a href="/contribute"><span>Đóng Góp</span></a></li>
                    <li class="m4"><a href="/about"><span>Giới Thiệu</span></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <aside>
            <div class="inside">
                <h2>Tin Tức Mới Nhất</h2>
                <ul class="news">
                    <li><a href="#">Ngày 30 tháng 6, 2023</a><strong>Thêm Các Tiến Trình Hợp Âm Mới</strong> Khám phá bộ sưu tập mới nhất của chúng tôi về các tiến trình hợp âm để nâng cao các bản nhạc của bạn.</li>
                    <li><a href="#">Ngày 14 tháng 6, 2023</a><strong>Cập Nhật Bảng Xếp Hạng Bài Hát</strong> Xem bảng xếp hạng bài hát cập nhật với các bản hit và cấu trúc hợp âm của chúng.</li>
                    <li><a href="#">Ngày 29 tháng 5, 2023</a><strong>Hướng Dẫn Mới</strong> Học các kỹ thuật mới với các hướng dẫn mới nhất của chúng tôi về chơi và sáng tác nhạc.</li>
                </ul>
            </div>
        </aside>

        <section id="content">
            <div class="wrapper">
                <article class="col-1">
                    <h2>Khám Phá Hợp Âm Guitar và Bản Nhạc</h2>
                    <!-- Thay thế ảnh bên dưới bằng ảnh liên quan đến guitar -->
                    <img src="images/guitar1.jpg" alt="Hợp Âm Guitar">
                    <p class="p1">Tại Music Beats, chúng tôi cung cấp một thư viện đầy đủ các tiến trình hợp âm guitar và bản nhạc để truyền cảm hứng và hỗ trợ nhạc sĩ ở mọi cấp độ. Dù bạn là một nhạc sĩ mới hay một nhà soạn nhạc dày dạn kinh nghiệm, các tài nguyên của chúng tôi có thể giúp bạn tìm thấy những hợp âm hoàn hảo cho dự án tiếp theo của mình.</p>
                    <p class="p0">Duyệt qua bộ sưu tập hợp âm guitar phong phú của chúng tôi, khám phá các phong cách âm nhạc khác nhau và tìm bản nhạc chi tiết để hướng dẫn bạn trong hành trình âm nhạc của mình. Nền tảng của chúng tôi được thiết kế để cung cấp cho bạn các công cụ cần thiết để nâng cao sự sáng tạo và cải thiện kỹ năng âm nhạc của bạn.</p>
                </article>

                <article class="col-2">
                    <h2>Các Bài Viết Gần Đây</h2>
                    <ul class="list">
                        <li><strong>Hiểu Biết Về Tiến Trình Hợp Âm Guitar</strong> Tìm hiểu những kiến thức cơ bản về tiến trình hợp âm guitar và cách chúng hình thành âm nhạc của bạn. Khám phá lý thuyết đằng sau các tiến trình phổ biến và cách áp dụng chúng trong các tác phẩm của bạn. <a href="#"><i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><strong>Bản Nhạc Cho Guitar</strong> Bắt đầu với bản nhạc và hướng dẫn thân thiện với guitar của chúng tôi. Hoàn hảo cho những người mới học đọc nhạc và muốn cải thiện kỹ năng của mình. <a href="#"><i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><strong>Kỹ Thuật Guitar Nâng Cao</strong> Khám phá các kỹ thuật nâng cao để viết nhạc guitar hấp dẫn. Từ các thay đổi hợp âm phức tạp đến các giai điệu tinh xảo, các bài viết của chúng tôi cung cấp những cái nhìn quý giá cho những người chơi guitar dày dạn kinh nghiệm. <a href="#"><i class="fa-solid fa-arrow-right"></i></a></li>
                        <li><strong>Các Bài Hát Phổ Biến và Hợp Âm Của Chúng</strong> Khám phá các hợp âm guitar được sử dụng trong các bài hát phổ biến và cách tái tạo chúng. Phân tích cấu trúc hợp âm của các bản hit nổi tiếng và học cách tích hợp chúng vào âm nhạc của bạn. <a href="#"><i class="fa-solid fa-arrow-right"></i></a></li>
                    </ul>
                </article>
            </div>
        </section>

        <div class="clear"></div>
    </div>

    <footer>
        <div class="container">
            <div class="footerlink">
                <p class="lf">Bản quyền &copy; 2023 <a href="#">Music Beats</a> - Đã Được Bảo Lưu Quyền</p>
            </div>
        </div>
    </footer>
</body>

</html>
