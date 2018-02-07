<?php
include ("Scrap.php"); //Connect to DB
if(isset($_GET['comp_id'])){

  $sql = "SELECT *FROM `competitions` WHERE competition_id=".$_GET['comp_id'];
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
if(!isset($_GET['comp_id']) and !isset($_GET['search'])){
  $sql = "SELECT *FROM `competitions`";
$result = mysqli_query($conn, $sql);
if($result == NULL){json_encode("There was problem connecting to the Database please try again later.");
die();}
$competitions; $c=0;
while($row=mysqli_fetch_assoc($result))
{
  $competitions[$c]=$row;
  $competitions[$c]['Teams']['links']['href'] = "/getTeams?".$competitions[$c]['competition_id'];
  $c++;
}
echo '<pre>';
echo json_encode($competitions);
echo '</pre>';

}

if(isset($_GET['search'])){

  $sql = "SELECT *FROM `competitions` WHERE  caption LIKE '%".$_GET['search']."%'";
  $result = mysqli_query($conn, $sql);
  if($result == NULL){json_encode("There was problem connecting to the Database please try again later.");}
  if(mysqli_num_rows($result)==0){die("<pre>".json_encode("cannot find requested")."<pre>");

  die();}
  $competitions; $c=0;
  while($row=mysqli_fetch_assoc($result))
  {
    $competitions[$c]=$row;
    $competitions[$c]['Teams']['links']['href'] = "/getTeams?".$competitions[$c]['competition_id'];
    $c++;
 }
 echo '<pre>';
 echo json_encode($competitions);
 echo '</pre>';

}
