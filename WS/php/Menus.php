<?php require_once 'DbConfig.php';

if (isset($_GET['eposta'])) {
  $eposta = $_GET['eposta'];
}

$konektatua = 0;

if(!empty($eposta)){
  $esteka = mysqli_connect ("$zerbitzaria", "$erabiltzailea", "$gakoa", "$db") or die ("Errorea Dbra konektatzerakoan");

  $sqli = "SELECT * FROM users WHERE eposta='$eposta'";
  $result = $esteka->query($sqli);
  
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
    if($konektatua=0){
      echo '<span class="right"><a href="SignUp.php">Erregistratu</a></span>
      <span class="right"><a href="Login.php">Login</a></span>';
    }else{
      echo '<span class="right"><a href="/logout">Logout</a></span>';
    }
  ?>
    
</header>

<nav class='main' id='n1' role='navigation'>
  <span><a href='Layout.php'>Hasiera</a></span>
  <?php
    if($konektatua=1){
      echo "<span><a href='QuestionFormWithImageHtml5.php'>Galdera sortu</a></span>
      <span><a href='ShowQuestionsWithImage.php'>Galderak ikusi</a></span>";
    }
  ?>
  <span><a href='Credits.php'>Kredituak</a></span>
</nav>



