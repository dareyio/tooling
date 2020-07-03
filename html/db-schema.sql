CREATE DATABASE IF NOT EXISTS multi_login;

USE multi_login ;

CREATE TABLE users(
		id INT NOT  NULL PRIMARY KEY AUTO_INCREMENT,
		username VARCHAR(255) NOT NULL,
		email VARCHAR(255) NOT NULL,
		password VARCHAR(255) NOT NULL,
		user_type VARCHAR (255) NOT NULL
);

INSERT INTO users (username, password,  email, user_type) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'admin');