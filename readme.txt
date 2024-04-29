CREATE TABLE creds (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE location (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(255) NOT NULL,
    mileage DECIMAL(10, 2) NOT NULL,
    total_claimable DECIMAL(10, 2) NOT NULL
);

CREATE TABLE travel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    creds_id INT NOT NULL,
    FOREIGN KEY (creds_id) REFERENCES creds(id)
    location_id INT NOT NULL,
    FOREIGN KEY (location_id) REFERENCES location(id)
);
