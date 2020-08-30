<?php
//connect to MySQL
$connect = mysqli_connect("localhost", "root", "") 
  or die ("Provjeri konekciju sa serverom.");

//make sure we're using the right database
mysqli_select_db($connect, "webservisi");

//insert data into "accounts" table
$insert = "INSERT INTO accounts (username, password, email) VALUES ('Milica', 'Milica', 'milica@milica.com'),('test', 'test', 'test@test.com')"; 


 $results = mysqli_query($connect, $insert)
  or die(mysql_error());

  //insert data into "koncerti" table
$insertKoncerti = "INSERT INTO koncerti (imeGrupe, mjesto, datum, brojKarata) VALUES ('Bijelo Dugme', 'Banja Luka', '2020-11-20',60),('Galija', 'Beograd', '2020-12-13', 68)"; 


$results = mysqli_query($connect, $insertKoncerti)
 or die(mysql_error());

 echo "Podaci su uspješno dodani";

 ?>