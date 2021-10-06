<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script type="text/javascript">
    function irudiaIkusi(){
      var preview = document.querySelector('img');
      var file    = document.querySelector('input[type=file]').files[0];
      var reader  = new FileReader();

      reader.onloadend = function () {
        preview.src = reader.result;
        preview.style.height='100px';
        preview.style.width='100px';
      }
      if (file) {
        reader.readAsDataURL(file);
      }
      else {
        preview.src = "";
      }
    }
    function irudiaKendu(){
      var img=document.getElementById('userIrudia');
      img.style.display="none";
    }

  </script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

    <?php require_once 'DbConfig.php';

    if(isset($_POST["submit"])) {

        $patternEposta = "/^([a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)|[a-zA-Z]*\.*[a-zA-Z]+(@ehu\.(eus|es)))$/";
        $patternIzena = "/^$/";
        $patternEzHutsa = "/^[^ ]+$/";

        $esteka = mysqli_connect ("$zerbitzaria", "$erabiltzailea", "$gakoa", "$db") or die ("Errorea Dbra konektatzerakoan");

        // PHP validation
        if(preg_match($patternEposta,"$_POST[eposta]") && preg_match($patternIzena, "$_POST[izenabizenak]") && 
        !empty("$_POST[mota]") && preg_match($patternEzHutsa, "$_POST[mota]") && preg_match($patternEzHutsa, "$_POST[pas1]") && 
        preg_match($patternEzHutsa, "$_POST[pas2]") && ("$_POST[pas1]"=="$_POST[pas2]")){

        $eposta = $_POST["eposta"];
        $izenabizenak = $_POST["izenabizenak"];
        $mota =  $_POST["mota"];
        $pas1 = $_POST["pas1"];
        $pas2 = $_POST["pas2"];

        $emailCheck = $esteka->query( "SELECT * FROM users WHERE eposta = '{$eposta}' ");
        //$rowCount = $emailCheck->fetchColumn();
            
            // check if user email already exist
            if($rowCount > 0) {
              echo 'emaila existitzen da!';
                $email_exist = '
                        User with email already exist!
                ';
            } else {

            // Password hash
            $password_hash = password_hash($pas1, PASSWORD_BCRYPT);

            echo "$password_hash";

            $sql = $esteka->query("INSERT INTO users(eposta, izenabizenak, mota, pasahitza, argazkia) 
            VALUES ('{$eposta}', '{$izenabizenak}', '{$mota}', '{$password_hash}', null");
            
                if(!$sql){
                    die("Errore bat gertatu da!" . mysqli_error($esteka));
                } else {
                  echo 'erregistratu da!';
                    $success_msg = '
                        Erabiltzailea erregistratu da!
                ';
                }
            }
        } else {
            /*if(empty($eposta)){
                $emptyError1 = '
                    First name is required.
                ';
            }
            if(empty($izenabizenak)){
                $emptyError2 = '
                    Last name is required.
                ';
            }
            if(empty($mota)){
                $emptyError3 = '
                    Email is required.
                ';
            }
            if(empty($pas1)){
                $emptyError4 = '
                    Mobile number is required.
                ';
            }
            if(empty($pas2)){
                $emptyError5 = '
                    Password is required.
                ';
            }  */
            echo 'datuak ez dira egokiak <br>';          
        }
    }


/*
    if (isset($POST["eposta"])){
      $patternEposta = "/^([a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)|[a-zA-Z]*\.*[a-zA-Z]+(@ehu\.(eus|es)))$/";
      $patternIzena = "/^$/";
      $patternEzHutsa = "/^[^ ]+$/";

      if (preg_match($patternEposta,"$_POST[eposta]") && preg_match($patternIzena, "$_POST[izenabizenak]") && 
      preg_match($patternEzHutsa, "$_POST[mota]") && preg_match($patternEzHutsa, "$_POST[pas1]") && 
      preg_match($patternEzHutsa, "$_POST[pas2]") && ("$_POST[pas1]"=="$_POST[pas2]")){
        
          //$esteka = mysqli_connect ("$zerbitzaria", "$erabiltzailea", "$gakoa", "$db") or die ("Errorea Dbra konektatzerakoan");

        if($_FILES['irudia']["tmp_name"] == null){
          $sql="INSERT INTO users(eposta, izenabizenak, mota, pasahitza, argazkia)
        VALUES ('$_POST[eposta]' ,'$_POST[izenabizenak]', '$_POST[mota]', '$_POST[pas1]', null)";
        }else{
          $irudia = addslashes(file_get_contents($_FILES['irudia']["tmp_name"]));
          $sql="INSERT INTO users(eposta, izenabizenak, mota, pasahitza, argazkia)
        VALUES ('$_POST[eposta]' ,'$_POST[izenabizenak]', '$_POST[mota]', '$_POST[pas1]', null)";
        }
        
        if (!$esteka->query($sql)) {
         die("Errore bat gertatu da. <p><a href='QuestionFormWithImageHtml5.php'> Saiatu beste galdera bat gehitzen.</a>");
        }

        echo "Galdera bat gehitu da!";
        echo "<p> <a href='ShowQuestionsWithImage.php'> Galderak ikusi</a>";

        mysqli_close($esteka);
      }else{
        echo ("Informazioa ez da zuzena.");
      };
    }
*/
    ?>

<div class="galderakcontainer">
    <h3>Erregistratu</h3><br>
    <form id="erregistratu" name="erregistratu" action="SignUp.php" onsubmit="return validateForm()" method="post">
          <label for="eposta">(*) E-posta:</label><br>
          <input type="text" id="eposta" name="eposta" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="izenabizenak">(*) Izen abizenak:</label><br>
          <input type="text" id="izenabizenak" name="izenabizenak" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="mota">(*) Erabiltzaile mota:</label><br>
          <input type="radio" id="irakaslea" name="mota" value="irakaslea" style="margin-bottom:5px;">
          <label for="irakaslea">Irakaslea</label><br>
          <input type="radio" id="ikaslea" name="mota" value="ikaslea" style="margin-bottom:5px;">
          <label for="ikaslea">Ikaslea</label><br>
          <label for="pas1">(*) Pasahitza:</label><br>
          <input type="password" id="pas1" name="pas1" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="pas2">(*) Pasahitza errepikatu:</label><br>
          <input type="password" id="pas2" name="pas2" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="irudia">(Hautazkoa) Argazkia:</label><br>
          <input type="file" name="irudia" id="irudia" accept="image/*" onchange="irudiaIkusi();"/><br>
          <img id="userIrudia" src=""/></br>
          <input type="submit" name="submit" id="submit" value="Bidali" style="width:150px;">
          <input type="reset" value="Hustu" id="reset" onclick="irudiaKendu();" style="width:150px;">
        </form>
</div>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
