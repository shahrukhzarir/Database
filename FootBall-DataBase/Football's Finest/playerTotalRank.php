
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
include ('Scrap.php');
$sql = "SELECT * FROM `top` \n"
    . "ORDER BY `top`.`Points` DESC";
    $result = mysqli_query($conn, $sql);
if($result == NULL){die("Didn't find player");}
$players = array();$c=0;
while($row=mysqli_fetch_assoc($result))
 {  $players[$c]=$row;
    $c++;
 }


  echo '<div class="table-title">';
echo '<h3 style = "color:#D5DDE5;">TOP PLAYER RANKING</h3>';
echo '</div>';
echo' <table class="table-fill">';
echo '<tr>
<th class="text-left">Rank</th>

<th class="text-left">Name</th>
<th class="text-left">Points</th>
<th class="text-left">Starts</th>
<th class="text-left">Goals</th>
<th class="text-left">Assists</th>
<th class="text-left">Clean Sheets</th>
<th class="text-left">Clean Sheets One Half</th>
<th class="text-left">Yellow</th>
<th class="text-left">Red</th>
<th class="text-left">Substitute</th>
<th class="text-left">Came On</th>
<th class="text-left">Taken Off</th>
<th class="text-left">Penalty Saved</th>
<th class="text-left">Penalty Missed</th>
<th class="text-left">Goals Conceded</th>
<th class="text-left">Goals Conceded One Plus</th>
<th class="text-left">Own Plus</th>
</tr>';
for($x = 0; $x<50; $x++){
  $rank = $x +1;
echo' <tr> <td class="text-left">'.$rank.'</td>
  <td class="text-left">'. $players[$x]['Players'].'</td>
  <td class="text-left">'. $players[$x]['Points'].'</td>
  <td class="text-left">'. $players[$x]['Starts'].'</td>
  <td class="text-left">'. $players[$x]['Goals'].'</td>
  <td class="text-left">'. $players[$x]['Assists'].'</td>
  <td class="text-left">'. $players[$x]['Clean_Sheets'].'</td>
  <td class="text-left">'. $players[$x]['Clean_Sheets_One_Half'].'</td>
  <td class="text-left">'. $players[$x]['Yellow'].'</td>
  <td class="text-left">'. $players[$x]['Red'].'</td>
  <td class="text-left">'. $players[$x]['Substitute'].'</td>
  <td class="text-left">'. $players[$x]['Came_On'].'</td>
  <td class="text-left">'. $players[$x]['Taken_Off'].'</td>
  <td class="text-left">'. $players[$x]['Penalty_Saved'].'</td>
  <td class="text-left">'. $players[$x]['Penalty_Missed'].'</td>
  <td class="text-left">'. $players[$x]['Goals_Conceded'].'</td>
  <td class="text-left">'. $players[$x]['Goals_Conceded_One_Plus'].'</td>
  <td class="text-left">'. $players[$x]['Own_Goal'].'</td></tr>';
}
echo '</table>';
?>
</html></body>
