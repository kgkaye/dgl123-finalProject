
<?php
/*
   Graham Kaye
   Last Updated Dec. 8, 2021
   DGL 123
   Final Project
   purpose of info.php: get selected checkboxes, compare those to data in mysql table,
   print html content using only data from table that match checked boxes.
*/

 
include 'write_table.php';

//Create connection
$conn = mysqli_connect('localhost', 'root', '', 'simpsons_archive');

//Check connection
function checkconn($conn) {
    if ($conn->connect_error) {
        die("Contection failed: " . $conn->connect_error);
    }
}
//character is value of checkbox name
$character = ($_POST['character']);

//Make sure 1 or more checkboxes are selected
function ifchecked($character) {
    if (!isset($character)) {
        die;
    }
}

//Create array to store characters chosen from checkboxes
function checkarr($character) {
    $selected = [];
    $selected = $character;
    return $selected;
}

//Loop through checkbox array, compare those to contents of mysql table,
//print info of content that matches
foreach (checkarr($character) as $key => $value) {
    
    //Get contents of table
    $query = 'SELECT * FROM characters';
    $results = mysqli_query($conn, $query);
    
    if ($results->num_rows > 0) {  
        while ($row = $results->fetch_assoc()) {
        
            if ($row['id'] == $key) {
                
                print '<li class="characters__itemContainer">   
                    <div class="characters__item">'; 

                if (!empty($row['image_url'])) {
                    print "<img src=\"{$row['image_url']}\" alt=\" {$row['id']}\" class=\"characters__image\">";  
                }
                if (!empty($row['first_name']) && !empty($row['last_name'])) {
                    print "<div class=\"characters__info\">
                        <h3 class=\"characters__name\">{$row['first_name']} {$row['last_name']} </h3> ";     
                }
                if (!empty($row['age'])) {
                    print "<div class=\"characters__age characters__attribute\">
                    <b>Age:</b> {$row['age']}                                               
                    </div>";
                }   
                if (!empty($row['occupation'])) { 
                print "<div class=\"characters__occupation characters__attribute\">
                    <b>Occupation:</b> {$row['occupation']}                                                                                                        
                    </div>";
                }
                if (!empty($row['voiced_by'])) {
                    print "<div class=\"characters__voicedBy characters__attribute\">
                    <b>Voiced by:</b> {$row['voiced_by']}                                                                                                       
                    </div>";
                }
                print '</div>
                    </div>
                    </li>';
                
            }//end if
        }//end while loop

    } else {
    echo '0 results';
    }//end if
}//end foreach

mysqli_close($conn); //close connection
   
?>