<html>
<title>Football's Finest</title>
<head>
<style>
.box {
  float: left;
  width: 500px;
  height: 500px;
  margin: 10px;
  border: 3px solid #333;
  display: inline-block;
}
input[type=text] {
  input[type=text] {
  border: none;
  border-bottom: 2px #333;
}
}
</style>
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
<li class = "dropdown"><a href="#" class="dropbtn">
  Compare Two Players</a></li>
  <li class = "dropdown"><a href="playerTotalRank.php" class="dropbtn">
  Player Ranks
  </a></li></ul>

<body>
  <center><table>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="Get" style="position:inline-block">
<tr><th>Search for Player One:</td>
<th>  <input type="text" name="playerone"></th>
<th>  Second Player:
<th>  <input type="text" name="playertwo"  ><center></th>
<th>  <input type="submit" name="submit" value="submit" >
</th></tr></table></center>

</form>
<body>


  <?php
  if(isset($_GET['submit']))
  {if(isset($_GET['playerone']) and isset($_GET['playertwo'])){
  include ('Scrap.php');
  if($_GET['playerone'] == ''){echo "<h3> Please enter Player One </h3>";}
  else{
   $sql = "SELECT * FROM leagueplayers2016 WHERE Players LIKE '%".$_GET['playerone']."%'";
   $result = mysqli_query($conn, $sql);
   if($result == NULL){die("Didn't find player".$_GET['playerone']);}
   $players1 = array();$c=0;
   if(mysqli_num_rows($result)==0){die("Didn't find player ".$_GET['playerone']);}
   while($row=mysqli_fetch_assoc($result))
    {  $players1[$c]=$row;
       $c++;
    }

    if(count($players1)>1){
    echo' <center>
    <ul style ="background-color = #333; width:400px; padding: 10px; text-align:center"
      <li class = "dropdown">
        <a href="#" class="dropbtn">'.$players1[0]['Players'].'</a>
      <div class= "dropdown-content">';


        for($x=0; $x<count($players1); $x++){
          $playerone = urlencode($players1[$x]['Players']);
          $playertwo = urlencode($_GET['playertwo']);

          echo "<a href=?playerone=".$playerone."&playertwo=".$playertwo."&submit= ".$_GET['submit'].">".$players1[$x]['Players']."</a><br>";
          //echo '<option value ='.$playerone.'>';
      }
      echo '</div></li></ul></center>';
      }
    else
   {
     echo '<div class="table-title">';
   echo '<h3 style = "color:#D5DDE5;">'.$_GET['playerone'].' vs '.$_GET['playertwo'].'</h3>';
   echo '</div>';
   echo' <table class="table-fill">';
   echo '<tr>
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
   echo '<tr>
   <td class="text-left">'. $players1[0]['Players'].'</td>
   <td class="text-left">'. $players1[0]['Points'].'</td>
   <td class="text-left">'. $players1[0]['Starts'].'</td>
   <td class="text-left">'. $players1[0]['Goals'].'</td>
   <td class="text-left">'. $players1[0]['Assists'].'</td>
   <td class="text-left">'. $players1[0]['Clean_Sheets'].'</td>
   <td class="text-left">'. $players1[0]['Clean_Sheets_One_Half'].'</td>
   <td class="text-left">'. $players1[0]['Yellow'].'</td>
   <td class="text-left">'. $players1[0]['Red'].'</td>
   <td class="text-left">'. $players1[0]['Substitute'].'</td>
   <td class="text-left">'. $players1[0]['Came_On'].'</td>
   <td class="text-left">'. $players1[0]['Taken_Off'].'</td>
   <td class="text-left">'. $players1[0]['Penalty_Saved'].'</td>
   <td class="text-left">'. $players1[0]['Penalty_Missed'].'</td>
   <td class="text-left">'. $players1[0]['Goals_Conceded'].'</td>
   <td class="text-left">'. $players1[0]['Goals_Conceded_One_Plus'].'</td>
   <td class="text-left">'. $players1[0]['Own_Goal'].'</td>
   </tr>';
  if($_GET['playertwo']==''){
    echo '</table>';
  }
   //print_r($players1);

   }
  }

   if($_GET['playertwo'] == ''){echo "<h3> Please enter Player Two </h3>";}
   else{
   $sql = "SELECT * FROM leagueplayers2016 WHERE Players LIKE '%".$_GET['playertwo']."%'";
    $result = mysqli_query($conn, $sql);
    if($result == NULL){die("Didn't find player".$_GET['playertwo']);}
    if(mysqli_num_rows($result)==0){die("<h3 style = 'color:red;'><center>Error: Didn't find player ".$_GET['playertwo'].". Please Try Again</h3></center>");}
    $players;$c=0;
      while($row=mysqli_fetch_assoc($result))
      {
        //print_r($row);
        $players[$c] = $row;
        $c++;
     }
     //print_r($players);
     if(count($players)>1){
     echo' <center>
     <ul style ="background-color = #333; width:400px; padding: 10px; text-align:center"
       <li class = "dropdown">
         <a href="#" class="dropbtn">'.$players[0]['Players'].'</a>
       <div class= "dropdown-content">';


         for($x=0; $x<count($players); $x++){
           $playertwo = urlencode($players[$x]['Players']);
           $playerone = urlencode($_GET['playerone']);
           echo "<a href=?playertwo=".$playerone."&playertwo=".$playerone."&submit=submit>".$players[$x]['Players']."</a><br>";
           //echo '<option value ='.$playerone.'>';
       }
     }
     else
    { if($_GET['playerone']==''){
      echo '<div class="table-title">';
    echo '<h3 style = "color:#D5DDE5;">'.$_GET['playerone'].' vs '.$_GET['playertwo'].'</h3>';
    echo '</div>';
    echo' <table class="table-fill">';
    echo '<tr>
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
    }
      echo '<tr>
      <td class="text-left">'. $players[0]['Players'].'</td>
      <td class="text-left">'. $players[0]['Points'].'</td>
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

      if($players[0]['Points'] >  $players1[0]['Points']){
        echo '<br><center><h3>'. $players[0]['Players'].' is the WINNER</h3>';
      }
      else {  echo '<br><center><h3>'. $players1[0]['Players'].' is the WINNER</h3>';}
    }
  }
  }

}
    ?>
    </body>
    </html>
