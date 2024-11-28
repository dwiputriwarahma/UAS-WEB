<?php
$host = "localhost"; // Server database
$user = "root";      // Username MySQL
$password = "";      // Password MySQL
$db_name = "librarycenter1"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $db_name);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
