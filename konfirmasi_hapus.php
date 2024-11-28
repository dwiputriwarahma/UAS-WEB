<?php
// Koneksi ke database
include 'db.php';

// Cek jika ada ID yang diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data peminjaman berdasarkan ID
    $sql = "SELECT * FROM peminjaman WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak diterima!";
    exit;
}

// Proses hapus jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Query untuk menghapus data peminjaman
    $sql = "DELETE FROM peminjaman WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, arahkan kembali ke daftar peminjaman dengan pesan sukses
        header("Location: membership.php?message=Data berhasil dihapus!&type=success");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus</title>
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
        .container {
            max-width: 600px; /* Membatasi lebar container */
            margin: 0 auto;  /* Menjaga agar form tetap di tengah */
            padding-top: 50px;
        }
        .btn {
            width: 100%;
        }
        .btn-secondary {
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Konfirmasi Penghapusan Peminjaman</h2>
        <div class="bg-white p-4 rounded shadow">
            <p>Anda yakin ingin menghapus peminjaman berikut?</p>
            <table class="table table-bordered">
                <tr>
                    <th>Nama Anggota</th>
                    <td><?php echo htmlspecialchars($row['nama_anggota']); ?></td>
                </tr>
                <tr>
                    <th>Judul Buku</th>
                    <td><?php echo htmlspecialchars($row['judul_buku']); ?></td>
                </tr>
                <tr>
                    <th>Tanggal Peminjaman</th>
                    <td><?php echo htmlspecialchars($row['tanggal_peminjaman']); ?></td>
                </tr>
            </table>

            <form method="POST">
                <button type="submit" class="btn btn-danger">Hapus</button>
                <a href="membership.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
