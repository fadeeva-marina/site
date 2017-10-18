<!DOCTYPE html>
<?php
if(isset($_POST["go"])):
	$e1=null;
	$uname=trim($_POST["uname"]);
	$uname=strip_tags($uname); // вырезаем теги
        //конвертируем специальные символы в мнемоники HTML
	$uname=htmlspecialchars($uname,ENT_QUOTES);
        /* на некоторых серверах
         * автоматически добавляются
         * обратные слеши к кавычкам, вырезаем их */
	$uname=stripslashes($uname);
	if(strlen($uname)=="0"):
		$e1.="Заполните поле<br>";
	endif;
	

	
	$e3=null;
	$umail=trim($_POST["umail"]);
	$umail=strip_tags($umail);
	$umail=htmlspecialchars($umail,ENT_QUOTES);
	$umail=stripslashes($umail);
	if(!filter_var($umail, FILTER_VALIDATE_EMAIL)):
		$e3.="Неверное значение<br>";
	endif;

	$eEn=$e1.$e3;
	
	if($eEn==null):
		$dt=date("d.m.Y, H:i:s"); // дата и время 
		$mail="marinka24-97@mail.ru"; // e-mail куда уйдет письмо
		$title="Заявка на подписку"; // заголовок(тема) письма
		//конвертируем 
		$title=iconv("utf-8","windows-1251",$title);
		$title=convert_cyr_string($title, "w", "k");
		$mess="<html><head></head><body><b>Имя:</b> $uname<br>";
		// ссылка на e-mail
		$mess.="<b>E-Mail:</b> <a href='mailto:$umail'>$umail</a><br>"; 
		$mess.="<b>Дата и Время:</b> $dt</body></html>";
		//конвертируем 
		$mess=iconv("utf-8","windows-1251",$mess);
		$mess=convert_cyr_string($mess, "w", "k");
		
		$headers="MIME-Version: 1.0\r\n";
		$headers.="Content-Type: text/html; charset=koi8-r\r\n";
		$headers.="From: $umail\r\n"; // откуда письмо
		mail($mail, $title, $mess, $headers); // отправляем

		$f = fopen('textfile.txt', a);
		fputs($f, "Имя ".$uname." ".$umail."\n");
		fclose($f);
		
		// выводим уведомление об успехе операции и перезагружаем страничку
		print "<script language='Javascript' type='text/javascript'>
		<!--
		alert ('Ваше заявка отправлена! Спасибо!');
		function reload(){location = 'index.php'}; 
		setTimeout('reload()', 0);
		-->
		</script>";
	endif;
endif;
?>
<?php
// Переменные ошибок
	$ee1=null;
	$ee2=null;
	$ee3=null;
// Пути зарузки файлов
	$path = 'i/';
	$tmp_path = 'tmp/';
// Массив допустимых значений типа файла
	$types = array('image/gif', 'image/png', 'image/jpeg');
// Максимальный размер файла
	$size = 1024000;

// Обработка запроса

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
// Проверяем тип файла
		if (!in_array($_FILES['picture']['type'], $types))
			//die('Запрещённый тип файла. <a href="?">Попробовать другой файл?</a>');
			$ee1.="Запрещённый тип файла. Попробуйте другой файл";
// Проверяем размер файла
		if ($_FILES['picture']['size'] > $size)
			$ee1.="Слишком большой размер файла. Попробуйте другой файл";
			//die('Слишком большой размер файла. <a href="?">Попробовать другой файл?</a>');
// Загрузка файла и вывод сообщения
		if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
			$ee3.='Что-то пошло не так';
		else
			$ee2.='Загрузка удачна <a href="' . $path . $_FILES['picture']['name'] . '">Посмотреть</a> ' ;
	}
	if($ee2!=null)
	{
				print "<script language='Javascript' type='text/javascript'>
		<!--
		alert ('Рецепт сохранен! Спасибо!');
		function reload(){location = 'index.php'}; 
		setTimeout('reload()', 0);
		-->
		</script>";
	}
