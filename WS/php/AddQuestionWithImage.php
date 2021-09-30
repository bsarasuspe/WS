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

      $esteka = mysqli_connect ("$zerbitzaria", "$erabiltzailea", "$gakoa", "$db") or die ("Errorea Dbra konektatzerakoan");

      $sql="INSERT INTO questions(eposta, galdera, erZ, er01, er02, er03, zailtasuna, gaia, argazkia)
      VALUES ('$_POST[eposta]' ,'$_POST[galdera]', '$_POST[ezuzena]', '$_POST[eokerra1]', '$_POST[eokerra2]', '$_POST[eokerra3]', '$_POST[zailtasuna]', '$_POST[gaia]', '$_POST[argazkia'])";

      if (!$esteka->query($sql)) {
       die("Errore bat gertatu da. <p><a href='QuestionFormWithImage.php'> Saiatu beste galdera bat gehitzen.</a>");
      }

      echo "Galdera bat gehitu da!";
      echo "<p> <a href='ShowQuestions.php'> Galderak ikusi</a>";

      mysqli_close($esteka); ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
