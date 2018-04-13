CREATE DATABASE sitebooking;

use sitebooking;

CREATE TABLE books (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(30) NOT NULL,
	date DATE NOT NULL,
	description MEDIUMTEXT NOT NULL,
	image VARCHAR(50)
);