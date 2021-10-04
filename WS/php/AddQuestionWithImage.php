<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php require_once 'DbConfig.php';

      $patternEposta = "/^([a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)|[a-zA-Z]*\.*[a-zA-Z]+(@ehu\.(eus|es)))$/";
      $patternGaldera = "/^[^ ]{10}[^ ]*$/";
      $patternEzHutsa = "/^[^ ]+$/";
      $patternZailtasuna = "/^1|2|3$/";

      if (preg_match($patternEposta,"$_POST[eposta]") && preg_match($patternGaldera, "$_POST[galdera]") && 
      preg_match($patternEzHutsa, "$_POST[ezuzena]") && preg_match($patternEzHutsa, "$_POST[eokerra1]") && 
      preg_match($patternEzHutsa, "$_POST[eokerra2]") && preg_match($patternEzHutsa, "$_POST[eokerra3]") &&
      preg_match($patternZailtasuna, "$_POST[zailtasuna]") && preg_match($patternEzHutsa, "$_POST[gaia]")){
        $esteka = mysqli_connect ("$zerbitzaria", "$erabiltzailea", "$gakoa", "$db") or die ("Errorea Dbra konektatzerakoan");

        if($_FILES['irudia']["tmp_name"] == null){
          $sql="INSERT INTO questions(eposta, galdera, erZ, er01, er02, er03, zailtasuna, gaia, argazkia)
        VALUES ('$_POST[eposta]' ,'$_POST[galdera]', '$_POST[ezuzena]', '$_POST[eokerra1]', '$_POST[eokerra2]', '$_POST[eokerra3]', '$_POST[zailtasuna]', '$_POST[gaia]', null)";
        }else{
          $irudia = addslashes(file_get_contents($_FILES['irudia']["tmp_name"]));
          $sql="INSERT INTO questions(eposta, galdera, erZ, er01, er02, er03, zailtasuna, gaia, argazkia)
        VALUES ('$_POST[eposta]' ,'$_POST[galdera]', '$_POST[ezuzena]', '$_POST[eokerra1]', '$_POST[eokerra2]', '$_POST[eokerra3]', '$_POST[zailtasuna]', '$_POST[gaia]', '{$irudia}')";
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

      ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
