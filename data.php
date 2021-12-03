<?php
$conn = mysqli_connect('localhost', 'root', '', 'simpsons_archive');
// $name = $_POST['name'];

//https://www.geeksforgeeks.org/how-to-insert-json-data-into-mysql-database-using-php/
$query = '';
$table_data = '';

// json file name
$filename = "characters.json";

// Read the JSON file in PHP
$data = file_get_contents($filename); 

// Convert the JSON String into PHP Array
$array = json_decode($data, true); 

// Extracting row by row
foreach($array as $row) {

    // Database query to insert data 
    // into database Make Multiple 
    // Insert Query 
    $query .= 
    "INSERT INTO characters VALUES 
    ('".$row['name']."', '".$row['first_name']."', 
   '".$row['last_name']."', '".$row['age']."', 
    '".$row['occupation']."', '".$row['voiced_by']."', 
    '".$row["image_url"]."'); "; 
    
    $table_data .= '
    <tr>
        <td>'.$row['name'].'</td>
        <td>'.$row['first_name'].'</td>
        <td>'.$row['last_name'].'</td>
        <td>'.$row['age'].'</td>
        <td>'.$row['occupation'].'</td>
        <td>'.$row['voiced_by'].'</td>
        <td>'.$row['image_url'].'</td>
    </tr>
    '; // Data for display on Web page
}

?>