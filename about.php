<?php
// Include file untuk koneksi database
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Center - Tentang Kami</title>
    <!-- Bootstrap CSS -->
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

        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        /* Teks rata tengah untuk Visi Kami */
        .card-visi .card-text {
            text-align: center;
        }

        /* Teks rata kiri untuk Misi dan Layanan */
        .card-misi .card-text,
        .card-layanan .card-text {
            text-align: left;
        }

        /* Garis horizontal antara teks */
        .card-misi .card-text + .card-text,
        .card-layanan .card-text + .card-text {
            border-top: 1px solid #ddd;
            margin-top: 10px;
            padding-top: 10px;
        }

        /* Kustomisasi judul untuk bold */
        .card-title {
            font-weight: bold;
        }

        footer {
            margin-top: 50px;
            background-color: #343a40;
        }

        footer p {
            margin: 0;
            padding: 15px;
        }
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
                <li class="nav-item"><a class="nav-link" href="member.php"><b>Member</b></a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php"><b>Contact</b></a></li>
            </ul>
        </div>
    </nav>

    <!-- Tentang Kami -->
    <div class="container"><br>
        <h2 class="text-center"><b>TENTANG KAMI</b></h2>
        <p class="lead text-center">Library Center adalah perpustakaan modern yang menyediakan berbagai koleksi buku dan layanan untuk mendukung kebutuhan informasi dan pendidikan masyarakat.</p>

        <div class="row mt-4">
            <?php
            // Query untuk menampilkan data berdasarkan tipe
            $types = ['visi', 'misi', 'layanan'];

            foreach ($types as $type) {
                // Tentukan kelas CSS berdasarkan tipe
                $css_class = '';
                if ($type === 'visi') {
                    $css_class = 'card-visi';
                } elseif ($type === 'misi') {
                    $css_class = 'card-misi';
                } elseif ($type === 'layanan') {
                    $css_class = 'card-layanan';
                }

                $sql = "SELECT * FROM about_info WHERE type='$type'";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    echo "<div class='col-md-4 mb-4'>
                            <div class='card text-center $css_class'>
                                <div class='card-body'>
                                    <h5 class='card-title'>" . ucfirst($type) . " Kami</h5>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<p class='card-text'>{$row['description']}</p>";
                    }
                    echo "  </div>
                          </div>
                         </div>";
                }
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white text-center py-3">
        <p>© 2024 Smart Library. All Rights Reserved.</p>
    </footer>
</body>

</html>
