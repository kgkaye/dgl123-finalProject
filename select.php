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
    <?php

//create connection
$conn = mysqli_connect('localhost', 'root', '', 'simpsons_archive');
//check conection
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

//create array
$select = [
    'homer',
    'maggie',
    'marge'
];

foreach ($select as $value) {

    //database query
    $query = 'SELECT * FROM characters';
    $results = mysqli_query($conn, $query);

    if ($results->num_rows > 0) {  

            while ($row = $results->fetch_assoc()) {
            
               if ($row['id'] == $value) {
            
                    print "<p>{$row['id']}<br>
                    {$row['first_name']} {$row['last_name']}<br>
                        {$row['age']}<br>
                        {$row['occupation']}<br>
                        {$row['voiced_by']}<br>
                        {$row['image_url']}</p>\n"; 

                }

            }

    } else {
        echo '0 results';
    }
}


?>
</body>
</html>