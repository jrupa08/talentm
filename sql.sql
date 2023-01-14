create database talent
create TABLE users
(
id int PRIMARY key AUTO_INCREMENT,
    name varchar(20),
    email varchar(20),
    mobile bigint,
    password varchar(20)
) 
CREATE TABLE `tbl_upload` (
  `id` int(11) primary key AUTO_INCREMENT,
  `product` varchar(2000) NOT NULL
)
CREATE TABLE contact
(
    name varchar(20),
    email varchar(20),
    subject varchar(20),
    message varchar(20)
)