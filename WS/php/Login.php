<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">

  <?php require_once 'DbConfig.php';

if (isset($_POST["submit"])){
  if(!empty("$_POST[eposta]")){
    if(!empty("$_POST[pasahitza]")){
      $esteka = mysqli_connect ("$zerbitzaria", "$erabiltzailea", "$gakoa", "$db") or die ("Errorea Dbra konektatzerakoan");

      $eposta = $_POST["eposta"];
      $pasahitza = $_POST["pasahitza"];
      
      $sqli = "SELECT * FROM users WHERE eposta='$eposta' and pasahitza='$pasahitza'";
      $result = $esteka->query($sqli);

      if (!($result)) {
        echo "<div class='alert-error'>Error in the query</div><br>". $result -> error;
      }else{
        $rows_cnt = $result->num_rows;
        $esteka->close();
        if ($rows_cnt == 1){
          echo "<div class='alert-success'>Ongi logeatu zara!</div><br>";
          $rows_cnt=0;
          //$url = "Layout.php?eposta=$eposta&pasahitza=$pasahitza";
          $url = "Layout.php?eposta=$eposta";
          header("location: $url");
    }else{
      echo "<div class='alert-error'>Eposta eta pasahitza ez dira egokiak</div><br>";
    }
  }
    }else{
      echo "<div class='alert-error'>Pasahitza falta da</div><br>";
    }
  }else{
    echo "<div class='alert-error'>Eposta falta da</div><br>";
  }
}

?>
    <div class="galderakcontainer">
  	  <h3>Login</h3><br>
  	  	
  	      <form id="login" name="login" action="Login.php" method="post">
          <label for="eposta">(*) E-posta:</label><br>
          <input type="text" id="eposta" name="eposta" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="pas1">(*) Pasahitza:</label><br>
          <input type="password" id="pasahitza" name="pasahitza" value="" style="width:300px;margin-bottom:10px;"><br>
          <input type="submit" name="submit" id="submit" value="Login" style="width:300px;"><br>
          <div style="font-size:12px;margin-top:5px;">Konturik ez baduzu, erregistratu <a href="SignUp.php">hemen</a>.</div>
    </form>
	</div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
