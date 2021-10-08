<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <!--<script src="../js/ValidateFieldsQuestionJS.js"></script>-->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script src="../js/ValidateFieldsQuestionJQ.js"></script>
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
      var img=document.getElementById('galderarenirudia');
      img.style.display="none";
    }

  </script>
</head>

<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div>
<?php if($konektatua==1){
  echo '
      <div class="formularioa">
          <h3>Galdera sortu</h3><br>
          <form id="galderenF" name="galderenF" action="AddQuestionWithImage.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
          <label for="eposta">(*) E-posta:</label><br>
          <input type="text" id="eposta" name="eposta" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="galdera">(*) Galdera:</label><br>
          <input type="text" id="galdera" name="galdera" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="ezuzena">(*) Erantzun zuzena:</label><br>
          <input type="text" id="ezuzena" name="ezuzena" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="eokerra1">(*) Erantzun okerra 1:</label><br>
          <input type="text" id="eokerra1" name="eokerra1" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="eokerra2">(*) Erantzun okerra 2:</label><br>
          <input type="text" id="eokerra2" name="eokerra2" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="eokerra3">(*) Erantzun okerra 3:</label><br>
          <input type="text" id="eokerra3" name="eokerra3" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="zailtasuna">(*) Zailtasuna:</label><br>
          <select name="zailtasuna" style="width:300px;margin-bottom:5px;">
            <option value="1">Txikia</option>
            <option value="2">Ertaina</option>
            <option value="3">Handia</option>
          </select><br>
          <label for="gaia">(*) Gaia:</label><br>
          <input type="text" id="gaia" name="gaia" value="" style="width:300px;margin-bottom:5px;"><br>
          <label for="zailtasuna">(Hautazkoa) Argazkia:</label><br>
          <input type="file" name="irudia" id="irudia" accept="image/*" onchange="irudiaIkusi();"/><br>
          <img id="galderarenirudia" src=""/></br>
          <input type="submit" name="submit" id="submit" value="Bidali" style="width:150px;">
          <input type="reset" value="Hustu" id="reset" onclick="irudiaKendu();" style="width:150px;">
        </form>
      </div>';
    }else{
    echo '<div class="alert-error">Orri hau ikusteko erabiltzaile erregistratua izan behar zara.</div>';
  }
?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
