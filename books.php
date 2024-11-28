<?php
// Koneksi ke database
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Center - Koleksi Buku</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #bcc0c4;
        }

        .navbar {
            margin-bottom: 30px;
        }

        .card {
            border: 1px solid #2b2bc6;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .card-body {
            text-align: center;
        }

        .card-title {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 0.9em;
            color: #555;
        }

        .btn-primary {
            background-color: #010a13;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .container {
            padding: 20px;
            background-color: rgb(255, 255, 255);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
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
                <li class="nav-item"><a class="nav-link" href="membership.php"><b>Member</b></a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php"><b>Contact</b></a></li>
            </ul>
        </div>
    </nav>

    <!-- Koleksi Buku -->
    <div class="container mt-5">
        <h2 class="text-center"><b>Koleksi Buku</b></h2>
        <div class="row">
            <?php
            // Query untuk mendapatkan data buku dari database
            $sql = "SELECT * FROM books";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-12 col-md-6 col-lg-3">';
                    echo '<div class="card mb-4">';
                    echo '<img src="images/' . $row['image'] . '" class="card-img-top" alt="' . $row['title'] . '">';
                    echo '<div class="card-body text-center">';
                    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                    echo '<p class="card-text">';
                    // Menampilkan rating
                    for ($i = 0; $i < 5; $i++) {
                        echo $i < $row['rating'] ? '<span class="text-warning">&#9733;</span>' : '<span class="text-muted">&#9734;</span>';
                    }
                    echo '</p>';
                    echo '<button class="btn btn-primary" onclick="pinjamBuku(\'' . $row['title'] . '\')">Pinjam Buku</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p class='text-center'>Tidak ada buku tersedia saat ini.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white text-center py-3">
        <p>© 2024 Smart Library. All Rights Reserved.</p>
    </footer>

    <script>
    function pinjamBuku(namaBuku) {
        // Menampilkan prompt untuk memasukkan nama anggota
        const namaAnggota = prompt("Masukkan nama Anda untuk meminjam buku:");

        if (namaAnggota) {
            // Mengirim data peminjaman ke pinjam.php untuk disimpan ke database
            const form = document.createElement("form");
            form.method = "POST";
            form.action = "pinjam.php";
            
            // Menambahkan input hidden untuk buku dan nama anggota
            const inputBuku = document.createElement("input");
            inputBuku.type = "hidden";
            inputBuku.name = "bukuDipinjam";
            inputBuku.value = namaBuku;
            form.appendChild(inputBuku);
            
            const inputNama = document.createElement("input");
            inputNama.type = "hidden";
            inputNama.name = "namaAnggota";
            inputNama.value = namaAnggota;
            form.appendChild(inputNama);
            
            // Menambahkan form ke body dan mengirimkan data
            document.body.appendChild(form);
            form.submit();
            
            // Menampilkan alert bahwa peminjaman berhasil
            alert(`Buku "${namaBuku}" berhasil dipinjam!`);
        } else {
            alert("Nama anggota tidak dapat kosong.");
        }
    }
    </script>

</body>
</html>
