<?php
// Mengambil data dari database
include 'db.php';

$sql = "SELECT * FROM peminjaman"; // Query untuk mengambil semua data peminjaman
$result = $conn->query($sql);

$peminjamanBuku = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $peminjamanBuku[] = [
            'id' => $row['id'],
            'namaAnggota' => $row['nama_anggota'],
            'bukuDipinjam' => $row['judul_buku'],
            'tanggalPeminjaman' => $row['tanggal_peminjaman'],
        ];
    }
} else {
    echo "0 results";
}
$conn->close();
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
        display: flex;
        flex-direction: column;
        margin: 0;
        padding: 0;
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

    <div class="container mt-5">
        <h2 class="text-center">DAFTAR PEMINJAMAN</h2>

        <?php
        // Menampilkan pesan sukses atau error jika ada
        if (isset($_GET['message']) && isset($_GET['type'])) {
            $message = $_GET['message'];
            $type = $_GET['type'];
            echo "<div class='alert alert-$type text-center' role='alert'>$message</div>";
        }
        ?>

        <div class="bg-white p-4 rounded shadow">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                $no = 1;  // Inisialisasi nomor urut
                foreach ($peminjamanBuku as $peminjaman): ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                        <td><?php echo $peminjaman['namaAnggota']; ?></td>
                        <td><?php echo $peminjaman['bukuDipinjam']; ?></td>
                        <td><?php echo $peminjaman['tanggalPeminjaman']; ?></td>
                        <td><a href="edit.php?id=<?php echo $peminjaman['id']; ?>" class="btn btn-warning btn-sm">Edit</a></td>
                        <td><a href="konfirmasi_hapus.php?id=<?php echo $peminjaman['id']; ?>" class="btn btn-danger btn-sm">Hapus</a></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
