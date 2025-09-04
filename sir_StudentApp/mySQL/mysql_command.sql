mysql -u root -p


show databases;
create database IF NOT EXISTS batch66;
show tables;
describe students;



create table IF NOT EXISTS Students(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    result VARCHAR(50)
);


drop table students;
drop database batch66;



-- show data from table

select id, name, result from students;
select * from students;




select * from students where id=1;


insert into students (name,result) value("nadim","A+"),("nahid","A"),("nupu","A-"),("nisha","B");


update students set result="B" where id="1";


delete students --whole table will be deleted
delete from students where id="1"; -- specified row will be deleted



--------
insert into students (name,result) value("Saima","F");

-------- row

--alter table
alter table students add batch VARCHAR(100);

--drop column
alter table students drop column batch;

--rename column
alter table students change result grade VARCHAR(50);
alter table students rename column result to grade;  -- for mysql 8+

--rename table
alter table students rename to Trainees;

--drop/delete
drop table if EXISTS students;
drop database if EXISTS batch66;





update students set batch="d" where id="5";














-- 
-- 
-- 
-- Microsoft Windows [Version 10.0.19045.6216]
-- (c) Microsoft Corporation. All rights reserved.

-- E:\xampp\mysql\bin>mysql -u root -p
-- Enter password:
-- Welcome to the MariaDB monitor.  Commands end with ; or \g.
-- Your MariaDB connection id is 8
-- Server version: 10.4.32-MariaDB mariadb.org binary distribution

-- Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

-- Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

-- MariaDB [(none)]> show databases;
-- +--------------------+
-- | Database           |
-- +--------------------+
-- | information_schema |
-- | mysql              |
-- | performance_schema |
-- | phpmyadmin         |
-- | test               |
-- +--------------------+
-- 5 rows in set (0.023 sec)

-- MariaDB [(none)]> create database batch66
--     -> ;
-- Query OK, 1 row affected (0.021 sec)

-- MariaDB [(none)]> use batch66;
-- Database changed
-- MariaDB [batch66]> create database IF NOT EXISTS batch66;
-- Query OK, 0 rows affected, 1 warning (0.001 sec)

-- MariaDB [batch66]>
-- MariaDB [batch66]> create table IF NOT EXISTS Student(
--     ->     id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
--     ->     name VARCHAR(100) NOT NULL,
--     ->     result VARCHAR(50)
--     -> );
-- Query OK, 0 rows affected (0.147 sec)

-- MariaDB [batch66]> show table;
-- ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 1
-- MariaDB [batch66]> show tables;
-- +-------------------+
-- | Tables_in_batch66 |
-- +-------------------+
-- | student           |
-- +-------------------+
-- 1 row in set (0.001 sec)

-- MariaDB [batch66]> drop table students;
-- ERROR 1051 (42S02): Unknown table 'batch66.students'
-- MariaDB [batch66]> drop database batch66;
-- Query OK, 1 row affected (0.269 sec)

-- MariaDB [(none)]> show tables;
-- ERROR 1046 (3D000): No database selected
-- MariaDB [(none)]> create database batch66
--     -> ;
-- Query OK, 1 row affected (0.001 sec)

-- MariaDB [(none)]> use batch66;
-- Database changed
-- MariaDB [batch66]> create table IF NOT EXISTS Students(
--     ->     id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
--     ->     name VARCHAR(100) NOT NULL,
--     ->     result VARCHAR(50)
--     -> );
-- Query OK, 0 rows affected (0.127 sec)

-- MariaDB [batch66]> show tables;
-- +-------------------+
-- | Tables_in_batch66 |
-- +-------------------+
-- | students          |
-- +-------------------+
-- 1 row in set (0.000 sec)

-- MariaDB [batch66]> insert into students (name,result) value("nadim","A+"),("nahid","A"),("nupu","A-"),("nisha","B");
-- Query OK, 4 rows affected (0.063 sec)
-- Records: 4  Duplicates: 0  Warnings: 0

-- MariaDB [batch66]> show tables;
-- +-------------------+
-- | Tables_in_batch66 |
-- +-------------------+
-- | students          |
-- +-------------------+
-- 1 row in set (0.000 sec)

-- MariaDB [batch66]> select * from students;
-- +----+-------+--------+
-- | id | name  | result |
-- +----+-------+--------+
-- |  1 | nadim | A+     |
-- |  2 | nahid | A      |
-- |  3 | nupu  | A-     |
-- |  4 | nisha | B      |
-- +----+-------+--------+
-- 4 rows in set (0.001 sec)

-- MariaDB [batch66]>