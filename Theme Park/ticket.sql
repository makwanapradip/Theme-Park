
CREATE TABLE ticket_bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    mobile VARCHAR(15) NOT NULL,
    adult_tickets INT NOT NULL,
    adult_offer VARCHAR(50) NOT NULL,
    child_tickets INT NOT NULL,
    child_offer VARCHAR(50) NOT NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
