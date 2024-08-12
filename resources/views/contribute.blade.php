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
    <style>
        a {
            color: white;
            text-decoration: none;
        }

        .contribute-section {
            margin-bottom: 20px;
            max-width: 40%;
            /* Giới hạn chiều rộng cho phần nội dung bên trái */
        }

        .contribute-section h2 {
            margin-bottom: 15px;
        }

        .contribute-section ul {
            list-style-type: none;
            padding: 0;
        }

        .contribute-section li {
            margin-bottom: 10px;
        }

        .contact-form-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .contact-form {
            margin-top: 20px;
            max-width: 40%;
            /* Giới hạn chiều rộng cho phần form */
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .contact-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .contact-form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #218838;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
</head>

<body id="page1">
    <!-- BẮT ĐẦU NGUỒN TRANG -->
    <div class="wrap">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <header>
            <div class="container">
                <h1><a href="#">Music Beats</a></h1>
                <nav>
                    <ul>
                        <li class="m1"><a href="/"><span>Bài Hát</span></a></li>
                        <li class="m2"><a href="/playlists"><span>Danh Sách Phát</span></a></li>
                        <li class="m3"><a href="/contribute" class="active"><span>Đóng Góp</span></a></li>
                        <li class="m4"><a href="/about"><span>Về Chúng Tôi</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="container">
            <section id="content" class="box-content">
                <div class="contact-form-container">
                    <article class="col-1 contribute-section">
                        <h2>Cách Bạn Có Thể Đóng Góp</h2>
                        <p>Tại Music Beats, chúng tôi hoan nghênh sự đóng góp từ cộng đồng để giúp chúng tôi phát triển và cải thiện. Dưới đây là một số cách bạn có thể tham gia:</p>
                        <ul>
                            <li><strong>Gửi Nhạc</strong> - Chia sẻ nhạc của bạn để chúng tôi có thể giới thiệu trên nền tảng của chúng tôi.</li>
                            <li><strong>Báo Cáo Vấn Đề</strong> - Giúp chúng tôi xác định và khắc phục các lỗi hoặc sự cố bạn gặp phải.</li>
                            <li><strong>Đưa Ra Phản Hồi</strong> - Chia sẻ suy nghĩ và gợi ý của bạn về cách chúng tôi có thể cải thiện dịch vụ của mình.</li>
                            <li><strong>Trở Thành Tình Nguyện Viên</strong> - Tham gia vào đội ngũ của chúng tôi với vai trò tình nguyện viên để hỗ trợ các công việc và dự án khác nhau.</li>
                        </ul>
                        <p>Nếu bạn có bất kỳ ý tưởng nào khác hoặc muốn tham gia theo cách khác, xin đừng ngần ngại liên hệ với chúng tôi.</p>
                    </article>
                    <form class="contact-form" action="{{ route('contributions.store') }}" method="post">
                        @csrf <!-- Thêm token CSRF để bảo vệ form -->
                        <label for="name">Tên Của Bạn:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="title">Tiêu Đề:</label>
                        <input type="text" id="title" name="title" required>

                        <label for="description">Mô Tả (Tùy chọn):</label>
                        <textarea id="description" name="description" rows="4"></textarea>

                        <label for="content">Nội Dung (Bài hát hoặc hợp âm):</label>
                        <textarea id="content" name="content" rows="6" required></textarea>

                        <label for="approval">Bạn có muốn nội dung của bạn được phê duyệt?</label>
                        <input type="checkbox" id="approval" name="approval">

                        <button type="submit">Gửi Đóng Góp</button>
                    </form>
                </div>
            </section>
            <div class="clear"></div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="cont-bot"></div>
            <div class="footerlink">
                <p class="lf">XIN CHÀO &copy; 2024 <a href="#">MAI ÂM NHẠC</p>
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