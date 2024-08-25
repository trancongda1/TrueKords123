<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Về Chúng Tôi - Music Beats</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/cufon-replace.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <style>
        /* Custom Styles for Content */
        .content-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            text-align: center;
            background-color: #1b1b1b;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .content-section img {
            max-width: 50%;
            /* Image size adjusted here */
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .content-text {
            max-width: 600px;
            margin: 20px;
        }

        .content-text h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            font-family: 'Lobster', cursive;
        }

        .content-text p {
            font-size: 1.2em;
            line-height: 1.6;
            font-family: 'Poppins', sans-serif;
        }

        @media (max-width: 768px) {
            .content-section {
                flex-direction: column;
                height: auto;
            }

            .content-text {
                margin: 10px 0;
            }

            .content-text h2 {
                font-size: 2em;
            }

            .content-text p {
                font-size: 1em;
            }

            .content-section img {
                max-width: 80%;
                /* Adjusts the image size on smaller screens */
            }
        }
    </style>
</head>

<body id="page1">
    <!-- BẮT ĐẦU NGUỒN TRANG -->
    <div class="wrap">
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
                        <li class="m3"><a href="/contribute" ><span>Đóng Góp</span></a></li>
                        <li class="m4"><a href="/about" class="active"><span>Về Chúng Tôi</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>


        <div class="container">
            <section class="content-section">
                <div class="content-text">
                    <h2>Welcome to True Kords</h2>
                    <p>Mai Đức Anh, hiện là sinh viên của Trường Đại học Giao thông Vận tải, là người sáng lập trang web này. Đây là đồ án tốt nghiệp của tôi, một dự án tâm huyết hướng đến việc xây dựng một nền tảng chuyên về chia sẻ nhạc và hợp âm. Mục tiêu của tôi là tạo ra một không gian âm nhạc phong phú, nơi mọi người có thể khám phá, học hỏi, và cống hiến cho cộng đồng yêu nhạc.</p>

                </div>
                <img src="{{ asset('../images/music-playlists.png') }}" alt="Music Playlists">
            </section>
        </div>
    </div>

    <footer>
        <div class="container">
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