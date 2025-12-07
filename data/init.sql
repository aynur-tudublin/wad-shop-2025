-- first the MySQL database needs to be created
CREATE DATABASE IF NOT EXISTS wadshop2025;
USE wadshop2025;

-- USERS TABLE
CREATE TABLE IF NOT EXISTS users (
                                     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                     firstname      VARCHAR(50) NOT NULL,
                                     lastname       VARCHAR(50) NOT NULL,
                                     email          VARCHAR(100) NOT NULL UNIQUE,
                                     password_hash  VARCHAR(255) NOT NULL,
                                     age            TINYINT UNSIGNED,
                                     location       VARCHAR(100),
                                     created_at     TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- PRODUCTS TABLE
CREATE TABLE IF NOT EXISTS products (
                                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                        name         VARCHAR(100) NOT NULL,
                                        description  TEXT,
                                        price        DECIMAL(8,2) NOT NULL,
                                        stock        INT UNSIGNED DEFAULT 0,
                                        image_path   VARCHAR(255),
                                        category     VARCHAR(50),
                                        created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
