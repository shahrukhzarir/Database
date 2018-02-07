<html>
<title>Football's Finest</title>
<head>
  <a href = "main.php"><img src ="logo.png"></a>
  <link rel="stylesheet" type="text/css" href="file.css">
</head>
<ul>
  <li class = "dropdown">
    <a href="#" class="dropbtn">Leagues</a>
  <div class= "dropdown-content">

<?php
  include ("Scrap.php");
  $sql = "SELECT competition_id, caption FROM `competitions`";
  $result = mysqli_query($conn, $sql);
  if($result == NULL){die("didn't connect");}
  $leagues; $i = 0;
  while($row=mysqli_fetch_assoc($result))
  {
    $leagues[$i]=$row['competition_id'];
    $leagues['name'][$i] = $row['caption'];
    $i++;
 }// echo print_r($leagues);
  for($x=0; $x<count($leagues)-1; $x++){
  echo "<a href=?competition_id=".$leagues[$x].">".$leagues['name'][$x]."</a>";
}?></div></li>
<li class = "dropdown"><a href="comparePlayer.php" class="dropbtn">
Compare Two Players</a></li>
<li class = "dropdown"><a href="playerTotalRank.php" class="dropbtn">
Player Ranks
</a></li></ul>

<?php
if(!isset($_GET['competition_id']) and !isset($_GET['team_id'])and !isset($_GET['player_id'])){
  echo '<center style = "color:#ecf0f1;"><h1> WELCOME TO FOOTBALLS FINEST</h1>
 <h3 align = "center"> Please select a function from the bar above. Thank You.</h3></center>';
}
include("LeagueTables.php")



    ?>
    </body>
    </html>
