CREATE DATABASE album;

USE album;

CREATE TABLE `user` (
  id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  fullname VARCHAR(255) NOT NULL,
  date_of_birth DATE NOT NULL,
  image VARCHAR(255) NOT NULL,
  regno VARCHAR(255) NOT NULL,
  phone VARCHAR(255) NOT NULL,
  gender ENUM('Male', 'Female') NOT NULL,
  nickname VARCHAR(255) NOT NULL,
  department VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  status ENUM('Single', 'Married', 'Divorce', 'Prefer not to say') NOT NULL,
  is_active BOOLEAN DEFAULT 1 NOT NULL,  
  UNIQUE(regno, phone, email)
);

CREATE TABLE `admin` (
  id INT(11)NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  UNIQUE (username)
);

CREATE TABLE `message` (
  id INT(11)NOT NULL AUTO_INCREMENT PRIMARY KEY,
  message VARCHAR(255) NOT NULL,
  date_announce DATETIME NOT NULL
);
