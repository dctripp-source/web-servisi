<?php

$link = mysqli_connect("localhost", "root", "") 
  or die("Konekcija nije moguća: " . mysql_error()); 
mysqli_select_db($link, 'webservisi') 
  or die(mysql_error());

  if (!isset($_GET['do']) || $_GET['do'] != 1) {
    ?>
      <p align="center">
        Da li ste sigurni da želite obrisati ovaj koncert?<br>
        <a href="<?php echo $_SERVER['REQUEST_URI']; ?>&do=1">DA</a> 
        or <a href="home.php">NE</a>
      </p>
    <?php
      } else{
      
        $sql = "DELETE FROM koncerti
                WHERE  id = '" . $_GET['id'] . "'
                LIMIT 1";
        
        echo "<!--" . $sql . "-->";
        $result = mysqli_query($link,$sql)
          or die("Invalid query: " . mysql_error());
    ?>

      <p align="center">
        Koncert je izbrisan 
        <a href="home.php">Početna</a>
      </p>
    
    <?php

      }?>