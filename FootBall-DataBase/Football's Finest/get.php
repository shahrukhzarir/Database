<?php
$uri = 'http://api.football-data.org/v1/competitions';
$team;
$competitions;
$replace = ['&lt;' => '', '&gt;' => '', '&#039;' => '', '&amp;' => '', '&quot;' => '', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'Ae', '&Auml;' => 'A', 'Å' => 'A', 'Ā' => 'A', 'Ą' => 'A', 'Ă' => 'A', 'Æ' => 'Ae', 'Ç' => 'C', 'Ć' => 'C', 'Č' => 'C', 'Ĉ' => 'C', 'Ċ' => 'C', 'Ď' => 'D', 'Đ' => 'D', 'Ð' => 'D', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ē' => 'E', 'Ę' => 'E', 'Ě' => 'E', 'Ĕ' => 'E', 'Ė' => 'E', 'Ĝ' => 'G', 'Ğ' => 'G', 'Ġ' => 'G', 'Ģ' => 'G', 'Ĥ' => 'H', 'Ħ' => 'H', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ī' => 'I', 'Ĩ' => 'I', 'Ĭ' => 'I', 'Į' => 'I', 'İ' => 'I', 'Ĳ' => 'IJ', 'Ĵ' => 'J', 'Ķ' => 'K', 'Ł' => 'K', 'Ľ' => 'K', 'Ĺ' => 'K', 'Ļ' => 'K', 'Ŀ' => 'K', 'Ñ' => 'N', 'Ń' => 'N', 'Ň' => 'N', 'Ņ' => 'N', 'Ŋ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', '&Ouml;' => 'Oe', 'Ø' => 'O', 'Ō' => 'O', 'Ő' => 'O', 'Ŏ' => 'O', 'Œ' => 'OE', 'Ŕ' => 'R', 'Ř' => 'R', 'Ŗ' => 'R', 'Ś' => 'S', 'Š' => 'S', 'Ş' => 'S', 'Ŝ' => 'S', 'Ș' => 'S', 'Ť' => 'T', 'Ţ' => 'T', 'Ŧ' => 'T', 'Ț' => 'T', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'Ue', 'Ū' => 'U', '&Uuml;' => 'Ue', 'Ů' => 'U', 'Ű' => 'U', 'Ŭ' => 'U', 'Ũ' => 'U', 'Ų' => 'U', 'Ŵ' => 'W', 'Ý' => 'Y', 'Ŷ' => 'Y', 'Ÿ' => 'Y', 'Ź' => 'Z', 'Ž' => 'Z', 'Ż' => 'Z', 'Þ' => 'T', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'ae', '&auml;' => 'ae', 'å' => 'a', 'ā' => 'a', 'ą' => 'a', 'ă' => 'a', 'æ' => 'ae', 'ç' => 'c', 'ć' => 'c', 'č' => 'c', 'ĉ' => 'c', 'ċ' => 'c', 'ď' => 'd', 'đ' => 'd', 'ð' => 'd', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ē' => 'e', 'ę' => 'e', 'ě' => 'e', 'ĕ' => 'e', 'ė' => 'e', 'ƒ' => 'f', 'ĝ' => 'g', 'ğ' => 'g', 'ġ' => 'g', 'ģ' => 'g', 'ĥ' => 'h', 'ħ' => 'h', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ī' => 'i', 'ĩ' => 'i', 'ĭ' => 'i', 'į' => 'i', 'ı' => 'i', 'ĳ' => 'ij', 'ĵ' => 'j', 'ķ' => 'k', 'ĸ' => 'k', 'ł' => 'l', 'ľ' => 'l', 'ĺ' => 'l', 'ļ' => 'l', 'ŀ' => 'l', 'ñ' => 'n', 'ń' => 'n', 'ň' => 'n', 'ņ' => 'n', 'ŉ' => 'n', 'ŋ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', '&ouml;' => 'oe', 'ø' => 'o', 'ō' => 'o', 'ő' => 'o', 'ŏ' => 'o', 'œ' => 'oe', 'ŕ' => 'r', 'ř' => 'r', 'ŗ' => 'r', 'š' => 's', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'ue', 'ū' => 'u', '&uuml;' => 'ue', 'ů' => 'u', 'ű' => 'u', 'ŭ' => 'u', 'ũ' => 'u', 'ų' => 'u', 'ŵ' => 'w', 'ý' => 'y', 'ÿ' => 'y', 'ŷ' => 'y', 'ž' => 'z', 'ż' => 'z', 'ź' => 'z', 'þ' => 't', 'ß' => 'ss', 'ſ' => 'ss', 'ый' => 'iy', 'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Ж' => 'ZH', 'З' => 'Z', 'И' => 'I', 'Й' => 'Y', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C', 'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SCH', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'YU', 'Я' => 'YA', 'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'];

function getJSONdata($uri)
{
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = 'X-Auth-Token: 3f8801d271804a3d98657010c95f4d79';
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $array = json_decode($response, true);
    return $array;
}

function updateCompetitions($uri)
{
    include ('Scrap.php');
    $competitions = getJSONdata($uri);
    for ($x = 0;$x < count($competitions);$x++)
    {
        $id = $competitions[$x]['id'];
        $caption = $competitions[$x]['caption'];
        $year = $competitions[$x]['year'];
        $numberOfTeams = $competitions[$x]['numberOfTeams'];
        $numberOfGames = $competitions[$x]['numberOfGames'];
        $lastUpdated = $competitions[$x]['lastUpdated'];
        $league = $competitions[$x]['league'];

        $sql = "INSERT INTO competitions(competition_id, caption, year, numberOfgames, numberOfteam,lastUpdate, position)
			VALUES('" . $id . "','" . $caption . "','" . $year . "','" . $numberOfTeams . "', '" . $numberOfGames . "','" . $lastUpdated . "','" . $league . "')";
        echo '<br>';
        if (mysqli_query($conn, $sql))
        {
            echo "Worked";
        }

        else
        {
            die("didn't work");
        }

    }
}

function getTeams()
{
    include ('Scrap.php');
    $uri = "https://www.football-data.org/v1/competitions";
    $competionsid;
    $i = 0;
    $sql = "SELECT competition_id FROM `competitions`";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result))
    {
        $competionsid[$i] = $row['competition_id'];
        $i++;
    }
    $sql = "SELECT team_id FROM `teams`";
    $result = mysqli_query($conn, $sql);
    if ($result == NULL)
    {
        die("didn't connect");
    }
    global $team;
    $i = 0;
    while ($row = mysqli_fetch_assoc($result))
    {
        $team[$i] = $row['team_id'];
        $i++;
    }
  //print_r($team);
  //  echo $team[70];
    echo "<br>";

    for ($x = 0;$x < count($competionsid);$x++)
    {
        $teams = getJSONdata($uri . '/' . $competionsid[$x] . '/teams');

        for ($i = 0;$i < $teams['count'];$i++)
        {
            $string = $teams['teams'][$i]['_links']['self']['href'];
            $id = substr(strrchr($string, "/") , 1);
            echo ' ';
            $name = $teams['teams'][$i]['name'];
            $shortName = $teams['teams'][$i]['shortName'];
            $marketValBeforeFinal = $teams['teams'][$i]['squadMarketValue'];
            $array1 = array(
                ",",
                " €"
            );
            $marketValue = str_replace($array1, "", $marketValBeforeFinal);
            //print_r($team);
            echo $id.'<br>';
            echo $team[$i];
            echo $sql = "INSERT INTO `teams`(`team_id`, `competition_id`, `name`, `shortName`, `marketValue`)
            VALUES ('$id','$competionsid[$x]','$name','$shortName','$marketValue')";
            if (mysqli_query($conn, $sql))
            {
                echo "Worked ";
            }

            else
            {
                die(" didn't work ");
            }

        }
    }

}

