
<?php
 //create connection
 $conn = mysqli_connect('localhost', 'root', '', 'simpsons_archive');
 //check connection
 if ($conn->connect_error) {
     die("Contection failed: " . $conn->connect_error);
 }

//  create table
 $sql = "CREATE TABLE characters (
    id VARCHAR(36) PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    age INT(11),    
    occupation VARCHAR(255),
    voiced_by VARCHAR(255),
    image_url VARCHAR(255)
    )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table characters created successfully";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }

//     // json file name
$filename = 'characters.json';

// Read the JSON file into array
$data = file_get_contents($filename); 
$characters = json_decode($data, true); 

//Store data in variables
foreach ($characters as $key => $value) {
         
    $id = $key;
    $first_name = $value['first_name'] ?? "";
    $last_name = $value['last_name'] ?? "";
    $age = $value['age'] ?? "";
    $occupation = $value['occupation'] ?? "";
    $voiced_by = $value['voiced_by'] ?? "";
    $image_url = $value['image_url'] ?? "";
  
//Insert variables into table
    $sql = "INSERT into characters (id, first_name, Last_name, age, occupation, voiced_by, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param('sssisss', $id, $first_name, $last_name, $age, $occupation, $voiced_by, $image_url);
    $statement->execute();
}
 
?>
