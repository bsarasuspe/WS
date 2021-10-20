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
      $patternGaldera = "/^[a-zA-Z0-9À-ÿ_ ]{10,}$/";
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
         die("<div class='alert-error'>Errore bat gertatu da. <p><a href='QuestionFormWithImageHtml5.php?eposta=$eposta'> Saiatu beste galdera bat gehitzen.</a></div>");
        }else{
          echo "<div class='alert-success'>Galdera bat gehitu da!</div><br>";
        }

        if (!file_exists('../xml/Questions.xml')){
          echo "<div class='alert-error'>XML fitxategia ez da existitzen.</div>";
        }else{
          $xml = simplexml_load_file('../xml/Questions.xml');
          $assessmentItem = $xml->addChild('assessmentItem');
          $assessmentItem->addAttribute('author', $_POST['eposta']); // $xml-ri SimpleXMLElement ume bat gehitzen dio, hura itzuliaz
          $assessmentItem->addAttribute('subject', $_POST['gaia']);
          $itemBody = $assessmentItem->addChild('itemBody');
          $p = $itemBody->addChild('p',$_POST['galdera']);
          $correctResponse = $assessmentItem->addChild('correctResponse');
          $response = $correctResponse->addChild('response', $_POST['ezuzena']);
          $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
          $response = $incorrectResponses->addChild('response', $_POST['eokerra1']);
          $response = $incorrectResponses->addChild('response', $_POST['eokerra2']);
          $response = $incorrectResponses->addChild('response', $_POST['eokerra3']);
          $xml->asXML('../xml/Questions.xml');
          echo "<div class='alert-success'>XML-ra ongi gehitu da galdera.</div><br>";
        }

        if (!file_exists('../json/Questions.json')){
          echo "<div class='alert-error'>JSON fitxategia ez da existitzen.</div>";
        }else{
          $data = file_get_contents("../json/Questions.json");
          $array=json_decode($data);
          $assessmentItems = new stdClass();
          $assessmentItems->subject=$_POST['gaia'];
          $assessmentItems->author=$_POST['eposta'];
          $assessmentItems->itemBody=array("p"=>$_POST['galdera']);
          $assessmentItems->correctResponse=array("response"=>$_POST['ezuzena']);
          $assessmentItems->incorrectResponses=array("response"=>array($_POST['eokerra1'],$_POST['eokerra2'],$_POST['eokerra3']));
          $assessmentItemsarray[0] = $assessmentItems;
          array_push($array->assessmentItems, $assessmentItemsarray[0]);
          $jsonData = json_encode($array);
          $jsonData = str_replace('{', '{'.PHP_EOL, $jsonData);
          $jsonData = str_replace(',', ','.PHP_EOL, $jsonData);
          $jsonData = str_replace('}', PHP_EOL.'}', $jsonData);
          file_put_contents("../json/Questions.json",$jsonData);
          echo '<div class="alert-success">Galdera bat JSON fitxategian gehitu da</div>';
        }
  
        echo "<br><p><a href='ShowQuestions.php?eposta=$eposta'> Galderak ikusi</a>";
  
        mysqli_close($esteka);
      }else{
        echo ("<div class='alert-error'>Informazioa ez da zuzena</div>");
      };

      ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
