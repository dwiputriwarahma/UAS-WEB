<?php
// Koneksi ke database
include 'db.php';

// Cek jika data dikirimkan melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari formulir
    $namaAnggota = $_POST['namaAnggota'];
    $bukuDipinjam = $_POST['bukuDipinjam'];
    $tanggalPeminjaman = date('Y-m-d'); // Tanggal hari ini

    // Query untuk menyimpan peminjaman ke database
    $sql = "INSERT INTO peminjaman (nama_anggota, judul_buku, tanggal_peminjaman)
            VALUES ('$namaAnggota', '$bukuDipinjam', '$tanggalPeminjaman')";

    if ($conn->query($sql) === TRUE) {
        $message = "Buku berhasil dipinjam!";
        $messageType = "success"; // Menandakan bahwa pesan ini sukses
    } else {
        $message = "Terjadi kesalahan: " . $conn->error;
        $messageType = "danger"; // Menandakan bahwa pesan ini error
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku - Smart Library</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .alert {
            font-size: 1.2em;
        }
        .btn-back {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($message)): ?>
                <div class="alert alert-<?= $messageType ?> text-center" role="alert">
                    <?= $message ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body text-center">
                    <h4 class="card-title">Peminjaman Buku</h4>
                    <p class="card-text">Buku yang Anda pilih telah berhasil dipinjam oleh <strong><?= htmlspecialchars($namaAnggota) ?></strong>.</p>
                    <p><strong>Judul Buku:</strong> <?= htmlspecialchars($bukuDipinjam) ?></p>
                    <p><strong>Tanggal Peminjaman:</strong> <?= $tanggalPeminjaman ?></p>

                    <a href="membership.php" class="btn btn-primary btn-back mt-3">Lihat Daftar Peminjaman</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
