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

     $result = mysqli_query($esteka,"SELECT id,eposta,galdera,erZ,er01,er02,er03,zailtasuna,gaia,argazkia FROM questions");

     if($konektatua==1){
       echo"<div class='galderakcontainer'>
         <h3>Galderak ikusi</h3><br>

         <table style='width:1100px''>
         <tr>
           <th>id</th>
           <th>eposta</th>
           <th>galdera</th>
           <th>ezuzena</th>
           <th>eokerra1</th>
           <th>eokerra2</th>
           <th>eokerra3</th>
           <th>zailtasuna</th>
           <th>gaia</th>
           <th>argazkia</th>
         </tr>";

         while($row = mysqli_fetch_array($result)){
          if($row['argazkia']!=null){
            echo"<tr>";
            echo"<td>". $row['id']. "</td>";
            echo"<td>". $row['eposta']. "</td>";
            echo"<td>". $row['galdera']. "</td>";
            echo"<td>". $row['erZ']. "</td>";
            echo"<td>". $row['er01']. "</td>";
            echo"<td>". $row['er02']. "</td>";
            echo"<td>". $row['er03']. "</td>";
            echo"<td>". $row['zailtasuna']. "</td>";
            echo"<td>". $row['gaia']. "</td>";
            echo'<td><img width="100px" src="data:image/jpeg;base64,'.base64_encode($row['argazkia']).'"/></td>';
          }else{
            echo"<tr>";
            echo"<td>". $row['id']. "</td>";
            echo"<td>". $row['eposta']. "</td>";
            echo"<td>". $row['galdera']. "</td>";
            echo"<td>". $row['erZ']. "</td>";
            echo"<td>". $row['er01']. "</td>";
            echo"<td>". $row['er02']. "</td>";
            echo"<td>". $row['er03']. "</td>";
            echo"<td>". $row['zailtasuna']. "</td>";
            echo"<td>". $row['gaia']. "</td>";
            echo'<td>Irudirik ez</td>';
          }
     

         echo"</tr>";
       }
       echo"</table>";
       echo"</div>";
     }else{
        echo '<div class="alert-error">Orri hau ikusteko erabiltzaile erregistratua izan behar zara.</div>';
     }


   mysqli_close($esteka); ?>

   </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
