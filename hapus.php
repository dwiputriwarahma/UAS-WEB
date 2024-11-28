<?php
// Koneksi ke database
include 'db.php';

// Cek jika ada id yang diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data peminjaman berdasarkan ID
    $sql = "DELETE FROM peminjaman WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus!";
        echo '<a href="membership.php" class="btn btn-primary">Lihat Daftar Peminjaman</a>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
