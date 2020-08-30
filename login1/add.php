<?php
 $link = mysqli_connect("localhost", "root", "") 
 or die("Could not connect: " . mysql_error()); 
 mysqli_select_db($link, 'webservisi') 
   or die ( mysql_error()); 
   $update = false;
 $query = "SELECT * FROM koncerti";

 $result = mysqli_query($link,$query) 
   or die("Invalid query: " . mysql_error()); 
   
switch ($_GET['action']) {
    case "edit":
      $koncertisql = "SELECT * FROM koncerti
                   WHERE id = '" . $_GET['id'] . "'";
      $result = mysqli_query($link,$koncertisql) 
        or die("Invalid query: " . mysql_error()); 
      $row = mysqli_fetch_array($result);
      $imeGrupe = $row['imeGrupe'];
      $mjesto = $row['mjesto'];
      $datum = $row['datum'];
	  $brojKarata = $row['brojKarata'];
	  $update = true;
      break;
      
	  default:
      $imeGrupe = "";
      $mjesto = "";
      $datum = "";
      $brojKarata = "";
      break;
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Početna</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Dobrodošli</h1>
				<a href="home.php">Home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profil</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>

        <div class="content">
		<?php if($update==true):
                    ?>
                    <h2>Ažuriraj koncert</h2>
                  <?php else: ?>
                    <h2>Dodaj novi koncert</h2>
                  <?php endif;?>
            <form action="process.php?action=<?php echo $_GET['action']; ?>&id=<?php echo $_GET['id']; ?>" method="POST">
            <br><label>Ime grupe: </label><input type="text" name="imeGrupe" value="<?php echo $imeGrupe; ?>"><br><br>
            <label>Mjesto: </label><input type="text" name="mjesto" value="<?php echo $mjesto; ?>"><br><br>
            <label>Datum: </label><input type="date" name="datum" value="<?php echo $datum; ?>"><br><br>
            <label>Broj prodatih karata: </label><input type="number" name="brojKarata" value="<?php echo $brojKarata; ?>"><br><br>

			<?php
                  if($update==true):
                    ?>
                    <input type="submit" name="SUBMIT" value="<?php echo $_GET['action']; ?>">
					<input type=button onClick="location.href='home.php'" value='NAZAD'>
                  <?php else: ?>
                    <input type="submit" name="SUBMIT" value="<?php echo $_GET['action']; ?>">
                  <?php endif;?>
            </form>
        </div>
        
	</body>
</html>

<?php