CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255), 
    rating INT(11) NOT NULL CHECK (rating BETWEEN 1 AND 5)
);

INSERT INTO books (title, image, rating)
VALUES
('DILAN', 'DILAN 1.jpg', NULL),
('PULANG PERGI', 'PULANGPERGI2.jpg', NULL),
('NIMONA', 'NIMONA3.jpg', NULL),
('SOEKARNO', 'SOEKARNO4.jpg', NULL);