function getPlayers()
{
    ini_set('max_execution_time', 300);
    global $replace;

    include ('Scrap.php');
    $sql = "SELECT team_id FROM `teams`";
    $result = mysqli_query($conn, $sql);
    if ($result == NULL)
    {
        die("didn't connect");
    }
    global $team;
    $i = 0;
    while ($row = mysqli_fetch_assoc($result))
    {
        $team[$i] = $row['team_id'];
        $i++;
    }
    $c = 0;
    for ($x = 0;$x < count($team);$x++) $uri = "http://api.football-data.org/v1/teams/.'$team[$x]'./players";
    $players = getJSONdata($uri);
    for ($z = 0;$z < $players['count'];$z++)
    {
        $name1 = $players['players'][$z]['name'];
        echo $name = str_replace(array_keys($replace) , $replace, $name1);
        echo " ";
        $jerseyNumber = $players['players'][$z]['jerseyNumber'];
        $dateOfBirth = $players['players'][$z]['dateOfBirth'];
        $contractUntil = $players['players'][$z]['contractUntil'];
        $marketValue1 = $players['players'][$z]['marketValue'];
        $array1 = array(
            ",",
            " €"
        );
        $marketValue = str_replace($array1, "", $marketValue1);
        $position = $players['players'][$z]['position'];
        $nationality = $players['players'][$z]['nationality'];
        $sql = "INSERT INTO players(player_id,name,team_id,jerseyNumber,dateOfBirth, nationality, contractUntil,marketValue,position)
						   VALUES('" . $c . "',
						   '" . $name . "',
						   '87',
						   '" . $jerseyNumber . "',
						   '" . $dateOfBirth . "',
						   '" . $nationality . "',
						   '" . $contractUntil . "',
						   '" . $marketValue . "',
						   '" . $position . "')";

        if (mysqli_query($conn, $sql))
        {
            echo "Worked  ";
        }

        else
        {
            mysqli_errno($conn);
        }
        $c++;
    }

}

