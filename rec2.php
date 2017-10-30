<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Рецепты</title>

        <!-- load stylesheets -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
        <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
        <link rel="stylesheet" href="css/magnific-popup.css">                                <!-- Magnific pop up style, http://dimsemenov.com/plugins/magnific-popup/ -->
        <link rel="stylesheet" href="css/templatemo-style.css">                                   <!-- Templatemo style -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          
          <![endif]-->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    </head>
    <body>        
        <div class="container">
            <div class="row">
                <div class="tm-left-right-container">

                    <div class="tm-blue-bg tm-left-column">                        
                        <div class="tm-logo-div text-xs-center">
                           <!--  <img src="img/tm-neaty-logo.png" alt="Logo"> -->
                            <a href="index.php"><img src="img/logo.png" alt="Logo"></a>
                            <h1 class="tm-site-name"><a href="index.php">Рецепт</a></h1>		
                        </div>
                        <nav class="tm-main-nav">
                            <ul class="tm-main-nav-ul">
                                <li class="tm-nav-item">
                                    <a href="index.php" class="tm-nav-item-link">Главная</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="index.php#bakerygallery" class="tm-nav-item-link">Выпечка</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="index.php#dessertgallery" class="tm-nav-item-link">Десерты</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="index.php#drinkgallery" class="tm-nav-item-link">Напитки</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="index.php#addrecept" class="tm-nav-item-link">Предложить свой рецепт</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="index.php#subscribe" class="tm-nav-item-link">Подписаться на нас</a>
                                </li>
                            </ul>
                        </nav>                                         
                    </div> 

                    <div class="tm-right-column">
                        <figure>
                            <img src="img/01.jpg" alt="Header image" class="img-fluid">    
                        </figure>

                        <div class="tm-content-div">
                            <section id="rec1" class="tm-section">
                                <header>
                                    <h2 class="tm-blue-text tm-welcome-title tm-margin-b-45">Блабла</h2>
                                </header>
                                <div class="row"> 
                                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 push-lg-4 push-md-5">
                                        <input type="hidden" name="recept1" value="5">
                                        <p class ="ingr">Ингредиенты:</p>
                                        <?php
                                        // Соединиться с сервером БД
                                        $link = mysqli_connect("localhost", "root", "", "recepts") or die(mysqli_error());

                                        // SQL-запрос
                                        $strSQL = "SELECT * FROM `ingredient` where idR = 1";

                                        // Выполнить запрос (набор данных $rs содержит результат)
                                        $rs = mysqli_query($link, $strSQL);

                                        // Цикл по recordset $rs
                                        // Каждый ряд становится массивом ($row) с помощью функции mysql_fetch_array
                                        while ($row = mysqli_fetch_array($rs)) {
                                            echo $row['Name'] . " ";
                                            echo $row['Count'] . " ";
                                            echo $row['UnitOfM'] . "<br />";
                                        }

                                        // Закрыть соединение с БД
                                        mysqli_close($link);
                                        ?>
                                        <br>
                                        <p>Продолжаю штудировать старые кулинарные книги. На этот раз мне помогла мамина кулинарная библиотека, т.е. книга «Рыбные блюда» 1959 г. издания. К сожалению, она почти без картинок и уж совсем без фотографий, поэтому форму и дизайн пирога пришлось сочинять на ходу. Название написано именно так, без кавычек, из чего полагаю, что рецепт аутентичный.</p>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 pull-lg-8 pull-md-7 tm-about-img-container">
                                        <img src="img/04.jpg" alt="Image" class="img-fluid">    
                                    </div> 
                                </div>
                            </section>
                            <footer>
                                <p class="tm-copyright-p">Copyright &copy; <span class="tm-current-year">2017</span> Your Company 
                                    | Designed by M</p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>	
        </div>			
    </body>
