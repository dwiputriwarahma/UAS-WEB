<?php
// Include file koneksi database
include 'db.php';

// Validasi koneksi
if (!isset($conn) || $conn->connect_error) {
    die("<div class='alert alert-danger'>Koneksi database gagal. Silakan periksa file db.php.</div>");
}

// Ambil data dari tabel contacts
$sql = "SELECT id, name, email, message, submitted_at FROM contacts ORDER BY submitted_at DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Pesan Masuk</h1>
        <p class="text-center">Berikut adalah daftar semua pesan yang telah dikirim oleh pengunjung.</p>
        <?php if ($result && $result->num_rows > 0): ?>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>  <!-- Kolom No -->
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Tanggal Dikirim</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1; // Inisialisasi nomor urut
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $no++; ?></td>  <!-- Menampilkan nomor urut -->
                            <td><?= htmlspecialchars($row['name']); ?></td>
                            <td><?= htmlspecialchars($row['email']); ?></td>
                            <td><?= nl2br(htmlspecialchars($row['message'])); ?></td>
                            <td><?= htmlspecialchars($row['submitted_at']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">Tidak ada pesan yang ditemukan.</div>
        <?php endif; ?>
    </div>
</body>
</html>
