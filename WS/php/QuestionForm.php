<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <!-- <script src="../js/ValidateFieldsQuestionJS.js"></script> -->
  <script src="../js/ValidateFieldsQuestionJQ.js"></script>
  <script src="../js/jquery-3.4.1.min"></script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <div class="formularioa">
          <h3>Formularioa</h3><br>
          <form name="formularioa" action="/action_page.php" onsubmit="return validateForm()">
          <label for="eposta">(*) E-posta:</label><br>
          <input type="text" id="fname" name="eposta" value="" style="width:300px" required><br><br>
          <label for="galdera">(*) Galdera:</label><br>
          <input type="text" id="fname" name="galdera" value="" style="width:300px" required><br><br>
          <label for="ezuzena">(*) Erantzun zuzena:</label><br>
          <input type="text" id="fname" name="ezuzena" value="" style="width:300px" required><br><br>
          <label for="eokerra1">(*) Erantzun okerra 1:</label><br>
          <input type="text" id="fname" name="eokerra1" value="" style="width:300px" required><br><br>
          <label for="eokerra2">(*) Erantzun okerra 2:</label><br>
          <input type="text" id="fname" name="eokerra2" value="" style="width:300px" required><br><br>
          <label for="eokerra3">(*) Erantzun okerra 3:</label><br>
          <input type="text" id="fname" name="eokerra3" value="" style="width:300px" required><br><br>
          <label for="zailtasuna">(*) Zailtasuna:</label><br>
          <select name="zailtasuna" style="width:300px">
            <option>Txikia</option>
            <option>Ertaina</option>
            <option>Handia</option>
          </select><br><br>
          <label for="gaia">(*) Gaia:</label><br>
          <input type="text" id="fname" name="gaia" value="" style="width:300px"><br><br>
          <input type="submit" value="Bidali" style="width:300px">
        </form>
      </div>
       
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
