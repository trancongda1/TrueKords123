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

        /* CSS cho tiêu đề không dùng thẻ h2 */
        .section-title {
            font-size: 24px;
            /* Kích thước chữ tùy chỉnh */
            font-weight: bold;
            margin: 20px 0;
        }

        .news-title {
            font-size: 20px;
            /* Kích thước chữ tùy chỉnh cho tiêu đề tin tức */
            font-weight: bold;
            margin: 20px 0;
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
                                <form action="#">
                                    <div class="header-input">
                                        <input type="text" class="inp-header-search" name="textSearch" placeholder="Tìm kiếm.." id="header-search">
                                    </div>
                                    <a href="#" class="header-icon-right header-search">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                </form>

                            </li>
                            <li>
                                <div class="box-user">
                                    <a href="/register" class="header-icon-right header-user">
                                        <i class="fa-regular fa-user"></i>
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
                        <li class="m2"><a href="/playlists" class="active"><span>Danh Sách Phát</span></a></li>
                        <li class="m2"><a href="/profile"><span>Hồ Sơ</span></a></li>
                        <li class="m3"><a href="/contribute" ><span>Đóng Góp</span></a></li>
                        <li class="m4"><a href="/about"><span>Về Chúng Tôi</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>

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