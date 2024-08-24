<!DOCTYPE html>
<html lang="en">

<head>
    <title>Music Beats</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all">
    <script type="text/javascript" src="{{ asset('js/jquery-1.4.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cufon-yui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cufon-replace.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/playlist.css') }}">

</head>

<body id="page1">
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
                        <li class="m1"><a href="/"><span>Bài Hát</span></a></li>
                        <li class="m2"><a href="/playlists" class="active"><span>Danh Sách Phát</span></a></li>
                        <li class="m3"><a href="/contribute"><span>Đóng Góp</span></a></li>
                        <li class="m4"><a href="/about"><span>Về Chúng Tôi</span></a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="playlist-container play-section">
            <div class="title-playlists">
                <h2>Danh sách nhạc</h2>
            </div>
            <div class="box-playlists">
                <div class="play-lists">
                    @if($playlists->isEmpty())
                    <div class="no-playlist">
                        <p>Không tìm thấy playlist nào phù hợp với từ khóa "{{ request('search') }}"</p>
                    </div>

                    @else
                    @foreach($playlists as $playlist)
                    <h3 class="playlist-title" onclick="toggleSongs(this)">{{ $playlist->name }}</h3>
                    <ul class="song-list">
                        @foreach($playlist->songs as $song)
                        <li onclick="redirectToChords({{ $song->id }})">{{ $song->title }}</li>
                        @endforeach
                    </ul>
                    @endforeach
                    @endif
                </div>
                <div class="playlis-image">
                    <img src="{{asset('../images/music-playlists.png')}}" alt="">
                </div>
            </div>
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


        // Đóng modal khi click bên ngoài
        window.onclick = function(event) {
            var modal = document.getElementById('loginModal');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }

        function toggleSongs(element) {
            var songList = element.nextElementSibling;
            songList.classList.toggle('active');
        }

        function redirectToChords(songId) {
            window.location.href = `/songs/${songId}/chords`;
        }
    </script>
</body>

</html>