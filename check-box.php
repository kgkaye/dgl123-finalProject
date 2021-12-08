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

    $selected = [];
    $selected =$_GET['character'];
    foreach ($selected as $key => $value) {
        

         //database query
    $query = 'SELECT * FROM characters';
    $results = mysqli_query($conn, $query);

    if ($results->num_rows > 0) {  

            while ($row = $results->fetch_assoc()) {
            
               if ($row['id'] == $key) {
            
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
    
} else {
    print 'Please click on one or more characters';
}

?>
</body>
</html>