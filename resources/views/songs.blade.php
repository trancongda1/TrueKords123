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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <style>
        a {
            color: white;
            text-decoration: none;
        }

        /* CSS chỉnh sửa để làm cho hình ảnh nhỏ lại */
        .responsive-img {
            max-width: 100%;
            height: auto;
        }

        /* General background and text color for the container */
        .songs-list {
            margin-top: 20px;
            padding: 10px;
            background: linear-gradient(to bottom right, #d148f0, #8e2de2);
            /* Gradient from light to dark purple */
            border-radius: 8px;
            color: #fff;
            /* White text */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Shadow for depth */
        }

        /* Styling for the main title */
        .search-results-title {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            color: #fff;
            /* White text */
        }

        /* Styling for the subtitles "Bài Hát" and "Tác Giả" */
        .search-results-subtitle {
            font-size: 20px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            color: #fff;
            /* White text */
        }

        /* List items for songs */
        .songs-list ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .songs-list ul li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #6a11cb;
            /* Solid darker purple for list items */
            border-radius: 4px;
            color: #fff;
            /* White text */
            transition: background-color 0.3s ease;
            gap: 20px;
            /* Space between title and artist */
        }

        .songs-list ul li:hover {
            background-color: #8e2de2;
            /* Lighter purple on hover */
        }

        .songs-list ul li:last-child {
            margin-bottom: 0;
        }

        .songs-list ul li span {
            font-size: 16px;
            color: #fff;
            /* White text */
            flex-grow: 1;
            text-align: left;
        }

        .songs-list ul li span.artist {
            font-weight: bold;
            color: #1e90ff;
            /* Bright blue for artist names */
            white-space: nowrap;
            text-align: right;
        }

        /* CSS cho tin nhắn không tìm thấy bài hát */
        .songs-list p {
            font-size: 18px;
            color: #dc3545;
            /* Màu đỏ để nhấn mạnh */
            text-align: center;
            margin-top: 20px;
        }

        /* CSS cho phân trang */
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Center items vertically */
            gap: 10px;
            /* Add spacing between pagination items */
        }

        .pagination .page-item {
            display: flex;
            align-items: center;
        }

        .pagination .page-item .page-link {
            background-color: #6a11cb;
            /* Solid darker purple for pagination */
            color: #fff;
            /* White text */
            border: none;
            /* Remove border */
            padding: 10px 15px;
            /* Padding for clickable area */
            border-radius: 8px;
            /* Rounded corners */
            transition: background-color 0.3s ease;
        }

        .pagination .page-item.active .page-link {
            background-color: #1e90ff;
            /* Bright blue background for active page */
            border-color: #1e90ff;
            /* Match border to background */
            color: #fff;
            /* White text */
        }

        .pagination .page-item .page-link:hover {
            background-color: #8e2de2;
            /* Lighter purple on hover */
        }

        /* CSS cho form tìm kiếm */
        .header-input {
            background-color: #000;
            /* Black background */
            color: #fff;
            /* White text */
            padding: 10px;
            border: none;
            /* Remove default border */
            border-radius: 5px;
            /* Rounded corners */
            width: 80%;
        }

        .header-input::placeholder {
            color: #bbb;
            /* Light grey placeholder text */
        }

        .header-icon-right.header-search {
            background-color: #000;
            /* Black background for the button */
            color: #fff;
            /* White text for the button */
            border: none;
            /* Remove default border */
            padding: 10px 15px;
            border-radius: 5px;
            /* Rounded corners */
            cursor: pointer;
            transition: background-color 0.3s ease;
            /* Smooth transition on hover */
        }

        .header-icon-right.header-search:hover {
            background-color: #333;
            /* Darker black on hover */
        }

        .box-user a {
            background-color: #000;
            /* Black background for the user icon */
            color: #fff;
            /* White text/icon */
            padding: 10px;
            border-radius: 5px;
            /* Rounded corners */
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease;
            /* Smooth transition on hover */
        }

        .box-user a:hover {
            background-color: #333;
            /* Darker black on hover */
        }
    </style>
</head>

<body id="page1">

    <!-- START PAGE SOURCE -->
    <div class="wrap">
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
                            <a href="/" class="active"><span>Bài Hát</span></a>
                        </li>
                        <li class="m2"><a href="/playlists"><span>Danh Sách Phát</span></a></li>
                        <li class="m3"><a href="/contribute"><span>Đóng Góp</span></a></li>
                        <li class="m4"><a href="/about"><span>Về Chúng Tôi</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="container">
            <!-- Phần hiển thị kết quả bài hát -->
            <div class="songs-list">
                <!-- Thêm tiêu đề chính -->
                <div class="search-results-title">Kết quả tìm kiếm:</div>
                <!-- Thêm tiêu đề phụ cho "Bài Hát" và "Tác Giả" -->
                <div class="search-results-subtitle">
                    <span>Bài Hát</span>
                    <span>Tác Giả</span>
                </div>

                @if($songs->isEmpty())
                <p>Không tìm thấy bài hát nào.</p>
                @else
                <ul>
                    @foreach($songs as $song)
                    <li>
                        <span><a href="{{ route('songs.chords', $song->id) }}">{{ $song->title }}</a></span>
                        <span class="artist">{{ $song->artist }}</span>
                    </li>
                    @endforeach
                </ul>

                <!-- Hiển thị các liên kết phân trang -->
                <div class="pagination">
                    {{ $songs->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="cont-bot"></div>
            <div class="footerlink">
                <div style="clear:both;"></div>
            </div>
        </div>
    </footer>

    <script type="text/javascript">
        Cufon.now();
    </script>
    <!-- END PAGE SOURCE -->
</body>

</html>