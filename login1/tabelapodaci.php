<?php

$connect = mysqli_connect("localhost", "root", "") or 
     die ("Provjeri konekciju sa serverom");

mysqli_select_db($connect, 'webservisi');    

$insert =  "INSERT INTO accounts (username, password, email)
    values ('Danijel', 'dadomadafaka', 'dado@dado.loco')";

    $results = mysqli_query($connect, $insert)
    or die(mysql_error());

$koncert =  "INSERT INTO koncerti (imeGrupe, mjesto, datum, brojKarata)
    values ('BS', 'Banja Luka', '2020-05-21', 80)";

    $results = mysqli_query($connect, $koncert )
    or die(mysql_error());

