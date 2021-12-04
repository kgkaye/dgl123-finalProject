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

    <div class="characters__container layout-container">
        <div class="characters__row layout-row">
            <ul class="characters__items">
    <?php

    //connect and select
    $dbc = mysqli_connect('localhost', 'root', '', 'simpsons_archive');

    //define query
    $query = 'SELECT * FROM characters WHERE occupation IS NOT NULL';

    if ($r = mysqli_query($dbc, $query)) { //run the query

        //retrieve and print every record
    
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

</body>
</html>