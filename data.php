<!doctype html>
<html lang="en>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simpsons Archive</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header id="masthead" class="site-header layout-container">
        <a href="/">
            <img class="site-header__logo" src="images/logo.svg" alt="Logo">
        </a>
    </header>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'test2');



    // json file name
$filename = 'characters.json';

// Read the JSON file in PHP
$data = file_get_contents($filename); 
// Convert the JSON String into PHP Array
$array = json_decode($data, true); 

foreach ($array as $key => $value) {
         
    $id = $key;
    $first_name = $value['first_name'] ?? "";
    $last_name = $value['last_name'] ?? "";
    $age = $value['age'] ?? "";
    $occupation = $value['occupation'] ?? "";
    $voiced_by = $value['voiced_by'] ?? "";
    $image_url = $value['image_url'] ?? "";
  

    $sql = "INSERT into array (id, first_name, Last_name, age, occupation, voiced_by, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param('sssisss', $id, $first_name, $last_name, $age, $occupation, $voiced_by, $image_url);
    $statement->execute();

}
    











?>

</body>
</html>