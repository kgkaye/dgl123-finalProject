<?php
include 'characters.php';
include 'functions.php';

function showcard($row) {
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
}              

?>