CREATE DATABASE books;

USE DATABASE books;

CREATE TABLE IF NOT EXISTS Images
(
  Id int not null primary key auto_increment,
  Image varchar(45) not null,
  CreatedAt datetime not null,
  UptatedAt datetime,
  User_Id int not null
);

CREATE TABLE IF NOT EXISTS LoginCredentials 
(
  Id int not null auto_increment primary key,
  Email varchar(120) not null,
  Username varchar(90)not null,
  Passwordword varchar(14) not null,
  CreatedAt datetime not null,
  UpdatedAt datetime,
  Image varchar(50)
);

CREATE TABLE IF NOT EXISTS Posts
(
  Id int not null auto_increment primary key,
  OwnerId int not null,
  ProductId int not null,
  content varchar(180) not null,
  CreatedAt datetime not null,
  UpdatedAt datetime
);

CREATE TABLE IF NOT EXISTS Products
(
  Id int not null auto_increment primary key,
  UserId int not null,
  Title varchar(50) not null,
  Genre varchar(50) not null,
  Author varchar(80) not null
)