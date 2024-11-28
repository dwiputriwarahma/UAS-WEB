<?php
// Include file untuk koneksi database
include 'db.php';

// Validasi koneksi
if (!isset($conn) || $conn->connect_error) {
    die("<div class='alert alert-danger'>Koneksi database gagal. Silakan periksa file db.php.</div>");
}

// Proses data formulir jika dikirim
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input untuk mencegah SQL injection
    $name = $conn->real_escape_string(trim($_POST['nama']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $pesan = $conn->real_escape_string(trim($_POST['pesan']));

    // Query untuk menyimpan data
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        $message = "<div class='alert alert-success'>Pesan Anda berhasil dikirim!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Terjadi kesalahan saat menyimpan pesan: " . $conn->error . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #100d0d;
            background-image: url('ini.jpg'); /* Ganti dengan path gambar yang benar */
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            color: #000204;
            margin-bottom: 20px;
        }
        .contact-info {
            background: white;
            padding: 10px;
            border-radius: 10px;
            max-width: 800px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            
            margin: 0 auto;
        }
        
        .contact-form {
            background: white;
            padding: 50px;
            border-radius: 10px;
            margin: 0 auto;
        }
        .form-control {
            border: 2px solid #007bff;
            max-width: 200%;
        }
        
        .btn-custom {
            background-color: #2c8994;
            color: white;
        }
        .btn-custom:hover {
            background-color: #87b6f2;
        }
        .form-group label {
            font-weight: bold;
            width: 400px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="real.png" alt="Library Logo" width="50"> <b>SMART LIBRARY</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
     <!-- Konten Hubungi Kami -->
     <div class="container text-center mt-5">
        <h1>HUBUNGI KAMI!</h1>
        <p>Kalau ada pertanyaan atau butuh informasi lebih lanjut, jangan ragu untuk menghubungi kami! Tim kami siap membantu semua pertanyaan kamu.</p>
    </div>
    <!-- Informasi Kontak -->
    <div class="container">
        <div class="contact-info">
            <h3 class="text-center"><b>Informasi Kontak</b></h3>
            <p><strong>Alamat:</strong> Jl. Perpustakaan No. 1, Makassar, Indonesia</p>
            <p><strong>Telepon:</strong> +62 123 4567 890</p>
            <p><strong>Email:</strong> <a href="mailto:warahmadwiputri@gmail.com">warahmadwiputri@gmail.com</a></p>
        </div>
    </div><br>

    <!-- Formulir Kontak -->
    <div class="contact-form">
        <h3 class="text-center"><b>Tinggalkan Pesan Anda</b></h3>
        <?= $message; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>
            <div class="form-group">
                <label for="pesan">Pesan:</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="4" placeholder="Tulis pesan Anda" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Kirim Pesan</button>
        </form>
        <p class="text-center mt-3">
            <a href="daftar_pesan.php" class="btn btn-info">Lihat Daftar Pesan</a>
        </p>
    </div>
</body>
</html>
