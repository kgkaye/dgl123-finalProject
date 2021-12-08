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



//read the json file contents
$jsondata = file_get_contents('characters.json');

 //convert json object to php associative array
 $data = json_decode($jsondata, true);

 $first_name = $data["homer"]['first_name'];
 $last_name = $data["homer"]['last_name'];
 $age = $data["homer"]['age'];
 $occupation = $data["homer"]['occupation'];
 $voiced_by = $data["homer"]['voiced_by'];
 $image_url = $data["homer"]['image_url'];

     //insert into mysql table
     $sql = "INSERT INTO characters(first_name, last_name, age, occupation, voiced_by, imgage_url)
     VALUES('$first_name',
     
//-----------------------------------------------------------------------------
//define query
$query = 'SELECT * FROM characters WHERE occupation IS NOT NULL';

if ($r = mysqli_query($dbc, $query)) { //run the query

    //retrieve and print every record
  
    while ($row = mysqli_fetch_array($r)) {     

?>

    


    //     print "<p>{$row['first_name']} {$row['last_name']}<br>
    //     {$row['age']}<br>
    //     {$row['occupation']}<br>
    //     {$row['voiced_by']}<br>
    //     {$row['image_url']}</p>\n";  
    
<?php
    } 
}else {
    print '<p> could not retrieve data because:<br>' . mysqli_error($dbc) . ' . </p>
    <p> The query was being run was: ' . $query . '</p>';
}
mysqli_close($dbc); //close connection

//---------------------------------------------------------------------------
$selected = $_GET['character'] ?? null;

if (isset($selected)) {
    
 foreach ($selected as $key => $value) {
     print $key;
     print '<br>';
     print $value;
     print '<br>';
 }
    
};
//---------------------------------------------------------------------------
}else {
    print '<p> could not retrieve data because:<br>' . mysqli_error($dbc) . ' . </p>
    <p> The query was being run was: ' . $query . '</p>';
}
//---------------------------------------------------------------------------