function getLeagueTable()
{
    global $uri;
    include ('Scrap.php');
    $sql = "SELECT competition_id FROM competitions";
    $result = mysqli_query($conn, $sql);
    if ($result == NULL)
    {
        die("didn't connect");
    }
    global $competitions;
    $i = 0;
    while ($row = mysqli_fetch_assoc($result))
    {
        $competitions[$i] = $row['competition_id'];
        $i++;
    }
    for ($i = 0;$i < count($competitions);$i++)
    {
        $leagueTable = getJSONdata($uri . "/" . $competitions[$i] . "/leagueTable");
        $keys = array_keys($leagueTable);
        foreach ($keys as $value)
        {
            if ($value == 'standing') $standing = 'standing';
            else $standing = 'standings';
        }
        echo $standing . '<br>';
        if ($standing == 'standing')
        {
            for ($x = 0;$x < count($leagueTable[$standing]);$x++)
            {
                $position = $leagueTable[$standing][$x]['position'];
                $name = $leagueTable[$standing][$x]['teamName'];
                $URIs = $leagueTable[$standing][$x]['crestURI'];
                $playedGames = $leagueTable[$standing][$x]['playedGames'];
                $points = $leagueTable[$standing][$x]['points'];
                $goals = $leagueTable[$standing][$x]['goals'];
                $goalsAgainst = $leagueTable[$standing][$x]['goalsAgainst'];
                $goalDifference = $leagueTable[$standing][$x]['goalDifference'];
                $wins = $leagueTable[$standing][$x]['wins'];
                $draws = $leagueTable[$standing][$x]['draws'];
                $losses = $leagueTable[$standing][$x]['losses'];
                $string = $leagueTable[$standing][$x]['_links']['team']['href'];
                $team_id = substr(strrchr($string, "/") , 1);
                echo $sql = "INSERT INTO `leaguetable`(`competition_id`,`team_id`,`Postion`, `Name`, `Games_Played`, `Matches_Won`, `Matches_Drawn`, `Matches_Lost`, `Goals_For`, `Goals_Against`, `Goal_Difference`, `Points`, `crestURI`)
                   VALUES ('$competitions[$i]','$team_id','$position','$name','$playedGames','$wins','$draws','$losses','$goals','$goalsAgainst','$goalDifference','$points','$URIs')";
                if (mysqli_query($conn, $sql))
                {
                    echo "Worked";
                }
                else
                {
                    mysqli_errno($conn);
                }
            }
        }
        else if ($standing == 'standings')
        {
            for ($z = 'A';$z < 'I';$z++)
            {
                for ($x = 0;$x < count($leagueTable[$standing][$z]);$x++)
                {
                    $position = $leagueTable[$standing][$z][$x]['rank'];
                    $name = $leagueTable[$standing][$z][$x]['team'];
                    $URIs = $leagueTable[$standing][$z][$x]['crestURI'];
                    $playedGames = $leagueTable[$standing][$z][$x]['playedGames'];
                    $points = $leagueTable[$standing][$z][$x]['points'];
                    $goals = $leagueTable[$standing][$z][$x]['goals'];
                    $goalsAgainst = $leagueTable[$standing][$z][$x]['goalsAgainst'];
                    $goalDifference = $leagueTable[$standing][$z][$x]['goalDifference'];
                    $id = $leagueTable[$standing][$z][$x]['teamId'];
                    $group = $leagueTable[$standing][$z][$x]['group'];
                    echo $sql = "INSERT INTO `leaguetable`(`competition_id`,`team_id`,`Postion`, `Name`, `Games_Played`, `Goals_For`, `Goals_Against`, `Goal_Difference`, `Points`,`GroupCL`, `crestURI`)
                  VALUES ('$competitions[$i]','$id','$position','$name','$playedGames','$goals','$goalsAgainst','$goalDifference','$points','$group','$URIs')";
                    if (mysqli_query($conn, $sql))
                    {
                        echo "Worked";
                    }
                    else
                    {
                        die(mysqli_errno($conn));
                    }
                }
            }
        }
    }
}

