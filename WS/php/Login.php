<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div class="galderakcontainer">
  	  <h3>Login</h3><br>

  	      <form id="login" name="login" action="Layout.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
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
