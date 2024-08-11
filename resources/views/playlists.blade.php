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

        <section id="content">
            //contend
        </section>

        <div class="clear"></div>
    </div>

    <footer>
        <div class="container">
            <div class="footerlink">
                <p class="lf">Bản quyền &copy; 2023 <a href="#">MAI Beats</a> - ÂM NHẠC VIỆT NAM</p>
            </div>
        </div>
    </footer>
</body>

</html>
