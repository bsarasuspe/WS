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

    if ($konektatua==1){
        $data = file_get_contents("../json/Questions.json");
        $array=json_decode($data);

        echo"<div class='galderakcontainer'>
            <h3>Galderak ikusi (JSON)</h3><br>

            <table style='width:1100px''>
            <tr>
              <th>Egilea</th>
              <th>Enuntziatua</th>
              <th>Erantzun zuzena</th>
            </tr>";

            foreach($array->assessmentItems as $assessmentItem){
                echo"<tr>";
                echo"<td>". $assessmentItem->author . "</td>";
                echo"<td>". $assessmentItem->itemBody->p . "</td>";
                echo"<td>". $assessmentItem->correctResponse->response . "</td>";
                echo"</tr>";
            }
        echo"</table>";
        echo "</div>";
    }else{
        echo '<div class="alert-error">Orri hau ikusteko erabiltzaile erregistratua izan behar zara.</div>';
    }

    ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
