<?php

$connect = mysqli_connect("localhost", "root", "") or 
     die ("Provjeri konekciju sa serverom.");

//create the main database if it doesn't already exist
$create = mysqli_query($connect,"CREATE DATABASE IF NOT EXISTS webservisi")
  or die(mysql_error());

//make sure our recently created database is the active one
mysqli_select_db($connect,"webservisi");


  //create "accounts" table
$accounts = "CREATE TABLE accounts (
  id int(11) NOT NULL auto_increment, 
  username varchar(50) NOT NULL, 
  password varchar(255) NOT NULL, 
  email varchar(100) NOT NULL,  
  PRIMARY KEY  (id)
)";
$results = mysqli_query($connect, $accounts)
or die(mysql_error());

//create "koncerti" table
$koncerti = "CREATE TABLE koncerti (
  id int(11) NOT NULL auto_increment, 
  imeGrupe varchar(50) NOT NULL, 
  mjesto varchar(50) NOT NULL, 
  datum date NOT NULL, 
  brojKarata int(100) NOT NULL, 
  PRIMARY KEY  (id)
)";
$results = mysqli_query($connect, $koncerti)
or die(mysql_error());

  echo "Web servisi baza podataka uspješno kreirana";
?>
Sekana najjacaaa
familija jos jacaaa
Opaaaaasnoo Brudis
Draga draga


