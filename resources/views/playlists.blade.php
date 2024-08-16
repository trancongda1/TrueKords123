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
    <link rel="stylesheet" href="{{ asset('css/playlist.css') }}">
    <style>
        .song-list {
            display: none;
            /* Hide all song lists initially */
        }

        .song-list.active {
            display: block;
            /* Show the song list when active */
        }
    </style>
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
                    <div class="playlist-container">
                        <!-- Search Form -->
                        <form action="{{ route('playlists.search') }}" method="GET" class="playlist-search-form">
                            <input type="text" name="search" placeholder="Tìm kiếm Playlist..." value="{{ request('search') }}">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>

                        @foreach($playlists as $playlist)
                        <ul class="song-list">
                            @foreach($playlist->songs as $song)
                            <li onclick="redirectToChords({{ $song->id }})">{{ $song->title }}</li>
                            @endforeach
                        </ul>
                        @endforeach
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
                    @foreach($playlists as $playlist)
                        
                    <h3 class="playlist-title" onclick="toggleSongs(this)">{{ $playlist->name }}</h3>

                        <ul class="song-list">
                            @foreach($playlist->songs as $song)
                            <li onclick="redirectToChords({{ $song->id }})">{{ $song->title }}</li>
                            @endforeach
                        </ul>
                    @endforeach
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
