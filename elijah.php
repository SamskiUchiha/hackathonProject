<?php

include 'dbConnection.php';
$dbConn = startConnection("mapIt");
include 'functions.php';

// $counter = 0;
// $pictures = array();
// $target_dir = "img/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         // echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// // Check if file already exists
// // if (file_exists($target_file)) {
// //     echo "Sorry, file already exists.";
// //     $uploadOk = 0;
// // }
// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 5000000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
//     echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
//     $uploadOk = 0;
// }
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//         $counter++;
        
//         $temp = $_FILES["fileToUpload"]["name"];
//         array_push($pictures, $temp);
//         // printf($temp);
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }

// function showImages()
// {
//     global $pictures;
//     // printf($pictures[2]);
//     // echo "<br>";
//     // printf($pictures[1]);
//     // echo "<br>";
//     printf($pictures[0]);
//     echo "<br>";
//     for ($i = $counter - 1; $i >= 0; $i--)
//     {
//         echo "<img src='img/".$pictures[$i]."'></img>";
//     }
// }

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    $disaster = $_GET['disaster'];
    $location =  $_GET['location'];
    
    if ($location == "csumb")
    {
        $latitude = 36.65003;
        $longitude = -121.794197;
    }
    if ($location == "sandCity")
    {
        $latitude = 36.6171819;
        $longitude = -121.84828549999997;
    }
    if ($location == "monterey")
    {
        $latitude = 36.6002378;
        $longitude = -121.89467609999997;
    }
    if ($location == "salinas")
    {
        $latitude = 36.6777372;
        $longitude = -121.65550129999997;
    }
    if ($location == "carmel")
    {
        $latitude = 36.5552386;
        $longitude = -121.92328789999999;
    }
    if ($location == "marina")
    {
        $latitude = 36.68440289999999;
        $longitude = -121.80217299999998;
    }
    if ($location == "seaside")
    {
        $latitude = 36.6149217;
        $longitude = -121.82209799999998;
    }
    
    
    $sql = "INSERT INTO reports (latitude, longitude, disasterType, reportId) 
            VALUES (:latitude, :longitude, :disasterType, :reportId);";
    $np = array();
    $np[":disaster"] = $disaster;
    $np[":location"] = $location;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New disaster was added!";
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> MapIt </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="title">MapIt</div>
        <br>
        <form>
            Choose a Disaster: 
            <select id="disaster">
                <option value="earthquake">Earthquake</option>
                <option value="flood">Flood</option>
                <option value="blackout">Blackout</option>
                <option value="sinkhole">Sinkhole</option>
                <option value="mudslide">Mudslide</option>
                <option value="thunderstorm">Thunderstorm</option>
                <option value="tornado">Tornado</option>
                <option value="blizzard">Blizzard</option>
                <option value="avalanche">Avalanche</option>
                <option value="volcano">Volcanic Eruption</option>
                <option value="tsunami">Tsunami</option>
            </select>
            <br><br>
            Choose the location nearest to you: 
            <select id="location">
                <option value="csumb">CSUMB</option>
                <option value="sandCity">Sand City</option>
                <option value="monterey">Monterey</option>
                <option value="salinas">Salinas</option>
                <option value="carmel">Carmel</option>
                <option value="marina">Marina</option>
                <option value="seaside">Seaside</option>
            </select>
            <br><br>
        </form>
        <form action="index.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br><br>
            <input type="submit" value="addProduct" name="submit">
        </form>
        

        
    </body>
</html>