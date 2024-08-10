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
                        <li class="m1">
                            <a href="/" class="active"><span>Bài Hát</span></a>
                            <div class="dropdow-song">
                                <ul>
                                    @foreach($playlists as $playlist)
                                        <li><a href="#">{{ $playlist->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="m2"><a href="/playlists"><span>Danh Sách Phát</span></a></li>
                        <li class="m2"><a href="/profile"><span>Hồ Sơ</span></a></li>
                        <li class="m3"><a href="/contribute"><span>Đóng Góp</span></a></li>
                        <li class="m4"><a href="/about"><span>Về Chúng Tôi</span></a></li>
                        
                    </ul>
                </nav>
            </div>
        </header>
        <div class="container">
            <aside>
                <div class="inside">
                    <p class="news-title">Tin Tức Mới Nhất</p>
                    <ul class="news">
                        <li><a href="#">Ngày 30 tháng 6, 2023</a><strong>Thông Báo Về Cập Nhật</strong> Chúng tôi đã thực hiện một số cập nhật quan trọng để cải thiện trải nghiệm người dùng và thêm nhiều tính năng mới.</li>
                        <li><a href="#">Ngày 14 tháng 6, 2023</a><strong>Giới Thiệu Tính Năng Mới</strong> Chúng tôi vui mừng thông báo về việc ra mắt tính năng tìm kiếm hợp âm nâng cao, giúp bạn dễ dàng tìm thấy các hợp âm yêu thích.</li>
                        <li><a href="#">Ngày 29 tháng 5, 2023</a><strong>Cải Thiện Giao Diện Người Dùng</strong> Giao diện của trang web đã được thiết kế lại để cung cấp trải nghiệm người dùng mượt mà hơn và dễ dàng hơn trong việc tìm kiếm hợp âm.</li>
                    </ul>
                </div>
            </aside>
            <section id="content">
                <div class="wrapper">
                    <div class="col-1">
                        <p class="section-title">Giới Thiệu Về Trang Web Hợp Âm Guitar</p>
                        <img src="images/hopamchuan.webp" class="responsive-img" alt="Hợp Âm Chuẩn">
                        <p class="p1">Chào mừng bạn đến với <strong>Music Beats</strong>, trang web cung cấp một thư viện phong phú các hợp âm chuẩn cho guitar. Trang web của chúng tôi được thiết kế để giúp bạn dễ dàng tìm kiếm và học các hợp âm khác nhau, từ những hợp âm cơ bản đến những hợp âm phức tạp hơn.</p>
                        <p class="p0">Với các hướng dẫn chi tiết và công cụ tìm kiếm hiệu quả, bạn có thể nhanh chóng tìm ra hợp âm cho bài hát yêu thích của mình và cải thiện kỹ năng chơi guitar. Dù bạn là người mới bắt đầu hay đã có kinh nghiệm, chúng tôi có các tài liệu và hỗ trợ để giúp bạn phát triển khả năng chơi đàn của mình.</p>
                    </div>

                    <div class="col-2">
                        <p class="section-title">Lợi Ích Của Trang Web</p>
                        <ul class="list">
                            <li><strong>Cung Cấp Hợp Âm Đầy Đủ</strong> - Chúng tôi cung cấp một danh sách hợp âm phong phú, bao gồm các hợp âm cơ bản và nâng cao để bạn dễ dàng học tập và thực hành.</li>
                            <li><strong>Hướng Dẫn Chi Tiết</strong> - Mỗi hợp âm đều có hướng dẫn chi tiết về cách chơi, giúp bạn nhanh chóng nắm bắt và áp dụng.</li>
                            <li><strong>Công Cụ Tìm Kiếm Hiệu Quả</strong> - Tính năng tìm kiếm mạnh mẽ giúp bạn nhanh chóng tìm thấy hợp âm cho bất kỳ bài hát nào bạn muốn chơi.</li>
                            <li><strong>Cộng Đồng Đam Mê Guitar</strong> - Tham gia cộng đồng của chúng tôi để trao đổi kinh nghiệm và học hỏi từ những người khác yêu thích guitar.</li>
                        </ul>
                    </div>



                    
                </div>
            </section>
            <div class="clear"></div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="cont-bot"></div>
            <div class="footerlink">
                <p class="lf">Copyright &copy; 2023 <a href="#">SiteName</a> - All Rights Reserved</p>
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