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
        $patternIzena = "/^[a-zA-ZÀ-ÿ]{2,}\s[a-zA-ZÀ-ÿ]{2,}(\s[a-zA-ZÀ-ÿ]{2,})*$/";

        $esteka = mysqli_connect ("$zerbitzaria", "$erabiltzailea", "$gakoa", "$db") or die ("Errorea Dbra konektatzerakoan");

        // PHP validation
        if(!empty("$_POST[eposta]")){
          if(!empty("$_POST[izenabizenak]")){
            if(!empty("$_POST[mota]")){
              if(!empty("$_POST[pas1]")){
                if(!empty("$_POST[pas2]")){
                  if("$_POST[pas1]"=="$_POST[pas2]"){
                    if (preg_match($patternEposta,"$_POST[eposta]")){
                      if (preg_match($patternIzena, "$_POST[izenabizenak]")){
                        $eposta = $_POST["eposta"];
                        $izenabizenak = $_POST["izenabizenak"];
                        $mota =  $_POST["mota"];
                        $pas1 = $_POST["pas1"];
                        $pas2 = $_POST["pas2"];

                        $sqlEmail = "SELECT * FROM users WHERE eposta = '{$eposta}'";
                        $rs = mysqli_query($esteka ,$sqlEmail);
                        $rowCount = mysqli_num_rows($rs);
                                    
                        // check if user email already exist
                        if($rowCount > 0) {
                          echo 'emaila existitzen da!';
                          $email_exist = 'User with email already exist!';
                        } else {
                          // Password hash
                          $password_hash = password_hash($pas1, PASSWORD_BCRYPT);

                          $sql = $esteka->query("INSERT INTO users(eposta, izenabizenak, mota, pasahitza, argazkia) 
                          VALUES ('$eposta', '$izenabizenak', '$mota', '$password_hash', null");
                                    
                          if(!$sql){
                            die("Errore bat gertatu da! " . mysqli_error($esteka));
                          } else {
                            echo 'erregistratu da!';
                            $success_msg = 'Erabiltzailea erregistratu da!<br>';
                          }
                        }
                      }else{
                        echo "Izena ez da egokia.<br>";
                      }
                    }else{
                      echo "Eposta ez da egokia.<br>";
                    }
                  }else{
                    echo "Pasahitzak ez dira berdinak.<br>";
                  }
                }else{
                  echo "Pasahitza errepikatzea falta da.<br>";
                }
              }else{
                echo "Pasahitza falta da.<br>"; 
              }
            }else{
              echo "Mota falta da.<br>";
            }
          }else{
            echo "Izen abizenak falta dira.<br>";
          }
        }else{
          echo "Eposta falta da.<br>";
        }
    }
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
          <input type="radio" id="ikaslea" name="mota" value="ikaslea">
          <label for="ikaslea">Ikaslea</label><br>
          <label for="pas1">(*) Pasahitza:</label><br>
          <input type="password" id="pas1" name="pas1" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="pas2">(*) Pasahitza errepikatu:</label><br>
          <input type="password" id="pas2" name="pas2" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="irudia">(Hautazkoa) Argazkia:</label><br>
          <input type="file" name="irudia" id="irudia" accept="image/*" onchange="irudiaIkusi();"/><br>
          <img id="userIrudia" src=""/></br>
          <input type="submit" name="submit" id="submit" value="Erregistratu" style="width:150px;">
          <input type="reset" value="Hustu" id="reset" onclick="irudiaKendu();" style="width:150px;">
        </form>
</div>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
