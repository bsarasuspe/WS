<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>

<body>
  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div>

  <?php if($konektatua==1){
  echo '
      <div class="formularioa">
            <h3>Galdera sortu</h3><br>';
            echo "<form id='formularioa' name='formularioa' action='AddQuestion.php?eposta=$eposta' onsubmit='return validateForm()'' method='post'>";
            echo '<label for="eposta">(*) E-posta:</label><br>';
            echo "<input type='text' id='eposta' name='eposta' value='$eposta' style='width:300px;margin-bottom:5px;' readonly><br>";
            echo '<label for="galdera">(*) Galdera:</label><br>
            <input type="text" id="galdera" name="galdera" value="" minlength="10" style="width:300px;margin-bottom:5px;" required><br>
            <label for="ezuzena">(*) Erantzun zuzena:</label><br>
            <input type="text" id="ezuzena" name="ezuzena" value="" style="width:300px;margin-bottom:5px;" required><br>
            <label for="eokerra1">(*) Erantzun okerra 1:</label><br>
            <input type="text" id="eokerra1" name="eokerra1" value="" style="width:300px;margin-bottom:5px;" required><br>
            <label for="eokerra2">(*) Erantzun okerra 2:</label><br>
            <input type="text" id="eokerra2" name="eokerra2" value="" style="width:300px;margin-bottom:5px;" required><br>
            <label for="eokerra3">(*) Erantzun okerra 3:</label><br>
            <input type="text" id="eokerra3" name="eokerra3" value="" style="width:300px;margin-bottom:5px;" required><br>
            <label for="zailtasuna">(*) Zailtasuna:</label><br>
            <select name="zailtasuna" style="width:300px;margin-bottom:5px;">
              <option value="1">Txikia</option>
              <option value="2">Ertaina</option>
              <option value="3">Handia</option>
            </select><br>
            <label for="gaia">(*) Gaia:</label><br>
            <input type="text" id="gaia" name="gaia" value="" style="width:300px;margin-bottom:5px;"><br>
            <button type="submit" style="width:150px;" form="formularioa">Bidali</button>
            <button type="reset" style="width:150px;" form="formularioa">Hustu</button>
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
