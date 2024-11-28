<?php
// Koneksi ke database
include 'db.php';

// Cek jika ada id yang diterima dari URL
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
}

// Proses update data jika ada form yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaAnggota = $_POST['namaAnggota'];
    $bukuDipinjam = $_POST['bukuDipinjam'];
    $tanggalPeminjaman = $_POST['tanggalPeminjaman'];

    // Query untuk mengupdate data peminjaman
    $sql = "UPDATE peminjaman SET nama_anggota = '$namaAnggota', judul_buku = '$bukuDipinjam', tanggal_peminjaman = '$tanggalPeminjaman' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate!";
        echo '<a href="membership.php" class="btn btn-primary">Lihat Daftar Peminjaman</a>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>
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
        </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Peminjaman Buku</h2>
        <div class="bg-white p-4 rounded shadow">
            <form method="POST">
                <div class="form-group">
                    <label for="namaAnggota">Nama Anggota:</label>
                    <input type="text" class="form-control" id="namaAnggota" name="namaAnggota" value="<?php echo $row['nama_anggota']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="bukuDipinjam">Judul Buku:</label>
                    <input type="text" class="form-control" id="bukuDipinjam" name="bukuDipinjam" value="<?php echo $row['judul_buku']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="tanggalPeminjaman">Tanggal Peminjaman:</label>
                    <input type="date" class="form-control" id="tanggalPeminjaman" name="tanggalPeminjaman" value="<?php echo $row['tanggal_peminjaman']; ?>" required>
                </div>
                <button type="submit" class="btn btn-success">Update Peminjaman</button>
                
                <a href="membership.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
