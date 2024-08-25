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
    <link rel="stylesheet" href="css/song.css">
  
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
                                @if(Auth::check())
                                <!-- Hiển thị thông báo khi người dùng đã đăng nhập -->
                                <div class="box-user">
                                    <a href="javascript:void(0);" class="header-icon-right header-user" onclick="openLoginModal(123)">
                                        <i class="fa-regular fa-user"></i>
                                    </a>
                                </div>
                                @else
                                <!-- Hiển thị liên kết đăng ký khi người dùng chưa đăng nhập -->
                                <div class="box-user">
                                    <a href="/register" class="header-icon-right header-user">
                                        <i class="fa-regular fa-user"></i>
                                    </a>
                                </div>
                                @endif

                                <!-- Modal -->
                               
                                <div id="loginModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close" onclick="closeLoginModal()">&times;</span>
                                        <p>Bạn đã đăng nhập rồi! Hãy đăng xuất để thực hiện đăng ký mới.</p>
                                    </div>
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
            <div class="songs-list">
                <div class="search-results-title">Kết quả tìm kiếm:</div>
                <div class="search-results-subtitle">
                    <span>Bài Hát</span>
                    <span>Tác Giả</span>
                </div>

                @if($songs->isEmpty())
                <div class="no-songs">
                    <p>Không tìm thấy bài hát nào.</p>
                </div>

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
            <p class="lf">XIN CHÀO &copy; 2024 <a href="https://www.facebook.com/MaiDuckAnh">MAI ÂM NHẠC</a></p>
            <div class="footerlink">
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