function webScrap($url)
{
    $html_string = file_get_contents($url);
    $dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadHTML($html_string);
    libxml_clear_errors();
    $xpath = new DOMXpath($dom);
    $values = array();
    $head = array();
    $captions = array();
    $row = $xpath->query('//table[contains(@class,"table uniTable")]/tbody/tr/td');
    $row = $xpath->query('//*[@id="mainContent"]/div/div/div[1]/table/tbody/tr/td');


    $caption = $xpath->query('//table[contains(@class,"table")]/caption/h1');
    $rowHead = $xpath->query('//table[contains(@class,"table uniTable")]/thead/tr/th');
    foreach ($row as $value)
    {
        $values[] = trim($value->textContent);
    }
    print(count($values));
    foreach ($rowHead as $heads)
    {
        $head[] = trim($heads->textContent);
        if(isset($head)){
            $head["WORK"];
        }
    }
        print(count($head));

    foreach ($caption as $value)
    {
        $captions[] = trim($value->textContent);
    }
   $body = array();
   $z = 0;
    
  for($i=0; $i<(count($values)/count($head));$i++)
      for($x=0; $x<count($head);$x++)
      {
          $body[$i][$head[$x]] = $values[$z];
          $z++;
      }
      $body[count($body)] = $captions;


  echo json_encode($body);

    return $body;

}

