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
        $assessmentItems=simplexml_load_file('../xml/Questions.xml');
        echo"<div class='galderakcontainer'>
            <h3>Galderak ikusi (XML)</h3><br>

            <table style='width:1100px''>
            <tr>
              <th>Egilea</th>
              <th>Enuntziatua</th>
              <th>Erantzun zuzena</th>
            </tr>";

            foreach($assessmentItems->xpath('//assessmentItem') as $assessmentItem){
                echo"<tr>";
                echo"<td>". (string) $assessmentItem["author"] . "</td>";
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
