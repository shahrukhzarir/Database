<?php
include ("Scrap.php"); //Connect to DB
if(isset($_GET['team_id'])){


  $sql = "SELECT *FROM `leagueplayers2016` WHERE team_id=".$_GET['team_id'];
  $result = mysqli_query($conn, $sql);
  if($result == NULL){json_encode("There was probleming connecting to the Database please try again later.");
  die();}
  $competitions; $c=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $competitions[$c]=$row;
    $c++;
 }
 
 echo '<pre>';
 echo json_encode($competitions);
 echo '</pre>';

}
if(!isset($_GET['player_id']) and !isset($_GET['team_id']) and !(isset($_GET['search']))){
  echo '<pre>';
 $array1 =  array("Please try it with a team id. To find competition id go to: http://localhost/getCompetitions.php and then to  http://localhost/getTeams.php to find you team id");
  echo json_encode($array1);
  echo '</pre>';
}

if(isset($_GET['search'])){
    $sql = "SELECT *FROM `leagueplayers2016` WHERE  Players LIKE '%".$_GET['search']."%'";
  $result = mysqli_query($conn, $sql);
  if($result == NULL){json_encode("There was problem connecting to the Database please try again later.");}
  if(mysqli_num_rows($result)==0){die("<pre>".json_encode("cannot find requested")."</pre>");

  die();}
  $competitions; $c=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $competitions[$c]=$row;
    $c++;
 }
 echo '<pre>';
 echo json_encode($competitions);
 echo '</pre>';
 }
 if(isset($_GET['player_id']))
 {
   $sql = "SELECT *FROM `leagueplayers2016` WHERE player_id=".$_GET['player_id'];
   $result = mysqli_query($conn, $sql);
   if($result == NULL){json_encode("There was probleming connecting to the Database please try again later.");
   die();}
   $competitions; $c=0;
   while($row=mysqli_fetch_assoc($result))
   {
     $competitions[$c]=$row;
     //$competitions[$c]['Players']['links']['href'] = "/getPlayers?".$competitions[$c]['team_id'];
     $c++;
  }
  echo '<pre>';
  echo json_encode($competitions);
  echo '</pre>';


}
?>