?>
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
                    <!-- Left column: logo and menu -->
                    <div class="tm-blue-bg tm-left-column">                        
                        <div class="tm-logo-div text-xs-center">
                           <!--  <img src="img/tm-neaty-logo.png" alt="Logo"> -->
							<a href="#welcome"><img src="img/logo.png" alt="Logo"></a>
                            <h1 class="tm-site-name"><a href="#welcome">Рецепт</a></h1>		
                        </div>
                        <nav class="tm-main-nav">
                            <ul class="tm-main-nav-ul">
                                <li class="tm-nav-item">
                                    <a href="#welcome" class="tm-nav-item-link">Главная</a>
                                </li>
                                <li class="tm-nav-item">
                                    <a href="#bakerygallery" class="tm-nav-item-link">Выпечка</a>
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
                            <!-- Welcome section -->
                            <section id="welcome" class="tm-section">
                                <header>
                                    <h2 class="tm-blue-text tm-welcome-title tm-margin-b-45">Добро пожаловать</h2>
                                </header>
                                <p>Приветствуем вас на нашем сайте. У нас вы сможете найти рецепты различных десертов, выпечки, а так же сладких (а может иногда и не сладких) напитков. Так же вы можете подписаться на рассылку, чтобы наши вкусные рецепты радовали вас каждый день!</p>
								<div class="row"> 
								<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 push-lg-4 push-md-5">
								<p>Мы обычные люди, которые любят готовить простые, но вкусные и красивые блюда. И нам очень хочется делиться этим с вами! Надеемся, вам понравится!</p>
								</div>
								<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 pull-lg-8 pull-md-7 tm-about-img-container">
                                        <img src="img/neaty-02.jpg" alt="Image" class="img-fluid">    
                                </div> 
								</div>
                            </section>


                            <!-- Gallery One section -->     
                            <section id="bakerygallery" class="tm-section">
                                <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Выпечка</h2></header>
                                <div class="tm-gallery-container tm-gallery-1">
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/03.jpg"><img src="img/03.jpg" alt="Image" class="img-fluid tm-img-tn"></a> 
						
										<span><a href="rec1.php">Рецепт 1</a></span>
                                    </div>
									
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/04.jpg"><img src="img/04.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
										<span>Рецепт 2</span>
                                    </div>
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/05.jpg"><img src="img/05.jpg" alt="Image" class="img-fluid tm-img-tn"></a>
										<span>Рецепт 3</span>										
                                    </div>
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/06.jpg"><img src="img/06.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
										<span>Рецепт 4</span>
                                    </div>
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/07.jpg"><img src="img/07.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
										<span>Рецепт 5</span>
                                    </div>   
                                </div>
                            </section>

                            <!-- Second Gallery section -->     
                            <section id="dessertgallery" class="tm-section">
                                <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Десерты</h2></header>
                                <div class="tm-gallery-container tm-gallery-1">
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/08.jpg"><img src="img/08.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
										<span>Рецепт 1</span>
                                    </div>
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/09.jpg"><img src="img/09.jpg" alt="Image" class="img-fluid tm-img-tn"></a>    
										<span>Рецепт 2</span>
                                    </div>
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/10.jpg"><img src="img/10.jpg" alt="Image" class="img-fluid tm-img-tn"></a>   
									<span>Рецепт 3</span>										
                                    </div>                                    
                                </div>
                            </section>

                            <!-- Third Gallery section -->     
                            <section id="drinkgallery" class="tm-section">
                                <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Напитки</h2></header>
                                <div class="tm-gallery-container tm-gallery-1">
                                    <div class="tm-img-container tm-img-container-1  textimage">
                                        <a href="img/11.jpg"><img src="img/11.jpg" alt="Image" class="img-fluid tm-img-tn"></a>   
										<span>Рецепт 1</span>
                                    </div>
                                    <div class="tm-img-container tm-img-container-1  textimage">
                                        <a href="img/12.jpg"><img src="img/12.jpg" alt="Image" class="img-fluid tm-img-tn"></a>
										<span>Рецепт 2</span>
                                    </div>
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/13.jpg"><img src="img/13.jpg" alt="Image" class="img-fluid tm-img-tn"></a>
										<span>Рецепт 3</span>
                                    </div>
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/14.jpg"><img src="img/14.jpg" alt="Image" class="img-fluid tm-img-tn"></a>
										<span>Рецепт 4</span>
                                    </div>       
                                    <div class="tm-img-container tm-img-container-1 textimage">
                                        <a href="img/15.jpg"><img src="img/15.jpg" alt="Image" class="img-fluid tm-img-tn"></a>
										<span>Рецепт 5</span>
                                    </div> 									
                                </div>
                            </section>
							
							<section id="addrecept" class="tm-section">
							<header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Предложить свой рецепт</h2></header>
							<div class="row">
                                    <div class="col-lg-6">
									<form enctype="multipart/form-data" method="post">
										<div class="form-group">
											<input type="text" name="uname" class="form-control" placeholder="Название">
											
										</div>
										<div class="form-group">
                                            <textarea id="describe_message" name="describe_message" class="form-control" rows="9" placeholder="Описание"></textarea>
                                        </div>  
										<div class="form-group">
											<input name="picture" type="file" />
											<span class="error"><?=@$ee1;?></span>
											<!-- <button type="file" class="float-right tm-button">..</button> -->
										</div>

										<input type="hidden" value="5" />
										<button type="submit" class="float-right tm-button">Отправить</button>
									</form>
									</div>
                                    <div class="col-lg-6 tm-contact-right">
                                        <p>
                                       Вы можете предложить нам свой рецепт, мы обязательно рассмотрим его и, возможно, добавим к себе :)
                                        </p>
                                    </div>
							</div>
							</section>
							
                            <!-- Contact Us section -->
								<section id="subscribe" class="tm-section">
                                <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Подписаться на рассылку</h2></header>
                                <div class="row">
                                    <div class="col-lg-6">
									<form action="index.php" method="post" class="contact-form">
									<div class="form-group">
									<input type="text" name="uname" value="<?=@$uname;?>" class="form-control" placeholder="Имя">
									<span class="error"><?=@$e1;?></span>
									</div>
									<div class="form-group">
									<input type="text" name="umail" value="<?=@$umail;?>" class="form-control" placeholder="Email">
									<span class="error"><?=@$e3;?></span>
									</div>
									<input type="hidden" name="go" value="5">
									<button type="submit" href="#subscribe" class="float-right tm-button">Отправить</button>
									</form>
                                    </div>
                                    <div class="col-lg-6 tm-contact-right">
                                        <p>
                                        Укажите свое имя и email и получайте ежедневно по одному из наших рецептов. 
                                        </p>
                                    </div>
                                </div>
                            </section>
                            <footer>
                                <p class="tm-copyright-p">Copyright &copy; <span class="tm-current-year">2017</span> Your Company 
								| Designed by M</p>
                            </footer>
                        </div>  
                        
                    </div> <!-- Right column: content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
                
        <!-- load JS files -->
		<script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="js/jquery.magnific-popup.min.js"></script>     <!-- Magnific pop-up (http://dimsemenov.com/plugins/magnific-popup/) -->
        <script src="js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script>     
       
            $(document).ready(function(){

                // Single page nav
                $('.tm-main-nav').singlePageNav({
                    'currentClass' : "active",
                    offset : 20
                });

                // Magnific pop up
/*                 $('.tm-gallery-1').magnificPopup({
                  delegate: 'a', // child items selector, by clicking on it popup will open
                  type: 'image',
                  gallery: {enabled:true}
                  // other options
                });  */

                $('.tm-gallery-2').magnificPopup({
                  delegate: 'a', // child items selector, by clicking on it popup will open
                  type: 'image',
                  gallery: {enabled:true}
                  // other options
                }); 

                $('.tm-gallery-3').magnificPopup({
                  delegate: 'a', // child items selector, by clicking on it popup will open
                  type: 'image',
                  gallery: {enabled:true}
                  // other options
                }); 

                $('.tm-current-year').text(new Date().getFullYear());                
            });
        </script>               
</body>
</html>