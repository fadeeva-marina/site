<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Рецепты</title>

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- Magnific pop up style, http://dimsemenov.com/plugins/magnific-popup/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">                                   <!-- Templatemo style -->
    <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Magnific pop-up (http://dimsemenov.com/plugins/magnific-popup/) -->
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script src="js/func.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>

        td select,
        td input {
            width: 150px;
        }

        label {
            display: block;
        }

        .error input,
        .error textarea {
            border: 1px solid red;
        }

    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="tm-left-right-container">
            <!-- Left column: logo and menu -->
            <div class="tm-blue-bg tm-left-column">
                <div class="tm-logo-div text-xs-center">
                    <!--  <img src="img/tm-neaty-logo.png" alt="Logo"> -->
                    <a href="/index.php"><img src="img/logo.png" alt="Logo"></a>
                    <h1 class="tm-site-name"><a href="#welcome">Рецепт</a></h1>
                </div>
                <nav class="tm-main-nav">
                    <ul class="tm-main-nav-ul">
                        <li class="tm-nav-item">
                            <a href="/index.php" class="tm-nav-item-link">Главная</a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="/index.php#bakerygallery" class="tm-nav-item-link">Выпечка</a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#dessertgallery" class="tm-nav-item-link">Десерты</a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#drinkgallery" class="tm-nav-item-link">Напитки</a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#addrecept" class="tm-nav-item-link">Предложить свой рецепт</a>
                        </li>
                        <li class="tm-nav-item">
                            <a href="#subscribe" class="tm-nav-item-link">Подписаться на нас</a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- Left column: logo and menu -->

            <!-- Right column: content -->
            <div class="tm-right-column">
                <figure>
                    <img src="img/neaty-01.jpg" alt="Header image" class="img-fluid">
                </figure>

                <div class="tm-content-div">
                    <?php include 'application/views/' . $content_view; ?>
                    <footer>
                        <p class="tm-copyright-p">Copyright &copy; <span class="tm-current-year">2017</span> Your
                            Company
                            | Designed by M</p>
                    </footer>
                </div>
                <a href="#" class="scrollup">Наверх</a>
            </div> <!-- Right column: content -->
        </div>
    </div> <!-- row -->
</div> <!-- container -->
</body>
</html>
