CREATE DATABASE usersinfo;
CREATE TABLE users(
uid int AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) not null,
    username varchar(100) UNIQUE,
    email varchar(100) UNIQUE,
    password varchar(100),
    user_type ENUM('admin','user'),
    status boolean DEFAULT 0,
    image varchar(100)


)