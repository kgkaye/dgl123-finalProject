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

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <div id="main" class="site-main">
            <div class="form__container layout-container">
                <div class="form__row layout-row">
                    <div class="form__itemsContainer">
                        <div class="form__imageContainer">
                            <img src="images/simpsons.jpeg" alt="Simpsons" class="form__image">
                        </div>
                        <div class="form__card">
                            <h3 class="form__heading">Select characters to show</h3>                            
                            <form method="get">
                            <ul class="form__items">
                                    <li class="form__item">
                                        <label for="homer">Homer Simpson</label>                                         
                                        <input id="homer" type="checkbox" name="character[homer]">                                
                                    </li>

                                    <li class="form__item">
                                        <label for="marge">Marge Simpson</label>                                                                                           
                                            <input id="marge" type="checkbox" name="character[marge]">                                
                                    </li>

                                    <li class="form__item">
                                        <label for="bart">Bart Simpson</label>                                                                                            
                                            <input id="bart" type="checkbox" name="character[bart]">                                
                                    </li>

                                    <li class="form__item">
                                        <label for="lisa">Lisa Simpson</label>                                                                                              
                                            <input id="lisa" type="checkbox" name="character[lisa]">                                
                                    </li>
                                    
                                    <li class="form__item">
                                        <label for="maggie">Maggie Simpson</label>                                                                                               
                                            <input id="maggie" type="checkbox" name="character[maggie]">                                
                                    </li>

                                    <li class="form__item">
                                        <label for="moe">Moe Szyslak</label>                                                                                                
                                            <input id="moe" type="checkbox" name="character[moe]">                                
                                    </li>
                                </ul>

                                <input class="form__button" type="submit" value="Show Characters">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="characters__container layout-container">
                <div class="characters__row layout-row">
                    <ul class="characters__items">
                        
                    <?php

    //connect and select
    $conn = mysqli_connect('localhost', 'root', '', 'simpsons_archive');

//LOAD CHARACTERS INTO DATABASE
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
      
        $sql = "INSERT into characters (id, first_name, Last_name, age, occupation, voiced_by, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param('sssisss', $id, $first_name, $last_name, $age, $occupation, $voiced_by, $image_url);
        $statement->execute();
    }

//GET USER CHECKED CHARACTERS FROM DB AND DISPLAY
    if (isset($_GET['character'])) {

        $selected = [];
        $selected =$_GET['character'];
        foreach ($selected as $key => $value) {
            
                 //database query
            $query = 'SELECT * FROM characters';
            $results = mysqli_query($conn, $query);
            
            if ($results->num_rows > 0) {  
            
                while ($row = $results->fetch_assoc()) {
                
                    if ($row['id'] == $key) {
?>

                    <li class="characters__itemContainer">
                        <div class="characters__item">                                
                            <img src="<?= $row['image_url'] ?>" alt="<?= $row['id'] ?>" class="characters__image">
                            <div class="characters__info">
                                    <h3 class="characters__name"><?= $row['first_name'] . ' ' . $row['last_name'] ?></h3> 
                                <div class="characters__age characters__attribute">                          
                                    <b>Age:</b> <?= $row['age'] ?>                                                
                                </div>
                                <div class="characters__occupation characters__attribute">
                                    <b>Occupation:</b> <?= $row['occupation'] ?>                                                                                                        
                                </div>
                                <div class="characters__voicedBy characters__attribute">
                                    <b>Voiced by:</b> <?= $row['voiced_by'] ?>                                                                                                        
                                </div>
                            </div>
                        </div>
                    </li>                                                                                                                                                                                                                                                                                                                                            

    <?php
                    }//end if

                }//end while loop

            } else {
            echo '0 results';
            }//end if
        }//end foreach

    } else {
    print 'Please click on one or more characters';
    }//end if
 
    mysqli_close($conn); //close connection

    ?>

                    </ul> 
                </div> 

            </div> <!--end characters-container-->
        </div> <!--end site-main-->
    </div> <!--end content-area-->
</div> <!--end site-content-->
<?php

?>
</body>
</html>
