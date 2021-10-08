<?php require_once 'DbConfig.php';

if (isset($_GET['eposta'])) {
  $eposta = $_GET['eposta'];
}

$konektatua = 0;

if(!empty($eposta)){
  $esteka = mysqli_connect ("$zerbitzaria", "$erabiltzailea", "$gakoa", "$db") or die ("Errorea Dbra konektatzerakoan");

  $sqli = "SELECT * FROM users WHERE eposta='$eposta'";
  $result = $esteka->query($sqli);
  $row = mysqli_fetch_array($result);
  
  if (!($result)) {
    echo "<div class='alert-error'>Error in the query</div><br>". $result -> error;
  }else{
    $rows_cnt = $result->num_rows;
    $esteka->close();
    if ($rows_cnt == 1){
      $konektatua = 1;
    }
  }
}

?>

<div id='page-wrap'>
<header class='main' id='h1'>
  <?php 
    if($konektatua==0){
      echo '<span class="right"><a href="SignUp.php">Erregistratu</a></span>
      <span class="right"><a href="Login.php">Login</a></span>
      <div class="profilekoIrudia"><img src="../images/user.png" width="25px"/></div><div class="profilekoIzena">Anonimoa</div>';
    }else{
      echo '<span class="right"><a href="Logout.php">Logout</a></span>';
      if($row['argazkia']!=null){
        echo '<div class="profilekoIrudia" style="border: 2px solid black;"><img width="25px" src="data:image/jpeg;base64,'.base64_encode($row['argazkia']).'"/></div>';
      }else{
        echo '<div class="profilekoIrudia"><img src="../images/user.png" width="25px"/></div>';
      }
      
      echo "<div class='profilekoIzena'>$eposta</div>";
    }
  ?>
    
</header>

<nav class='main' id='n1' role='navigation'>
  
  <?php
    if($konektatua==1){
      echo "<span><a href='Layout.php?eposta=$eposta'>Hasiera</a></span>
      <span><a href='QuestionFormWithImageHtml5.php?eposta=$eposta'>Galdera sortu</a></span>
      <span><a href='ShowQuestionsWithImage.php?eposta=$eposta'>Galderak ikusi</a></span>
      <span><a href='Credits.php?eposta=$eposta'>Kredituak</a></span>";
    }else{
      echo "<span><a href='Layout.php'>Hasiera</a></span>
      <span><a href='Credits.php'>Kredituak</a></span>";
    }
  ?>
  
</nav>



