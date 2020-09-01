<?php

$connect = mysqli_connect("localhost", "root", "") or 
     die ("Provjeri konekciju sa serverom.");

//kreiranje baze webservisi
$create = mysqli_query($connect,"CREATE DATABASE IF NOT EXISTS webservisi")
  or die(mysql_error());


mysqli_select_db($connect,"webservisi");


  // "accounts" tabela
$accounts = "CREATE TABLE accounts (
  id int(11) NOT NULL auto_increment, 
  username varchar(50) NOT NULL, 
  password varchar(255) NOT NULL, 
  email varchar(100) NOT NULL,  
  PRIMARY KEY  (id)
)";
$results = mysqli_query($connect, $accounts)
or die(mysql_error());

//"koncerti" tabela
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

  echo "Baza podataka web servisi uspješno kreirana";
?>




