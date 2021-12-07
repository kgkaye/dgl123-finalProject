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
    $dbc = mysqli_connect('localhost', 'root', '', 'simpsons_archive');

    //get checkbox 
    $selected = $_GET['character'] ?? null;

if (isset($selected)) {
    
 foreach ($selected as $key => $value) {
     print $key;
     print '<br>';
     print $value;
     print '<br>';
 }
    
};



    //define query
    $query = 'SELECT * FROM characters';

    if ($r = mysqli_query($dbc, $query)) { //run the query

        while ($row = mysqli_fetch_array($r)) {   
           
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
       
        } 
    
    }else {
        print '<p> could not retrieve data because:<br>' . mysqli_error($dbc) . ' . </p>
        <p> The query was being run was: ' . $query . '</p>';
    }
    mysqli_close($dbc); //close connection

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
