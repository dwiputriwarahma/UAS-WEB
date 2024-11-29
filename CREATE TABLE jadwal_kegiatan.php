CREATE TABLE jadwal_kegiatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    kegiatan VARCHAR(255) NOT NULL,
    lokasi VARCHAR(255) NOT NULL,
    deskripsi TEXT
);

INSERT INTO jadwal_kegiatan (tanggal, waktu, kegiatan, lokasi, deskripsi)
VALUES
('2024-12-01', '09:00:00', 'Penyuluhan Kesehatan', 'Gedung A', 'Penyuluhan mengenai pola hidup sehat untuk masyarakat setempat.'),
('2024-12-02', '13:00:00', 'Pelatihan Komputer', 'Ruang Pelatihan', 'Pelatihan dasar komputer untuk pemula.'),
('2024-12-03', '10:00:00', 'Seminar Teknologi', 'Hotel XYZ', 'Seminar mengenai tren terbaru di dunia teknologi.');