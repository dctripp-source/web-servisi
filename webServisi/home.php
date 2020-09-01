
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <title>Početna</title>
    <link rel="icon" href="images/music.png">
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
        <h1>Dobrodošli</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profil</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		
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
    or die("Konekcija nije moguća: " . mysql_error()); 
  mysqli_select_db($link, 'webservisi') 
    or die(mysql_error()); 

    $query = "SELECT DISTINCT imeGrupe FROM koncerti";
    $result = mysqli_query($link, $query) 
    
?>

<html>
<head>
<title>Koncerti</title>
</head>
<body>
  <div class="pregledGrupa">
            
            <form action="" method="post" style="text-align: center">
                <label>Izaberi naziv grupe: </label>
                <select name="Grupe">
                  <option></option>
                  <?php
                    if($result){
                      while($row = mysqli_fetch_array($result)){
                        $imeKoncerta = $row["$columnname"];
                        echo "<option>$imeKoncerta<br></option>";
                      }
                    } 
                  ?>
                </select>
                <input type="submit" name="submit" >
                
                
     

                <table align="center">
                  <tr>
                    <th colspan="6">KONCERTI <input type=button onClick="location.href='add.php?action=add&id'" value='DODAJ'></th>
                  </tr>
                  <tr>
                  <th>Ime grupe</th>
                  <th>Datum</th>
                  <th>Mjesto</th>
                  <th>Broj prodanih karata</th>
                  <th>Izmjeni</th>
                  <th>Obriši</th>
                  </tr>
                </form>
                <?php
                  if(isset($_POST['submit'])){
                    if(!empty($_POST['Grupe'])) {
                      $selected = $_POST['Grupe'];
                      $koncertisql = "SELECT  * FROM koncerti WHERE imeGrupe='$selected'";
                      $result = mysqli_query($link, $koncertisql);
                    while($row= mysqli_fetch_array($result)){
                      ?>
                      <tr>
                        <td> <?php echo $row['imeGrupe'] ?> </td>
                        <td> <?php echo $row['datum'] ?> </td>
                        <td> <?php echo $row['mjesto'] ?> </td>
                        <td> <?php echo $row['brojKarata'] ?> </td>
                        <td><a href="add.php?action=edit&id=<?php echo $row['id'];?>">EDIT</a></td>
                        <td><a href="delete.php?id=<?php echo $row['id'];?>">DELETE</a></td>
                      </tr>
                      <?php
                      }
                      
                    } else {
                      echo '<script>alert("Izaberite naziv grupe!")</script>'; 
                    }
                    
                  }
                  
                  ?> 
                </table>
                </div>
            
          </div>
   
   </body>
</html>

