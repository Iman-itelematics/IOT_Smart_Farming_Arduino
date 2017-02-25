<?php
    header('Content-Type: application/json');
    $pdo=new PDO("mysql:dbname=iot;host=localhost","root","");

    switch($_GET['q']){
        case 1:
            $statement=$pdo->prepare("SELECT `timeStamp` as x, temperature as y FROM `templog` ORDER BY `timeStamp` DESC LIMIT 0,1");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 2:
            $statement=$pdo->prepare("SELECT `timeStamp` as x, temperature as y FROM `templog` ORDER BY `timeStamp` ASC");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 3:
            $statement=$pdo->prepare("SELECT * FROM `templog` ORDER BY `timeStamp` DESC LIMIT 0,1");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 4:
            $statement=$pdo->prepare("SELECT * FROM `templog` ORDER BY `timeStamp` ASC");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 5:
            $statement=$pdo->prepare("SELECT `timeStamp` as x, humidity as y FROM `templog` ORDER BY `timeStamp` DESC LIMIT 0,1");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 6:
            $statement=$pdo->prepare("SELECT `timeStamp` as x, humidity as y FROM `templog` ORDER BY `timeStamp` ASC");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 7:
            $statement=$pdo->prepare("SELECT `timeStamp` as x, presser as y FROM `templog` ORDER BY `timeStamp` DESC LIMIT 0,1");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 8:
            $statement=$pdo->prepare("SELECT `timeStamp` as x, presser as y FROM `templog` ORDER BY `timeStamp` ASC");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 9:
            $statement=$pdo->prepare("SELECT `timeStamp` as x, soiltemperature as y FROM `templog` ORDER BY `timeStamp` DESC LIMIT 0,1");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 10:
            $statement=$pdo->prepare("SELECT `timeStamp` as x, soiltemperature as y FROM `templog` ORDER BY `timeStamp` ASC");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        default:
            
    }
?>
