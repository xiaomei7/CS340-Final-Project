

<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>CS340: Final Project</title>
    <!--
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="icon" type="image/png" href="/favicon.png" />
    <link rel="stylesheet" type="text/css" href="style.css" /> 
  -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">



  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

  <!-- Add to home screen for apple & android devices --> 
  <link rel="apple-touch-icon" href="img/webicons/Linkhub.png">
  <link rel="icon" sizes="192x192" href="img/webicons/Linkhub_icon.png">

  <link href="css/index_CSS.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet'  type='text/css'>


</head>
<body background="http://www.zryxsw.com/data/out/87/1133884-the-elder-scrolls-wallpaper.png">
  <header class = "navbar-inverse" role = "banner">
    <div class= "container">
      <nav role = "navigation">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">HOME</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">

            <li><a href="About.html">About <span class="sr-only">(current)</span></a></li>
            <li><a href="Characters.php">Characters <span class="sr-only">(current)</span></a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Provinces<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="blackmarsh.html">Black Marsh</a></li>
                <li><a href="cyrodiil.html">Cyrodiil</a></li>
                <li><a href="elsweyr.html">Elsweyr</a></li>
                <li><a href="hammerfell.html">Hammerfell</a></li>
                <li><a href="highrock.html">High Rock</a></li>
                <li><a href="morrowind.html">Morrowind</a></li>
                <li><a href="skyrim.html">Skyrim</a></li>
                <li><a href="smmerset.html">Summerset Isles</a></li>
                <li><a href="valenwood.html">Valenwood</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <div>
    <h1> Your Submission is Recorded! </h1>
  </div>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

  <script src="scripts/main.js"> </script>
  <script>
    $(function(){
      $('#p1').on('click',function(){
        $('#p1b').slideToggle(200);
      });
    });
  </script>

  </body>
</html>

<?php

    $dbhost = 'oniddb.cws.oregonstate.edu';
    $dbname = 'guox-db';
    $dbuser = 'guox-db';
    $dbpass = 'RCellOvATpqTBbX5';

    $conn = new mysqli($dbhost, $dbname, $dbpass, $dbuser);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $name = mysql_real_escape_string($_POST['name']);
    $homeland = mysql_real_escape_string($_POST['homeland']);
    $bio = mysql_real_escape_string($_POST['bio']);
    $race = mysql_real_escape_string($_POST['race']);
    //$guild = mysql_real_escape_string($_POST['guild']);

    $guild_string = implode(', ', $_POST['guild']);



    $sql = "INSERT INTO Characters (name, aid, bio, race, cid, homeland) VALUES (
        '$name', 
        (SELECT id FROM Homelands WHERE name='$homeland'), 
        '$bio', 
        '$race', 
        "'. $guild_string .'", 
        '$homeland')";

    

    if ($conn->query($sql) === TRUE) {
        echo " ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>

