<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="hstyle.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>The Palace</h1>
				<a href="back.php"><i class="fas fa-sign-out-alt"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				
			</div>
		</nav>
		<div class="content">
			<h2 style="color: white;">Početna strana</h2>
      <p>Dobrodošli, <?=$_SESSION['name']?>!</p>

		</div>
	</body>
</html>
<?php
  $hostname="localhost";
  $username="root";
  $dbname="webservisi";
  $password="";
  $usertable="koncerti";
  $columnname="imeGrupe";

  
  $link = mysqli_connect("localhost", "root", "") 
    or die("Could not connect: " . mysql_error()); 
  mysqli_select_db($link, 'webservisi') 
    or die(mysql_error()); 

    $query = "SELECT DISTINCT imeGrupe FROM koncerti";
    $result = mysqli_query($link, $query) 
    
?>

<html>
<head>
<title>Koncerti</title>
<style type="text/css">
TD{color:#353535;font-family:verdana}
TH{color:#FFFFFF;font-family:verdana;background-color:#336699}
</style>
</head>
<body>

<form action="" method="post" style="text-align: center;">
<label>Izaberi grupu</label> <br>
<select name="Grupe">
 
  <option style="width: 100px;"> </option>
  <?php
    if($result){
      while($row = mysqli_fetch_array($result)){
        $imeKoncerta = $row["$columnname"];
        echo "<option>$imeKoncerta<br></option>";
      }
    }
  ?>
</select>
<input type="submit" name="submit" vlaue="SEARCH DATA">
<table align="center">
  <tr>
  <th>Ime grupe</th>
  <th>Datum</th>
  <th>Mjesto</th>
  <th>Broj prodanih karata</th>
  </tr>
  
</form>


  <?php
  if(isset($_POST['submit'])){
    if(!empty($_POST['Grupe'])) {
      $selected = ($_POST['Grupe']);
      $koncertisql = "SELECT  imeGrupe, datum, mjesto, brojKarata FROM koncerti WHERE imeGrupe = '$selected'";
    $result = mysqli_query($link, $koncertisql);
    while ($row= mysqli_fetch_array($result)){
      ?>
      <tr>
        <td> <?php echo $row['imeGrupe'] ?> </td>
        <td> <?php echo $row['datum'] ?> </td>
        <td> <?php echo $row['mjesto'] ?> </td>
        <td> <?php echo $row['brojKarata'] ?> </td>
      </tr>
       <?php
      } 
    }   else  {
       if ($selected = 'Izaberite grupu') {
         echo '<script> alert("Izaberi grupu") </script>';
       }
    }
} 
?> 
/ Danijele kralju/
</body>
</html>
