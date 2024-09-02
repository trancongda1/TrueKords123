<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $song->title }} - Chords</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/cufon-replace.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/chords.css') }}">

    <style>
        .multi-column {
            column-count: 2;
            column-gap: 20px;
        }

        .chord-item p {
            white-space: pre-wrap;
        }
    </style>
</head>

<body id="page1">
    <div class="container">
        <header>
            <h1>{{ $song->title }}</h1>
            <p>Tác giả: {{ $song->artist }}</p>
        </header>

        @if (session('message'))
        <div class="success-message" id="successMessage">
            Đánh giá thành công
        </div>
        @endif

        <form action="{{ route('ratings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="song_id" value="{{ $song->id }}">
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5" />
                <label for="star5" title="5 stars">&#9733;</label>
                <input type="radio" id="star4" name="rating" value="4" />
                <label for="star4" title="4 stars">&#9733;</label>
                <input type="radio" id="star3" name="rating" value="3" />
                <label for="star3" title="3 stars">&#9733;</label>
                <input type="radio" id="star2" name="rating" value="2" />
                <label for="star2" title="2 stars">&#9733;</label>
                <input type="radio" id="star1" name="rating" value="1" />
                <label for="star1" title="1 star">&#9733;</label>
            </div>
            <button type="submit">Submit Rating</button>
        </form>

        <!-- Back to Main Page Button -->
        <a href="/" class="back-button">Trở về trang chính</a>

        <div class="chord-settings">
            <div>
                <label for="font-size">Font size: </label>
                <input type="number" id="font-size" value="15">
            </div>
            <div>
                <label for="scroll-speed">Tốc độ cuộn:</label>
                <div>
                    <div>
                        <label for="scroll-speed">Tốc độ cuộn:</label>
                        <select id="scroll-speed">
                            <option value="100">Chậm</option>
                            <option value="50" selected>Bình thường</option>
                            <option value="25">Nhanh</option>
                        </select>
                        <button id="pauseScroll">Tạm dừng</button>
                    </div>
                </div>
            </div>
            <div>
                <button id="toggle-columns">Toggle Columns</button>
            </div>
            <div>
                <button id="viewSheetMusic">Xem Tông Phổ</button>
            </div>
            <div>
                <button id="toggleFullScreen">Full màn hình</button>
            </div>
        </div>

        <div class="scroll-container">
            <div class="chords-list">
                <h2>Hợp âm:</h2>
                <div class="chord-grid">
                    @foreach($chords as $chord)
                    <div class="chord-item">
                        <h4>{{ $chord->name }}</h4>
                        <p>{!! nl2br(e($chord->content)) !!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <footer class="container">
        <div class="footerlink">
            <p>© {{ date('Y') }} MAI MUSIC CHÀO MỪNG BẠN.</p>
        </div>
    </footer>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            @if ($chord->img)
            <img src="{{ asset($chord->img) }}" alt="{{ $chord->name }}">
            @else
            <p>No image available.</p>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Hide success message after 3 seconds
            setTimeout(function() {
                var successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 3000);

            // Apply red color to chords within square brackets
            const chordElements = document.querySelectorAll(".chords-list p");
            chordElements.forEach(function(paragraph) {
                paragraph.innerHTML = paragraph.innerHTML.replace(/\[(.*?)\]/g, '<span class="chord">[$1]</span>');
            });

            // Font size functionality
            const fontSizeInput = document.getElementById('font-size');
            const chordsList = document.querySelector('.scroll-container');
            fontSizeInput.addEventListener('input', function() {
                const newSize = fontSizeInput.value + 'px';
                chordsList.style.fontSize = newSize;
            });

            // Modal functionality
            var modal = document.getElementById("myModal");
            var btn = document.getElementById("viewSheetMusic");
            var span = document.getElementsByClassName("close")[0];

            btn.onclick = function() {
                modal.style.display = "block";
                const modalImg = modal.querySelector('img');
                if (modalImg) {
                    modalImg.style.width = '100%';
                    modalImg.style.height = '100%';
                    modalImg.style.objectFit = 'cover'; // Ensures the image covers the entire screen
                }
            };

            span.onclick = function() {
                modal.style.display = "none";
            };

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };

            // Auto-scroll functionality
            let scrollInterval;
            let isScrolling = true; // To track if auto-scrolling is active
            const scrollContainer = document.querySelector('.scroll-container');
            const speedSelect = document.getElementById('scroll-speed');
            const pauseButton = document.getElementById('pauseScroll');

            function startAutoScroll(scrollSpeed) {
                clearInterval(scrollInterval); // Clear previous interval if any
                scrollInterval = setInterval(function() {
                    if (scrollContainer.scrollTop + scrollContainer.clientHeight >= scrollContainer.scrollHeight) {
                        scrollContainer.scrollTop = 0;
                    } else {
                        scrollContainer.scrollTop += 1;
                    }
                }, scrollSpeed);
            }

            speedSelect.addEventListener('change', function() {
                if (isScrolling) {
                    let speed = parseInt(speedSelect.value, 10);
                    startAutoScroll(speed);
                }
            });

            pauseButton.addEventListener('click', function() {
                if (isScrolling) {
                    clearInterval(scrollInterval);
                    pauseButton.textContent = 'Tiếp tục';
                } else {
                    let speed = parseInt(speedSelect.value, 10);
                    startAutoScroll(speed);
                    pauseButton.textContent = 'Tạm dừng';
                }
                isScrolling = !isScrolling;
            });

            startAutoScroll(parseInt(speedSelect.value, 10));

            // Toggle column layout
            const toggleButton = document.getElementById("toggle-columns");
            toggleButton.addEventListener("click", function() {
                const chordItems = document.querySelectorAll('.chord-item p');

                chordItems.forEach(function(paragraph) {
                    // If the paragraph is already split, revert to single column

                    if (paragraph.classList.contains('multi-column')) {
                        paragraph.innerHTML = paragraph.getAttribute('data-original-content');
                        paragraph.classList.remove('multi-column');
                    } else {
                        const content = paragraph.innerHTML;
                        const lines = content.split('<br>');
                        const half = Math.ceil(lines.length / 0);
                        const leftColumn = lines.slice(0, half).join('<br>');
                        const rightColumn = lines.slice(half).join('<br>');

                        // Store the original content
                        paragraph.setAttribute('data-original-content', content);

                        // Create two-column content
                        const newContent = `
                            <div style="width: 45%; float: left;">${leftColumn}</div>
                            <div style="width: 45%; float: left;">${rightColumn}</div>
                            <div style="clear: both;"></div>
                        `;

                        paragraph.innerHTML = newContent;
                        paragraph.classList.add('multi-column');
                    }
                });
            });

            // Fullscreen functionality
            const fullScreenButton = document.getElementById("toggleFullScreen");
            const header = document.querySelector("header");

            fullScreenButton.addEventListener("click", function() {
                if (!document.fullscreenElement) {
                    document.documentElement.requestFullscreen();
                    header.style.display = "none"; // Ẩn header khi vào chế độ toàn màn hình
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                        header.style.display = "block"; // Hiển thị lại header khi thoát chế độ toàn màn hình
                    }
                }
            });
        });
    </script>
</body>

</html>