drop database shop;
create database shop;
use shop;
create table users(userId int(11) PRIMARY KEY AUTO_INCREMENT,Username VARCHAR(255),Password VARCHAR(255),Email VARCHAR(255),FullName VARCHAR(255),GroupId int(1) DEFAULT 0,TrustStatus int(1) DEFAULT 0,RegStatus int(1) DEFAULT 0,Date DATE);

INSERT INTO users(username,password,email,fullname,groupid) values('nacer',sha1('123456'),'nacer@gmail.com','issa',1);

INSERT INTO users(username,password,email,fullname,groupid)values('ahmed',sha1('1234'),'ahmed@gmail.com','issa',0);

