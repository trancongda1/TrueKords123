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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/dong_gop.css') }}">
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
                            <img src="{{ asset('images/gitar.jpg') }}" alt="">
                        </div>
                    </div>

                    <div class="header-top-right">
                        <ul>
                            <li>
                                <form action="{{ route('playlists.search') }}" method="GET">
                                    <div class="header-input">
                                        <input type="text" class="inp-header-search" name="search" placeholder="Tìm kiếm Playlist..." id="header-search" value="{{ request('search') }}">
                                    </div>
                                    <button type="submit" class="header-icon-right header-search">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </form>
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
                        <li class="m1"><a href="/"><span>Bài Hát</span></a></li>
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
                        <li><strong>Đưa Ra Phản Hồi</strong> - Chia sẻ suy nghĩ và gợi ý của bạn về cách chúng tôi có thể cải thiện dịch vụ của mình.</li>
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
                    <div class="form-group">
                        <label for="youtube_link">Link YouTube:</label>
                        <input type="url" id="youtube_link" name="youtube_link" required>
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

    <script>
        function openLoginModal() {
            console.log('Open modal function triggered');
            document.getElementById('loginModal').style.display = 'block';
        }

        function closeLoginModal() {
            console.log('Close modal function triggered');
            document.getElementById('loginModal').style.display = 'none';
        }
    </script>

</body>

</html>