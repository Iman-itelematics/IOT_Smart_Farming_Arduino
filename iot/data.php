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
            $statement=$pdo->prepare("SELECT `timeStamp` as x, temperature as y FROM (SELECT * FROM `templog` ORDER BY `timeStamp` DESC LIMIT 0,100)`templog` ORDER BY `timeStamp` ASC");
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
            $statement=$pdo->prepare("SELECT `timeStamp` as x, humidity as y FROM (SELECT * FROM `templog` ORDER BY `timeStamp` DESC LIMIT 0,100)`templog` ORDER BY `timeStamp` ASC");
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
            $statement=$pdo->prepare("SELECT `timeStamp` as x, presser as y FROM (SELECT * FROM `templog` ORDER BY `timeStamp` DESC LIMIT 0,100)`templog` ORDER BY `timeStamp` ASC");
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
            $statement=$pdo->prepare("SELECT `timeStamp` as x, soiltemperature as y FROM (SELECT * FROM `templog` ORDER BY `timeStamp` DESC LIMIT 0,100)`templog` ORDER BY `timeStamp` ASC");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 11:
            $statement=$pdo->prepare("SELECT `Date` as x, monthProfit as y FROM `cropmonthlydetails` ORDER BY `Date` DESC LIMIT 0,1");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 12:
            $statement=$pdo->prepare("SELECT `Date` as x, monthProfit as y FROM (SELECT * FROM `cropmonthlydetails` ORDER BY `Date` DESC LIMIT 0,80)`templog` ORDER BY `Date` ASC");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 13:
            $statement=$pdo->prepare("SELECT `Date` as x, monthCropYield as y FROM (SELECT * FROM `cropmonthlydetails` ORDER BY `Date` DESC LIMIT 0,80)`templog` ORDER BY `Date` ASC");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        case 14:
            $statement=$pdo->prepare("SELECT DATE_FORMAT(`timeStamp`, '%e %c %Y') as date1,MAX(temperature) as max1,MIN(temperature) as min1 FROM `templog` GROUP BY DATE_FORMAT(`timeStamp`, '%e %c %Y')");
            $statement->execute();
            $results=$statement->fetchAll(PDO::FETCH_ASSOC);
            $json=json_encode($results);
            echo $json;
        break;
        
        default: 
         
            
    }
?>
