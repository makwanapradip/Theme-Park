CREATE TABLE offers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    discount DECIMAL(5, 2) NOT NULL
);
INSERT INTO offers (title, description, discount) VALUES
('Family Fun Package', 'Enjoy a day of fun with the whole family!', 10.00),
('Student Discount', 'Special discount for students upon presentation of valid ID.', 15.00),
('Early Bird Special', 'Book your tickets in advance and save 20%!', 20.00);
