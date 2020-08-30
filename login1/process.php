<?php

session_start();

// PROCESS ADD

$link = mysqli_connect("localhost", "root", "") 
  or die("Could not connect: " . mysql_error()); 
  mysqli_select_db($link, 'webservisi') 
  or die ( mysql_error());  
 

  switch ($_GET['action']) {
    case "add":
      $imeGrupe=$_POST['imeGrupe'];
      $mjesto=$_POST['mjesto'];
      $datum=$_POST['datum'];
      $brojKarata=$_POST['brojKarata'];
      
          $sql = "INSERT INTO koncerti
                    (imeGrupe,
                    mjesto,
                    datum,
                    brojKarata)
                  VALUES
                    ('$imeGrupe',
                    '$mjesto',
                    '$datum',
                    '$brojKarata')";
                    header('Location: home.php');
          break;
     case "edit":
     
      $sql = "UPDATE koncerti SET
                    imeGrupe = '" . $_POST['imeGrupe'] . "',
                    mjesto = '" . $_POST['mjesto'] . "',
                    datum = '" . $_POST['datum'] . "',
                    brojKarata = '" . $_POST['brojKarata'] . "'
                    WHERE id = '" . $_GET['id'] . "'";
          break;
  }

  if (isset($sql) && !empty($sql)) {
    echo "<!--" . $sql . "-->";
    $result = mysqli_query($link,$sql) 
      or die("Invalid query: " . mysql_error()); 
  }
?>

<?php
echo "Sredjeno buraz!";
?>