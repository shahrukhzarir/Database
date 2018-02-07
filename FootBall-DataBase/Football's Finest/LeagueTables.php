<?php
//$_GET['team_id'] = NULL;
include ("Scrap.php");
if(isset($_GET['competition_id']) and !(isset($_GET['team_id']))){
  if($_GET['competition_id'] == 405 || ($_GET['competition_id']) == 440)
  {
  $sql = "SELECT `Postion`, leaguetable.`Name`, `Games_Played`, `Goals_For`, `Goals_Against`, `Goal_Difference`, `Points`,`GroupCL`, `crestURI`, competitions.`year` FROM `leaguetable`,`competitions`\n"
    . "WHERE leaguetable.competition_id=competitions.competition_id AND competitions.competition_id =".$_GET['competition_id'];
  $result = mysqli_query($conn, $sql);
  if($result == NULL){die("didn't connect");}
  $leaguetable; $i = 0;
  while($row=mysqli_fetch_assoc($result))
  {
    $leaguetable[$i]['Postion']=$row['Postion'];
    $leaguetable[$i]['Name']=$row['Name'];
    $leaguetable[$i]['Points']=$row['Points'];
    $leaguetable[$i]['GamesPlayed']=$row['Games_Played'];
    $leaguetable[$i]['GoalsFor']=$row['Goals_For'];
    $leaguetable[$i]['GoalsAgainst']=$row['Goals_Against'];
    $leaguetable[$i]['Goal_Difference']=$row['Goal_Difference'];
    $leaguetable[$i]['URI']=$row['crestURI'];
    $leaguetable[$i]['GroupCL']=$row['GroupCL'];
    $leaguetable[$i]['year']=$row['year'];
   $i++;
  }
$x = $i/4;
 for($c=0; $c<($i/4); $c++)
 { echo '<div class="table-title">
   <h3>Group '.$leaguetable[$c*4]['GroupCL'].'</h3>
   </div>';
   echo' <table class="table-fill">';
 echo '<tr><th class="text-left">Position</th>
 <th class="text-left" colspan = "2">Name</th>
 <th class="text-left">Points</th>
 <th class="text-left">Games Played</th>
 <th class="text-left">Goals For</th>
 <th class="text-left">Goals Against</th>
 <th class="text-left">Goal Difference</th></tr>';

 for($z=$c*4; $z<($c*4+4); $z++){
   echo '<tr>
  <td class="text-left">'. $leaguetable[$z]['Postion'].'</td>
  <td class="text-left"><img src="'.$leaguetable[$z]['URI'].'" style="width:36px;height:36px;"></td>
  <td class="text-left">'.  $leaguetable[$z]['Name'].' </td>
  <td class="text-left">'.$leaguetable[$z]['Points'].'</td>
  <td class="text-left">'.$leaguetable[$z]['GamesPlayed'].'</td>
  <td class="text-left">'.$leaguetable[$z]['GoalsFor'].'</td>
  <td class="text-left">'.$leaguetable[$z]['GoalsAgainst'].'</td>
  <td class="text-left">'. $leaguetable[$z]['Goal_Difference'].'</td>
  </tr>';}
  echo '</table>';
}

}
else
{
     $sql = "SELECT `team_id`,`Postion`, `Name`, `Games_Played`, `Matches_Won`, `Matches_Drawn`, `Matches_Lost`, `Goals_For`, `Goals_Against`, `Goal_Difference`, `Points`, `crestURI`, competitions.`year`FROM `leaguetable`,`competitions`".
     "WHERE leaguetable.competition_id=competitions.competition_id AND competitions.competition_id =".$_GET['competition_id'];
     $result = mysqli_query($conn, $sql);
     if($result == NULL){die("didn't connect");}
     $leaguetable; $i = 0;
     while($row=mysqli_fetch_assoc($result))
     {
       $leaguetable[$i]['Postion']=$row['Postion'];
       $leaguetable[$i]['Name']=$row['Name'];
       $leaguetable[$i]['team_id']=$row['team_id'];
       $leaguetable[$i]['Points']=$row['Points'];
       $leaguetable[$i]['GamesPlayed']=$row['Games_Played'];
       $leaguetable[$i]['MatchesWon']=$row['Matches_Won'];
       $leaguetable[$i]['MatchesDrawn']=$row['Matches_Drawn'];
       $leaguetable[$i]['MatchesLost']=$row['Matches_Lost'];
       $leaguetable[$i]['GoalsFor']=$row['Goals_For'];
       $leaguetable[$i]['GoalsAgainst']=$row['Goals_Against'];
       $leaguetable[$i]['Goal_Difference']=$row['Goal_Difference'];
       $leaguetable[$i]['URI']=$row['crestURI'];
       $leaguetable[$i]['year']=$row['year'];
       $i++;
     }

    echo' <table class="table-fill">';
    echo '<tr><th class="text-left">Position</th>
    <th class="text-left" colspan = "2">Name</th>
    <th class="text-left">Points</th>
    <th class="text-left">Games Played</th>
    <th class="text-left">Matches Won</th>
    <th class ="text-left">Matches Drawn</th>
    <th class="text-left">Matches Lost</th>
    <th class="text-left">Goals For</th>
    <th class="text-left">Goals Against</th>
    <th class="text-left">Goal Difference</th></tr>';
    for($i =0; $i<count($leaguetable); $i++){
    echo '<tr>
     <td class="text-left">'. $leaguetable[$i]['Postion'].'</td>
     <td class="text-left"><img src="'.$leaguetable[$i]['URI'].'" style="width:36px;height:36px;"></td>
     <td class="text-left"><a href="?team_id='.$leaguetable[$i]['team_id'].'&competition_id='.$_GET['competition_id'].'&year='. $leaguetable[$i]['year'].'">'.$leaguetable[$i]['Name'].' </td>
     <td class="text-left">'.$leaguetable[$i]['Points'].'</td>
     <td class="text-left">'.$leaguetable[$i]['GamesPlayed'].'</td>
     <td class="text-left">'.$leaguetable[$i]['MatchesWon'].'</td>
     <td class="text-left">'.$leaguetable[$i]['MatchesDrawn'].'</td>
     <td class="text-left">'.$leaguetable[$i]['MatchesLost'].'</td>
     <td class="text-left">'.$leaguetable[$i]['GoalsFor'].'</td>
     <td class="text-left">'.$leaguetable[$i]['GoalsAgainst'].'</td>
     <td class="text-left">'. $leaguetable[$i]['Goal_Difference'].'</td>
     </tr>';}
     echo '</table>';

}
}
 else if(isset($_GET['team_id']) and isset($_GET['competition_id']) and isset($_GET['year'])){
     $sql = "SELECT * FROM `leagueplayers".$_GET['year']."`, `teams` WHERE teams.team_id = leagueplayers".$_GET['year'].".team_id AND teams.team_id=".$_GET['team_id'];
     $result = mysqli_query($conn, $sql);
     if($result == NULL){die("didn't connect");}
     $players; $c = 0;
     while($row=mysqli_fetch_assoc($result))
     {
       $players[$c]['name']=$row['Players'];
       $players[$c]['Position']=$row['Position'];
       $players['teamName']=$row['name'];
       $player[$c]['player_id'] = $row['player_id'];
       $c++;
     }
         echo '<div class="table-title">';
         $year1 = $_GET['year'] + 1;
         echo '<h3>'.$players['teamName'].' Team Sheet '.$_GET['year'].'/'.$year1.'</h3>
         </div>';
         echo' <table class="table-fill">';
         echo '<tr><th class="text-left">Name</th>
         <th class="text-left">Position</th>
         </tr>';
         for($i =0; $i<count($players)-1; $i++){
         echo '<tr>
         <td class="text-left"><a href="?player_id='.$player[$i]['player_id'].'&year='.$_GET['year'].'">'. $players[$i]['name'].'</a></td>
         <td class="text-left">'. $players[$i]['Position'].'</td>
         </tr>';}
         echo '</table>';


    }
    elseif(isset($_GET['player_id']) and isset($_GET['year']))
    {
      $sql = "SELECT * FROM `leagueplayers".$_GET['year']."` WHERE player_id=".$_GET['player_id'];
      $result = mysqli_query($conn, $sql);
      if($result == NULL){die("didn't connect");}
      $players; $c = 0;
      while($row=mysqli_fetch_assoc($result))
      {
        $players[$c]=$row;

        $c++;
      }
         echo '<div class="table-title">';
           echo '<h3>'.$players[0]['Players'].'</h3>
           </div>';
           echo' <table class="table-fill">';
           echo '<tr><th class="text-left">Starts</th>
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
           echo '<tr>
           <td class="text-left">'. $players[0]['Starts'].'</td>
           <td class="text-left">'. $players[0]['Goals'].'</td>
           <td class="text-left">'. $players[0]['Assists'].'</td>
           <td class="text-left">'. $players[0]['Clean_Sheets'].'</td>
           <td class="text-left">'. $players[0]['Clean_Sheets_One_Half'].'</td>
           <td class="text-left">'. $players[0]['Yellow'].'</td>
           <td class="text-left">'. $players[0]['Red'].'</td>
           <td class="text-left">'. $players[0]['Substitute'].'</td>
           <td class="text-left">'. $players[0]['Came_On'].'</td>
           <td class="text-left">'. $players[0]['Taken_Off'].'</td>
           <td class="text-left">'. $players[0]['Penalty_Saved'].'</td>
           <td class="text-left">'. $players[0]['Penalty_Missed'].'</td>
           <td class="text-left">'. $players[0]['Goals_Conceded'].'</td>
           <td class="text-left">'. $players[0]['Goals_Conceded_One_Plus'].'</td>
           <td class="text-left">'. $players[0]['Own_Goal'].'</td>
           </tr>';
           echo '</table>';

     }





 ?>
