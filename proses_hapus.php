<?php
// Koneksi ke database
include 'db.php';

// Cek jika ada id yang diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data peminjaman berdasarkan ID
    $sql = "DELETE FROM peminjaman WHERE id = $id";

    // Mengeksekusi query untuk menghapus data
    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, tampilkan pesan sukses
        $message = "Data peminjaman berhasil dihapus!";
        $messageType = "success"; // Menandakan bahwa penghapusan berhasil
    } else {
        // Jika terjadi kesalahan saat menghapus, tampilkan pesan error
        $message = "Error: " . $conn->error;
        $messageType = "danger"; // Menandakan bahwa penghapusan gagal
    }

    // Menutup koneksi database
    $conn->close();

    // Arahkan kembali ke halaman membership.php dengan membawa pesan
    header("Location: membership.php?message=$message&type=$messageType");
    exit();
}
?>
