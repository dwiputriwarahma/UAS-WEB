CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO contact (nama, email, message)
VALUES
('John Doe', 'john.doe@example.com', 'I would like to know more about your services.'),
('Jane Smith', 'jane.smith@example.com', 'Can you provide more details on the pricing?'),
('Alice Johnson', 'alice.johnson@example.com', 'I am interested in scheduling a meeting.');