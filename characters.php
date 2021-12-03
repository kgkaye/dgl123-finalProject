<!doctype html>
<html lang="en>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simpsons Archives</title>
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

                            <h3 class="form__heading">
                                Select characters to show
                            </h3>

                            <form method="get">

                                <ul class="form__items">
                                    <li class="form__item">
                                        <label for="homer">Homer Simpson</label>                                         
                                        <input id="homer" type="checkbox" name="homer">                                
                                    </li>

                                    <li class="form__item">
                                        <label for="marge">Marge Simpson</label>                                                                                           
                                            <input id="marge" type="checkbox" name="marge">                                
                                    </li>

                                    <li class="form__item">
                                        <label for="bart">Bart Simpson</label>                                                                                            
                                            <input id="bart" type="checkbox" name="bart">                                
                                    </li>

                                    <li class="form__item">
                                        <label for="lisa">Lisa Simpson</label>                                                                                              
                                            <input id="lisa" type="checkbox" name="lisa">                                
                                    </li>
                                    
                                    <li class="form__item">
                                        <label for="maggie">Maggie Simpson</label>                                                                                               
                                            <input id="maggie" type="checkbox" name="maggie">                                
                                    </li>

                                    <li class="form__item">
                                        <label for="moe">Moe Szyslak</label>                                                                                                
                                            <input id="moe" type="checkbox" name="moe">                                
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
                        <li class="characters__itemContainer">
                            <div class="characters__item">
                                        
                                <img src="images/homer.png" alt="homer" class="characters__image">
                                        
                                <div class="characters__info">

                                        <h3 class="characters__name">Homer Simpson</h3>                                                                                                    
                                    <div class="characters__age characters__attribute">
                                        <b>Age:</b> 40                                                
                                    </div>

                                    <div class="characters__occupation characters__attribute">
                                        <b>Occupation:</b>  Nuclear Safety Inspector                                                                                                        
                                    </div>
                                    <div class="characters__voicedBy characters__attribute">
                                        <b>Voiced by:</b> Dan Castellaneta                                                                                                        
                                    </div>

                                </div>

                            </div>
                        </li>
                                                                                                                                                                                                                                                                                                                                            
                    </ul>
                </div>
                </div>

        </div>
    </div>
</div>
<?php

// include('characters.json');
$jsondata = file_get_contents('characters.json');
$simpsons = json_decode($jsondata, true);
// $characters = include('characters.json');
// $simpsons = json_decode($characters, true);

print_r($simpsons);

?>
</body>
</html>
