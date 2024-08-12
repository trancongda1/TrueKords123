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
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        /* Container styles */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header styles */
        header {
            background-color: #4A4A4A;
            padding: 20px;
            color: white;
        }

        /* Rating styles */
        .rating {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .rating input[type="radio"] {
            display: none;
        }

        .rating label {
            font-size: 24px;
            cursor: pointer;
        }

        .rating input[type="radio"]:checked ~ label {
            color: gold;
        }

        /* Header styles */
        header {
            background-color: #4A4A4A;
            padding: 20px;
            color: white;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        header p {
            margin: 5px 0;
            font-size: 18px;
        }

        /* Button for going back to the main page */
        .back-button {
            margin-top: 20px;
            display: inline-block;
            background-color: #D148F0;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #8E2DE2;
        }

        /* Chord list styles */
        .scroll-container {
            max-height: 500px; /* Height of the scrollable area */
            overflow-y: auto;
            background: #6A11CB;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .chords-list h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .chord-item {
            margin-bottom: 15px;
            padding: 10px;
            border-left: 4px solid #D148F0;
            background: #8E2DE2;
            border-radius: 4px;
        }

        .chord-item h4 {
            margin: 0;
            font-size: 20px;
            color: #fff;
        }

        .chord-item p {
            margin: 10px 0 0;
            color: #ddd;
        }

        .chord-item img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 4px;
        }

        /* Chord style */
        .chord {
            color: #FF0000;
            /* Red color for chords */
            font-weight: bold;
        }

        /* Chord settings bar */
        .chord-settings {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: #4A4A4A;
            padding: 10px;
            border-radius: 8px;
            color: #fff;
        }

        .chord-settings div {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chord-settings select,
        .chord-settings input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: #000;
        }

        .chord-settings button {
            background-color: #D148F0;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .chord-settings button:hover {
            background-color: #8E2DE2;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 700px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const chordElements = document.querySelectorAll(".chords-list p");

            // Apply red color to chords within square brackets
            chordElements.forEach(function (paragraph) {
                paragraph.innerHTML = paragraph.innerHTML.replace(/\[(.*?)\]/g, '<span class="chord">[$1]</span>');
            });

            // Font size functionality
            const fontSizeInput = document.getElementById('font-size');
            const chordsList = document.querySelector('.scroll-container');

            fontSizeInput.addEventListener('input', function () {
                const newSize = fontSizeInput.value + 'px';
                chordsList.style.fontSize = newSize;
            });

            // Modal functionality
            var modal = document.getElementById("myModal");
            var btn = document.getElementById("viewSheetMusic");
            var span = document.getElementsByClassName("close")[0];

            btn.onclick = function () {
                modal.style.display = "block";
            }

            span.onclick = function () {
                modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            // Auto-scroll functionality
            let scrollInterval;
            const scrollContainer = document.querySelector('.scroll-container');
            const speedSelect = document.getElementById('scroll-speed');

            function startAutoScroll(scrollSpeed) {
                clearInterval(scrollInterval); // Clear previous interval if any
                scrollInterval = setInterval(function () {
                    if (scrollContainer.scrollTop + scrollContainer.clientHeight >= scrollContainer.scrollHeight) {
                        scrollContainer.scrollTop = 0; // Reset to top when reaching the bottom
                    } else {
                        scrollContainer.scrollTop += 1; // Scroll step
                    }
                }, scrollSpeed);
            }

            speedSelect.addEventListener('change', function () {
                let speed = parseInt(speedSelect.value, 10);
                startAutoScroll(speed);
            });

            // Initialize with default speed (Normal)
            startAutoScroll(parseInt(speedSelect.value, 10));
        });
    </script>
</head>

<body id="page1">
    <div class="container">
        <header>
            <h1>{{ $song->title }}</h1>
            <p>Tác giả: {{ $song->artist }}</p>
        </header>
        @if (session('message'))
        <script>
            alert("{{ session('message') }}");
        </script>
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
                <select id="scroll-speed">
                    <option value="100">Chậm</option>
                    <option value="50" selected>Bình thường</option>
                    <option value="25">Nhanh</option>
                </select>
            </div>
            <div>
                <button id="toggle-columns">Toggle Columns</button>
            </div>
            <div>
                <button id="viewSheetMusic">Xem Tông Phổ</button>
            </div>
        </div>

        <div class="scroll-container">
            <div class="chords-list">
                <h2>Danh sách hợp âm:</h2>
                @foreach($chords as $chord)
                <div class="chord-item">
                    <h4>{{ $chord->name }}</h4>
                    <p>{!! nl2br(e($chord->content)) !!}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <footer class="container">
        <div class="footerlink">
            <p>© {{ date('Y') }} MAI MUSIC CHÀO MỪNG BẠN .</p>
        </div>
    </footer>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            @if ($chord->img)
            <img src="{{ asset($chord->img) }}" alt="{{ $chord->name }}" style="max-width: 600px;">
            @else
            <p>No image available.</p>
            @endif
        </div>
    </div>
</body>

</html>
