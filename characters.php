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

<!-- MAIN HTML CONTENT-->
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
                            <form method="post">
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

include 'info.php';
checkconn($conn);
ifchecked($character);
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
