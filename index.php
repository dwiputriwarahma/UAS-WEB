<?php
// Koneksi ke database
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Center - Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body {
            font-family: 'Arial', sans-serif;
            color: #100d0d;
            background-image: url('ini.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .navbar {
            width: 100%;
            padding: 10px 20px;
        }
        .nav-item {
    border-bottom: none; /* Menghilangkan border bawah pada item navbar */
}
        
        .welcome-message { font-size: 48px; margin-top: 40px; opacity: 0; animation: fadeIn 2s forwards; }
        .features-section {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            margin: 20px auto;
            border-radius: 10px;
            width: 80%;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            opacity: 0;
            animation: slideIn 1.5s forwards;
            animation-delay: 0.5s;
        }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideIn { from { transform: translateY(30px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .btn-primary { border-radius: 25px; transition: background-color 0.3s; }
        .btn-primary:hover { background-color: #0056b3; }
        ul { text-align: left; }
        li { padding: 10px 0; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="real.png" alt="Library Logo" width="50"> <b>SMART LIBRARY</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php"><b>Home</b></a></li>
                <li class="nav-item"><a class="nav-link" href="about.php"><b>About</b></a></li>
                <li class="nav-item"><a class="nav-link" href="books.php"><b>Books</b></a></li>
                <li class="nav-item"><a class="nav-link" href="events.php"><b>Events</b></a></li>
                <li class="nav-item"><a class="nav-link" href="membership.php"><b>Member</b></a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php"><b>Contact</b></a></li>
            </ul>
        </div>
    </nav>

    <!-- Container Selamat Datang -->
    <div class="container text-center mt-5">
        <h1 class="display-4 welcome-message">WELCOME TO THE SMART LIBRARY</h1>
        <p class="lead">Kami menawarkan koleksi buku terlengkap dan layanan perpustakaan modern untuk mendukung kebutuhan informasi dan pendidikan Anda.</p>
        <a href="books.php" class="btn btn-primary btn-lg">Jelajahi Koleksi Kami</a>
    </div>

    <!-- Keunggulan Perpustakaan -->
    <div class="features-section">
        <h4>Keunggulan Perpustakaan</h4>
        <ul class="list-unstyled">
            <li><strong>Koleksi Lengkap:</strong> Buku, jurnal, dan materi digital yang beragam untuk semua usia.</li>
            <li><strong>Ruang Belajar Modern:</strong> Ruang yang nyaman dan dilengkapi teknologi terkini.</li>
            <li><strong>Program Edukasi:</strong> Kegiatan dan workshop yang dirancang untuk meningkatkan keterampilan dan pengetahuan.</li>
            <li><strong>Akses 24/7:</strong> Nikmati layanan perpustakaan kapan saja melalui portal online kami.</li>
        </ul>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2024 Library Center. All Rights Reserved.</p>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(() => {
                alert("Selamat datang di Perpustakaan Cerdas!");
            }, 1000);
        });
    </script>
</body>
</html>
