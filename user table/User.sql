create table  if not exists users (

id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
name VARCHAR(100),
email VARCHAR(50),
password VARCHAR,
image VARCHAR,
role_id int

);


create table  if not exists role_id (
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
name VARCHAR(100),
);

    


