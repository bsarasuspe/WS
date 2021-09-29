<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
  	<div>
      <div class="formularioa">
            <h3>Galdera sortu</h3><br>
            <form id="formularioa" name="formularioa" action="AddQuestion.php" onsubmit="return validateForm()">
            <label for="eposta">(*) E-posta:</label><br>
            <input type="text" id="eposta" name="eposta" value="" 
            pattern="([a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)|[a-zA-Z]*\.*[a-zA-Z]+(@ehu\.(eus|es)))" style="width:300px;margin-bottom:5px;" required><br>
            <label for="galdera">(*) Galdera:</label><br>
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
            <label for="gaia">(Hautazkoa) Argazkia:</label><br>
            <button type="submit" style="width:150px;" form="formularioa">Bidali</button>
            <button type="reset" style="width:150px;" form="formularioa">Hustu</button>
          </form>
        </div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
