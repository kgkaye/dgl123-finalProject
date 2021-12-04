<?php

//connect and select
$dbc = mysqli_connect('localhost', 'root', '', 'simpsons_archive');

//define query
$query = 'SELECT * FROM characters';

if ($r = mysqli_query($dbc, $query)) { //run the query

    //retrieve and print every record
    while ($row = mysqli_fetch_array($r)) {
        print "<p>{$row['first_name']}<br>
        {$row['last_name']}<br>
        {$row['age']}<br>
        {$row['occupation']}<br>
        {$row['voiced_by']}<br>
        {$row['image_url']}</p>\n";
    } 
}else {
    print '<p> could not retrieve data because:<br>' . mysql_error($dbc) . ' . </p>
    <p> The query was being run was: ' . $query . '</p>';
}
mysqli_close($dbc); //close connection



?>