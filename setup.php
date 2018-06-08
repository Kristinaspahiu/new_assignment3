<?php

 $host = 'localhost';
 $user = 'root';
 $pass = '';

 $link = new mysqli($host, $user, $pass);

 if($link->connect_error)
  die($link->connect_error);

 
  // create the database
  $query = 'CREATE DATABASE assignment3';
  $link->query($query);
 
  // select the database
  $link->select_db('assignment3');

  $query1 = "CREATE TABLE Users (
   ID INT AUTO_INCREMENT PRIMARY KEY,
   Username VARCHAR(30) NOT NULL,
   Name VARCHAR(30)  NOT NULL,
   Surname VARCHAR(30)  NOT NULL,
   Email VARCHAR(30)  NOT NULL,
   Password CHAR(255)  NOT NULL,
   Rights VARCHAR(7) NOT NULL
 )";
  $link->query($query1);

//Create the tables of the database. 
  $query2="CREATE TABLE Items (
   ID INT AUTO_INCREMENT PRIMARY KEY,
   Location TEXT,
   Description TEXT,
   Details TEXT,
   DatePosted INT(10) NOT NULL,
   Name VARCHAR(30) NOT NULL,
   Image VARCHAR(100),
   Category CHAR(30),
   Owner INT NOT NULL,
   FOREIGN KEY (Owner) REFERENCES Users (ID) ON DELETE CASCADE
 )";
$link->query($query2);

$query3="CREATE TABLE Message (
 ID INT AUTO_INCREMENT PRIMARY KEY,
 Sender INT  NOT NULL,
 Reciever INT NOT NULL,
 Item INT NOT NULL,
 DateSent DATETIME  NOT NULL,
 Content TEXT(1000)  NOT NULL,
 FOREIGN KEY (Sender) REFERENCES Users (ID) ON DELETE CASCADE,
 FOREIGN KEY (Reciever) REFERENCES Users (ID) ON DELETE CASCADE,
 FOREIGN KEY (Item) REFERENCES Items (ID) ON DELETE CASCADE
)";

$link->query($query3);
$query4="CREATE TABLE Wishlist (
  ID INT AUTO_INCREMENT,
  User INT  NOT NULL,
  Item INT NOT NULL,
  FOREIGN KEY (User) REFERENCES Users (ID) ON DELETE CASCADE,
  FOREIGN KEY (Item) REFERENCES Items (ID) ON DELETE CASCADE,
  PRIMARY KEY(ID,User,Item)
 )";
 
 $link->query($query4);
?>

