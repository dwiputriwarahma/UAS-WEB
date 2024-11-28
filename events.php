<?php
// Koneksi ke database
include 'db.php';  // Koneksi ke database

// Ambil data dari tabel jadwal_kegiatan
$sql = "SELECT * FROM jadwal_kegiatan";
$result = $conn->query($sql);

// Simpan data ke dalam array untuk ditampilkan di tabel
$jadwalKegiatan = [];

if ($result->num_rows > 0) {
    // Ambil data dari setiap baris
    while($row = $result->fetch_assoc()) {
        $jadwalKegiatan[] = [
            'tanggal' => $row['tanggal'],
            'waktu' => $row['waktu'],
            'kegiatan' => $row['kegiatan'],
            'lokasi' => $row['lokasi'],
            'deskripsi' => $row['deskripsi']
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
    <title>Library Center - Jadwal Kegiatan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <STYLE>
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

    </STYLE>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">
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
        <h2><center><b>Jadwal Kegiatan Perpustakaan</b></center></h2>
        <div class="bg-white p-4 rounded shadow mt-4">
            <table class="table table-bordered">
                <thead>
                <tr>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Kegiatan</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                    </tr>
                    </thead>
                <?php foreach ($jadwalKegiatan as $kegiatan): ?>
                        <tr>
                            <td><?php echo $kegiatan['tanggal']; ?></td>
                            <td><?php echo $kegiatan['waktu']; ?></td>
                            <td><?php echo $kegiatan['kegiatan']; ?></td>
                            <td><?php echo $kegiatan['lokasi']; ?></td>
                            <td><?php echo $kegiatan['deskripsi']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
                
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>© 2024 Library Center. All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
