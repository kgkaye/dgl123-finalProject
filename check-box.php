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

<?php

$conn = mysqli_connect('localhost', 'root', '', 'simpsons_archive');


if (isset($_GET['character'])) {
    $charcheck = [];
    $charcheck =$_GET['character'];
    foreach($charcheck as $rowchar => $value) {//rowchar
        // print $rowchar;

        //NOT RECOGNIZING ROWCHAR
        $query = 'SELECT * FROM characters WHERE id IN ($rowchar)';
        $results = mysqli_query($conn, $query);
        // var_dump($results);

        // while ($row = mysqli_fetch_array($results)) { 
        //     print_r($row);
        // }

        if(mysqli_num_rows($results) > 0) {
            foreach($results as $rItems) {
                echo 'Item found';
                // print "{$rItems['id']}";
            } 
            
        
        }

    }
    
}

?>
</body>
</html>