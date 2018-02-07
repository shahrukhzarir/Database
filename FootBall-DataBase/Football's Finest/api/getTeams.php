<?php
include ("Scrap.php"); //Connect to DB
if(isset($_GET['comp_id'])){

  $sql = "SELECT *FROM `teams` WHERE competition_id=".$_GET['comp_id'];
  $result = mysqli_query($conn, $sql);
  if($result == NULL){json_encode("There was probleming connecting to the Database please try again later.");
  die();}
  $competitions; $c=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $competitions[$c]=$row;
    $competitions[$c]['Players']['links']['href'] = "/getPlayers?".$competitions[$c]['team_id'];
    $c++;
 }
 echo '<pre>';
 echo json_encode($competitions);
 echo '</pre>';

}
if(!isset($_GET['comp_id']) and !isset($_GET['team_id']) and !(isset($_GET['search']))){
  echo '<pre>';
 $array1 =  array("Please try it with a competition id. To find competition id go to: http://localhost/getCompetitions.php");
  echo json_encode($array1);
  echo '</pre>';
}

if(isset($_GET['search'])){
  $sql = "SELECT *FROM `teams` WHERE teamName='%".$_GET['search']."%'";
  $result = mysqli_query($conn, $sql);
  if($result == NULL){json_encode("There was problem connecting to the Database please try again later.");}
  if(mysqli_num_rows($result)==0){die(json_encode("cannot find requested"));

  die();}
  $competitions; $c=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $competitions[$c]=$row;
    $competitions[$c]['Players']['links']['href'] = "/getPlayers?".$competitions[$c]['team_id'];
    $c++;
 }
 echo '<pre>';
 echo json_encode($competitions);
 echo '</pre>';

}

if(isset($_GET['team_id']))
{
  $sql = "SELECT *FROM `teams` WHERE team_id=".$_GET['team_id'];
  $result = mysqli_query($conn, $sql);
  if($result == NULL){json_encode("There was probleming connecting to the Database please try again later.");
  die();}
  $competitions; $c=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $competitions[$c]=$row;
    $competitions[$c]['Players']['links']['href'] = "/getPlayers?".$competitions[$c]['team_id'];
    $c++;
 }
 echo '<pre>';
 echo json_encode($competitions);
 echo '</pre>';
}
?>
