CREATE TABLE about_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    type VARCHAR(100)
);

INSERT INTO about_info (title, description, type)
VALUES
('Visi Kami', 'Kami berkomitmen untuk menjadi pusat informasi terkemuka yang mendukung pembelajaran seumur hidup dan menginspirasi komunitas kami untuk mencintai membaca.', 'visi'),
('Misi Kami', 'Menawarkan koleksi buku dan sumber daya yang beragam dan relevan.', 'misi'),
('Layanan Kami', 'Layanan peminjaman buku bagi semua anggota.', 'layanan');