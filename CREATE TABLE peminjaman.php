CREATE TABLE peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_anggota VARCHAR(255) NOT NULL,
    judul_buku VARCHAR(255) NOT NULL,
    tanggal_peminjaman DATE NOT NULL
);

INSERT INTO peminjaman (nama_anggota, judul_buku, tanggal_peminjaman)
VALUES
('John Doe', 'The Great Gatsby', '2024-12-01'),
('Jane Smith', '1984', '2024-12-02'),
('Alice Johnson', 'To Kill a Mockingbird', '2024-12-03');