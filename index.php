<?php
    require("./libs/Database.php");
    $db = new Database();
    $db->connect();

    $query = "SELECT * FROM test";
    $resultRaw =$db->query($query);

    $result = array();
    while($row=$resultRaw->fetch_array()){
        $record["id"] = $row[0];
        $record["name"] = $row[1];
        $record["lastname"] = $row[2];
        // $record["korisnickoime"] = $row[3];
        // $record["pokusaj"] = $row[4];
        $result[] = $record;
    }
    $db->disconnect();
    header("Content-Type: application/json");
    echo json_encode($result);
?>

