-- Create Database
CREATE DATABASE php_oop_crud DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CREATE USER
CREATE USER 'Kong'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'kong.dev15885'

-- SET PRIVILEGE
GRANT ALL PRIVILEGES ON php_oop_crud.* TO 'Kong'@'localhost';