function updatePlayerStats($string)
{ ini_set('max_execution_time', 300);
  include('Scrap.php');
  if($string == "league2016")
  {
    $compid = array(556,564,562,561,563);
    $tableName = ' `leagueplayers2016`';
  }
  elseif($string == 'cl2016')
  {
    $compid = array(571);
    $tableName = ' `cl2016`';
  }
  for($c=0; $c<count($compid); $c++)
  {
    $url = 'https://www.statbunker.com/competitions/FantasyFootballPlayersStats?comp_id='.$compid[$c];
    $playersStats = webScrap($url);
    for($i=0; $i<(count($playersStats)-1);$i++)
    { $position = $playersStats[$i]['Position'];
      $starts = $playersStats[$i]['Start'];
      $goals = $playersStats[$i]['Goals'];
      $assists = $playersStats[$i]['A'];
      $cleansheets = $playersStats[$i]['CS'];
      $cleansheetspart = $playersStats[$i]['CS part'];
      $yellow = $playersStats[$i]['Yellow'];
      $red = $playersStats[$i]['Red'];
      $sub = $playersStats[$i]['Sub'];
      $Came_On= $playersStats[$i]['CO'];
      $Taken_Off=$playersStats[$i]['Off'];
      $Penalty_Saved = $playersStats[$i]['Pen SV'];
      $Penalty_Missed = $playersStats[$i]['Pen M'];
      $Goals_Conceded = $playersStats[$i]['Goals conceded'];
      $Goals_Conceded_One_Plus = $playersStats[$i]['Conceded 1+'];
      $Own_Goal = $playersStats[$i]['OG'];
      if( $starts == '-')
      {
        $start = "''";
      }
      if ($goals == '-')
      {
          $goals = "''";
      }
      if ($assists == '-')
      {
          $assists = "''";
      }
      if ($cleansheets == '-')
      {
          $cleansheets = "''";
      }
      if ($cleansheetspart == '-')
      {
          $cleansheetspart = "''";
      }
      if ($yellow == '-')
      {
          $yellow = "''";
      }
      if ($red == '-')
      {
          $red = "''";
      }
      if ($sub == '-')
      {
          $sub = "''";
      }
      if ($Came_On == '-')
      {
          $Came_On = "''";
      }
      if ($Taken_Off == '-')
      {
          $Taken_Off = "''";
      }
      if ($Penalty_Saved == '-')
      {
          $Penalty_Saved = "''";
      }
      if ($Penalty_Missed == '-')
      {
          $Penalty_Missed = "''";
      }
      if ($Goals_Conceded == '-')
      {
          $Goals_Conceded = "''";
      }
      if ($Goals_Conceded_One_Plus == '-')
      {
          $Goals_Conceded_One_Plus = "''";
      }
      if ($Own_Goal == '-')
      {
          $Own_Goal = "''";
      }

      echo '<pre>';
      echo  $sql ="UPDATE ".$tableName." SET `Position`='".$position."',`Starts`=".$starts.",`Goals`=".$goals.",`Assists`=".$assists.",
      `Clean_Sheets`=".$cleansheets.",`Clean_Sheets_One_Half`=".$cleansheetspart.",`Yellow`=".$yellow.",`Red`=".$red.",`Substitute`=".$sub.",`Came_On`=".$Came_On.",
      `Taken_Off`=".$Taken_Off.",`Penalty_Saved`=".$Penalty_Saved.",`Penalty_Missed`=".$Penalty_Missed.",`Goals_Conceded`=".$Goals_Conceded.",
      `Goals_Conceded_One_Plus`=".$Goals_Conceded_One_Plus.",`Own_Goal`=".$Own_Goal." WHERE `Players`='".$playersStats[$i]['Players']."'";
      if (mysqli_query($conn, $sql))
      {
          echo "Worked <br>";
      }
      else
      {
          mysqli_errno($conn);
      }
    }

  }
}

