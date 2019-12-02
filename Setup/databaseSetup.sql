DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS account_owner;
CREATE TABLE account_owner (
owner_id INT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
first_name VARCHAR(45),
last_name VARCHAR(45),
city VARCHAR(45),
zip_code VARCHAR(45),
streetname VARCHAR(45),
house_number INT,

PRIMARY KEY (owner_id),
FOREIGN KEY (user_id) REFERENCES users(id)
);
