<?php
     session_save_path("./session_path");
    if(!isset($_SESSION))
    session_start();

    $str = $_SESSION['homeland'];
    $arr = preg_split("/([a-zA-Z]+)/", $str, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE); 

    $name = $arr[0];

    include('connect.php');
    $mysqli->select_db("guox-db");
    $sql = "INSERT INTO Charaters (aid, cname, guild, homeland, description, skill, race) VALUES (
         (SELECT id FROM Homeland WHERE name = '$name'),
         ?,?,?,?,?,?)";
    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("sssis", $cname $guild, $description, $skill, $race);
        if($_POST['cname']=='')
            $_POST['cname'] = 'N/A';
        if($_POST['skill']=='')
            $_POST['skill'] = 0;
        if($_POST['guild']=='')
            $_POST['guild'] = 'N/A';

        $guild = $_POST['guild']
        $skill = $_POST['skill'];                
        $description = $_POST['description'];    
        $cname = $_POST['cname'];
        $race = $_POST['race']
    }
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
    header("Location: index.php?page=" . $_SESSION['homeland']);
?>