function getPlayersStats($string)
{ini_set('max_execution_time', 300);
  include('Scrap.php');
  if($string == "league2018")
  { //$compid = array(515,518,517,516,514);
    //$comp_id = array(398,399,401,394,396);
    //$compid = array(556,564,562,561,563);
    $compid = array(586,600,593,591,594);
    $comp_id = array(445,455,456,452,450);

    $tableName = ' `leagueplayers2018`';
  }
  elseif($string == 'cl2015')
  {
    $compid = array(540);
    $comp_id = array(450);

    $tableName = ' `cl2015`';
  }
  for($c=0; $c<count($compid); $c++)
  {
    $url = 'https://www.statbunker.com/competitions/FantasyFootballPlayersStats?comp_id='.$compid[$c];
    $playersStats = webScrap($url);
    for($i=0; $i<(count($playersStats)-1);$i++)
    { $position = $playersStats[$i]['Position'];
      $starts = $playersStats[$i]['Start'];
      $goals = $playersStats[$i]['Goals'];
      $assists = $playersStats[$i]['A'];
      $cleansheets = $playersStats[$i]['CS'];
      $cleansheetspart = $playersStats[$i]['CS part'];
      $yellow = $playersStats[$i]['Yellow'];
      $red = $playersStats[$i]['Red'];
      $sub = $playersStats[$i]['Sub'];
      $Came_On= $playersStats[$i]['CO'];
      $Taken_Off=$playersStats[$i]['Off'];
      $Penalty_Saved = $playersStats[$i]['Pen SV'];
      $Penalty_Missed = $playersStats[$i]['Pen M'];
      $Goals_Conceded = $playersStats[$i]['Goals conceded'];
      $Goals_Conceded_One_Plus = $playersStats[$i]['Conceded 1+'];
      $Own_Goal = $playersStats[$i]['OG'];
      if( $starts == '-')
      {
        $start = "''";
      }
      if ($goals == '-')
      {
          $goals = "''";
      }
      if ($assists == '-')
      {
          $assists = "''";
      }
      if ($cleansheets == '-')
      {
          $cleansheets = "''";
      }
      if ($cleansheetspart == '-')
      {
          $cleansheetspart = "''";
      }
      if ($yellow == '-')
      {
          $yellow = "''";
      }
      if ($red == '-')
      {
          $red = "''";
      }
      if ($sub == '-')
      {
          $sub = "''";
      }
      if ($Came_On == '-')
      {
          $Came_On = "''";
      }
      if ($Taken_Off == '-')
      {
          $Taken_Off = "''";
      }
      if ($Penalty_Saved == '-')
      {
          $Penalty_Saved = "''";
      }
      if ($Penalty_Missed == '-')
      {
          $Penalty_Missed = "''";
      }
      if ($Goals_Conceded == '-')
      {
          $Goals_Conceded = "''";
      }
      if ($Goals_Conceded_One_Plus == '-')
      {
          $Goals_Conceded_One_Plus = "''";
      }
      if ($Own_Goal == '-')
      {
          $Own_Goal = "''";
      }
      $id = $comp_id[$c];
      echo '<pre>';
      echo  $sql ="INSERT INTO ".$tableName."(`competition_id`, `Players`, `Club`, `Position`, `Starts`, `Goals`, `Assists`, `Clean_Sheets`, `Clean_Sheets_One_Half`, `Yellow`, `Red`, `Substitute`, `Came_On`, `Taken_Off`, `Penalty_Saved`, `Penalty_Missed`, `Goals_Conceded`, `Goals_Conceded_One_Plus`, `Own_Goal`)
      VALUES (".$id.",'".$playersStats[$i]['Players']."','".$playersStats[$i]['Clubs']."','".$position."',".$starts.",".$goals.",".$assists.",".$cleansheets.",".$cleansheetspart.",".$yellow.",".$red."
      ,".$sub.",
      ".$Came_On.",".$Taken_Off.",".$Penalty_Saved.",".$Penalty_Saved.",".$Goals_Conceded.",".$Goals_Conceded_One_Plus.",".$Own_Goal.")";
      if (mysqli_query($conn, $sql))
      {
          echo "Worked <br>";
      }
      else
      {
          mysqli_errno($conn);
      }
    }

  }
}

function getSomething()
{
include ('Scrap.php');
$teamsu = array(10,8,547,555,531,67,68,58,87,82,88,713,470,450);
$competionsid = array(394,394,396,396,396,398,398,398,399,399,399,401,401,401);
for($i=0; $i<count($teamsu);$i++)
{
    $teams = getJSONdata('http://api.football-data.org/v1/teams/'.$teamsu[$i]);
    $name = $teams['name'];
    $shortName = $teams['shortName'];
    $marketValBeforeFinal = $teams['squadMarketValue'];
    $array1 = array(
        ",",
        " €"
    );
    $marketValue = str_replace($array1, "", $marketValBeforeFinal);
    $id = $teamsu[$i];
    echo $sql = "INSERT INTO `teams`(`team_id`, `competition_id`, `name`, `shortName`, `marketValue`)
    VALUES ('$id','$competionsid[$i]','$name','$shortName','$marketValue')";
    if (mysqli_query($conn, $sql))
    {
        echo "Worked ";
    }

    else
    {
        die(" didn't work ");
    }
}}

echo '<pre>';
getPlayersStats('league2018');

?>
