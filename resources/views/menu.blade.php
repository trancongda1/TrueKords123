<!DOCTYPE html>
<html lang="en">

<head>
    <title>Music Beats</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/cufon-replace.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/ITC_Busorama_500.font.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            font-family: arial;
        }
        /* Reset some default styling for the list */
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Add background image to the custom-background class */
        .custom-background {
            overflow: hidden;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        /* Style the image within the li */
        .custom-background img {
            width: 100%;
            height: 100%;
            display: block;
            border-radius: 10px;
            object-fit: cover;
        }

        /* Tùy chỉnh kiểu hiển thị của các liên kết */
        .custom-background a {
            text-decoration: none;
            color: #fff;
            /* Màu vàng sáng */
            font-weight: bold;
            margin-left: 50%;
            font-family: Arial, sans-serif;
            transform: translate(-50%, -50%);
            z-index: 1;
            font-size: 18px;
            /* Đặt cỡ chữ là 18px, thay đổi giá trị nếu cần */
        }

        /* Thêm văn bản dưới hình ảnh */
        .image-text {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: #FFD700;
            /* Màu vàng sáng */
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            font-size: 16px;
            /* Đặt cỡ chữ là 16px, thay đổi giá trị nếu cần */
        }

        /* CSS để cấu hình form tìm kiếm */
        .search-form {
            display: flex;
            width: 100%;
            /* Sử dụng toàn bộ chiều rộng của phần tử chứa form */
            max-width: 1200px;
            /* Độ rộng tối đa của form */
            margin: 0 auto;
            /* Canh giữa form trong phần tử chứa */
        }

        /* CSS cho trường input tìm kiếm */
        .search-form input[type="text"] {
            flex: 1;
            /* Sử dụng không gian còn lại trong form */
            padding: 10px;
            border-radius: 5px 0 0 5px;
            border: 1px solid #ccc;
        }

        /* CSS cho nút tìm kiếm */
        .search-form button {
            padding: 10px 15px;
            background-color: #333;
            color: white;
            border: 1px solid #333;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        /* CSS để chỉnh màu sắc của biểu tượng tìm kiếm */
        .search-form button i {
            color: white;
        }
        .search-result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }

        /* CSS cho danh sách */
        .song-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .song-list li {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
    </style>





    <!--[if lt IE 7]>
<link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen">
<script type="text/javascript" src="js/ie_png.js"></script>
<script type="text/javascript">
    ie_png.fix('.png, header nav ul li, header nav ul li a, h1 a');
</script>
<![endif]-->
    <!--[if lt IE 9]><script type="text/javascript" src="js/html5.js"></script><![endif]-->
</head>

<body id="page1">
    <!-- START PAGE SOURCE -->
    <div class="wrap">
        <header>
            <div class="container">

                <nav>
                    <ul>
                        <li class="m1"><a href="/index"><span>home</span></a></li>
                        <li class="m3"><a href="/menu" class="active"><span>menu</span></a></li>
                        <li class="m2"><a href="/about-us"><span>about</span></a></li>
                        <li class="m3"><a href="/articles"><span>articles</span></a></li>
                        <li class="m4"><a href="/contact-us"><span>contacts</span></a></li>
                        <li class="m3">
                            </form>
                            <form action="/menu" method="GET" class="search-form">
                                <input type="text" placeholder="Tìm kiếm bài hát.." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <form action="{{ route('songs.delete-search', ['title' => $songs[0]->title]) }}" method="POST">
                                @csrf
                                <button type="submit">Xoá lượt tìm kiếm</button>
                            </form>


                            @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                            @endif

                            @if ($songs->isNotEmpty())

                            @foreach ($songs as $song)
                                <div class="">
                                    <p style="font-family: arial; font-weight: bold; color: #fff">Title: {{ $song->title }}</p>
                                </div>

                                <div class="audio-controls">
                                    <audio controls class="mb-2">
                                        <source src="{{ asset('/' . $song->audio_path) }}" type="audio/mp3">
                                        Your browser does not support the audio element.
                                    </audio>
                                    <a href="{{ asset('storage/' . $song->audio_path) }}" download="{{ $songs[0]->filename }}" class="btn btn-primary"></a>
                                </div>
                            @endforeach

                            <!-- Danh sách các mục -->
                            <ul class="song-list">
                                @foreach ($songs as $song)


                                @endforeach
                            </ul>
                        @else
                            <p>Không tìm thấy bài hát</p>
                        @endif







                            </a>
                            <ul>
                                <li class="custom-background">
                                    <div>
                                        <img src="images/maxresdefault.jpg" alt="Ảnh 1">
                                    </div>
                                    <div><a href="users/top-ranking">Top Ranking</a></div>
                                </li>

                                <li class="custom-background">
                                    <img src="images/Nhac-cach-mang-thang-8-di-cung-nam-thang.jpg" alt="Ảnh 2">
                                    <a href="users/old-music">Old Music</a>
                                </li>

                                <li class="custom-background">
                                    <img src="images/Muon-Roi-Ma-Sao-Con-lot-top-nhac-HOT-hien-nay.jpg" alt="Ảnh 3">
                                    <a href="users/genres">GENRES</a>
                                </li>

                                <li class="custom-background">
                                    <img src="images/on-cua-bts-la-ca-khuc-kpop-duoc-tim-kiem-nhieu-nhat-tren-ung-dung-nhan-dien-nhac-shazam-2e8-5089670.jpg"
                                        alt="Ảnh 4">
                                    <a href="users/most-searched-song">Most Searched Song</a>
                                </li>

                                <li class="custom-background">
                                    <img src="images/maxresdefault (2).jpg" alt="Ảnh 5">
                                    <a href="users/top-artists">TOP ARTISTS</a>
                                </li>

                                <li class="custom-background">
                                    <img src="images/1120-492-max-169634767950281214680.webp" alt="Ảnh 5">
                                    <a href="users/new-releases">NEW RELEASES</a>
                                </li>

                                <li class="custom-background">
                                    <img src="images/maxresdefault (1).jpg" alt="Ảnh 6">
                                    <a href="users/languages">LANGUAGES</a>
                                </li>
                            </ul>




                </nav>
            </div>
        </header>
        <div class="container">

        </div>
        </footer>
        <script type="text/javascript">
            Cufon.now();
        </script>
        <!-- END PAGE SOURCE -->
</body>

</html>
