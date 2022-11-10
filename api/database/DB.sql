CREATE DATABASE books;

USE books;

CREATE TABLE IF NOT EXISTS LoginCredentials 
(
  Id int not null auto_increment primary key,
  Email varchar(120) not null,
  Username varchar(90)not null,
  Password varchar(140) not null,
  PhoneNumber varchar(14) not null,
  TwitterAccount varchar(120) not null,
  FacebookAccount varchar(120) not null,
  InstagramAccount varchar(120) not null,
  SecurityQuestion varchar(120) not null,
  SecurityAnswer varchar(120) not null,
  CreatedAt datetime not null,
  UpdatedAt datetime,
  Image varchar(50)
);

CREATE TABLE IF NOT EXISTS Posts
(
  Id int not null auto_increment primary key,
  OwnerId int not null,
  OwnerName varchar(50) not null,
  Title varchar(100) not null,
  Genre varchar(12) not null,
  Troca tinyint(1) not null,
  Image varchar(100) not null,
  content varchar(180) not null,
  CreatedAt datetime not null,
  UpdatedAt datetime
);