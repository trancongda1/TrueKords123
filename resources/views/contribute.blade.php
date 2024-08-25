<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Đóng Góp - Music Beats</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/cufon-replace.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dong_gop.css') }}">
    <style>
        /* General Styles */
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #111;
            color: white;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        /* Header Styles */
        header {
            background-color: #000;
            padding: 10px 0;
            color: white;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-top-right ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }

        .header-top-right ul li {
            display: inline-block;
        }

        .header-input input {
            background-color: #333;
            border: none;
            padding: 8px 10px;
            border-radius: 5px;
            color: white;
        }

        .header-icon-right {
            color: white;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            margin-left: 5px;
        }

        nav ul {
            list-style-type: none;
            padding-left: 0;
            display: flex;
            gap: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        nav ul li a.active {
            border-bottom: 2px solid purple;
        }

        /* Content Styles */
        .content-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            text-align: left;
            background-color: #1b1b1b;
            color: white;
            padding: 40px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            gap: 20px;
        }

        .content-text {
            flex: 1;
            max-width: 55%;
        }

        .content-text h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            font-family: 'Lobster', cursive;
            color: #ff1493;
        }

        .content-text p,
        .content-text ul {
            font-size: 1.2em;
            line-height: 1.6;
            font-family: 'Poppins', sans-serif;
            text-align: left;
        }

        .content-text ul {
            list-style: none;
            padding-left: 0;
        }

        .content-text ul li {
            margin-bottom: 10px;
        }

        .content-text strong {
            font-weight: bold;
        }

        .contact-form {
            flex: 1;
            max-width: 40%;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            color: #ddd;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            background-color: #444;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .form-group textarea {
            resize: none;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.1);
        }

        .submit-button {
            background-color: #ff1493;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .submit-button:hover {
            background-color: #ff69b4;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .content-section {
                flex-direction: column;
                align-items: center;
            }

            .content-text,
            .contact-form {
                max-width: 100%;
            }

            .content-text ul {
                padding-left: 20px;
            }
        }
    </style>
</head>

<body id="page1">
    <!-- BẮT ĐẦU NGUỒN TRANG -->
    <div class="wrap">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button class="close-btn" onclick="this.parentElement.style.display='none';">&times;</button>
        </div>
        @endif

        <header>
            <div class="container">
                <div class="header-top">
                    <div class="logo-top">
                        <div class="image-logo">
                            <img src="{{asset('images/gitar.jpg')}}" alt="">
                        </div>
                    </div>

                    <div class="header-top-right">
                        <ul>
                            <li>
                                <form action="{{ route('user.songs.search') }}" method="GET">
                                    <div class="header-input">
                                        <input type="text" class="inp-header-search" name="textSearch" placeholder="Tìm kiếm.." id="header-search" value="{{ request('textSearch') }}">
                                    </div>
                                    <button type="submit" class="header-icon-right header-search">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
                            </li>
                            <li>
                                <div class="box-user">
                                    <a href="/register" class="header-icon-right header-user">
                                        <i class="fa-regular fa-user"></i>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="box-user">
                                    <a href="/logout" class="header-icon-right header-user">
                                        <i class="fa-solid fa-sign-out"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <h1><a href="#">Music Beats</a></h1>
                <nav>
                    <ul>
                        <li class="m1">
                            <a href="/"><span>Bài Hát</span></a>
                        </li>
                        <li class="m2"><a href="/playlists"><span>Danh Sách Phát</span></a></li>
                        <li class="m3"><a href="/contribute" class="active"><span>Đóng Góp</span></a></li>
                        <li class="m4"><a href="/about"><span>Về Chúng Tôi</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="container">
            <section class="content-section">
                <div class="content-text">
                    <h2>Cách Bạn Có Thể Đóng Góp</h2>
                    <p>Tại True Kords, chúng tôi hoan nghênh sự đóng góp từ cộng đồng để giúp chúng tôi phát triển và cải thiện. Dưới đây là một số cách bạn có thể tham gia:</p>
                    <ul>
                        <li><strong>Gửi Nhạc</strong> - Chia sẻ nhạc của bạn để chúng tôi có thể giới thiệu trên nền tảng của chúng tôi.</li>
                        <li><strong>Báo Cáo Vấn Đề</strong> - Giúp chúng tôi xác định và khắc phục các lỗi hoặc sự cố bạn gặp phải.</li>
                        <li><strong>Đưa Ra Phản Hồi</strong> - Chia sẻ suy nghĩ và gợi ý của bạn về cách chúng tôi có thể cải thiện dịch vụ của mình.</
                                <li><strong>Trở Thành Tình Nguyện Viên</strong> - Tham gia vào đội ngũ của chúng tôi với vai trò tình nguyện viên để hỗ trợ các công việc và dự án khác nhau.</li>
                    </ul>
                    <p>Nếu bạn có bất kỳ ý tưởng nào khác hoặc muốn tham gia theo cách khác, xin đừng ngần ngại liên hệ với chúng tôi.</p>
                </div>

                <form class="contact-form" action="{{ route('contributions.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên Của Bạn:</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Tiêu Đề:</label>
                        <input type="text" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Mô Tả (Tùy chọn):</label>
                        <textarea id="description" name="description" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Nội Dung (Bài hát hoặc hợp âm):</label>
                        <textarea id="content" name="content" rows="6" required></textarea>
                    </div>

                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="approval" name="approval">
                        <label for="approval">Bạn có muốn nội dung của bạn được phê duyệt?</label>
                    </div>

                    <button type="submit" class="submit-button">Gửi Đóng Góp</button>
                </form>
            </section>
            <div class="clear"></div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="cont-bot"></div>
            <div class="footerlink">
                <p class="lf">XIN CHÀO &copy; 2024 <a href="https://www.facebook.com/MaiDuckAnh">MAI ÂM NHẠC</a></p>
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