<?php
session_start();
include "databases.php";
//Реги
if(isset($_POST['submit'])){
	$err = [];
if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])){
	$err[] = "Логин может состоять только из букв английского алфавита и цифр";;
	}
	if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT ID_Пользователя FROM пользователь WHERE Логин='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = $_POST['login'];
        // Убераем лишние пробелы и делаем двойное хеширование
        $password = md5(md5(trim($_POST['password'])));
		$name = $_POST['name'];
		$email = $_POST['email'];
		$photo = $_POST['photo'];		
        mysqli_query($link,"INSERT INTO пользователь SET Логин='".$login."', Имя = '".$name."', Email = '".$email."', Аватарка ='".$photo."',Пароль='".$password."'");
        header("Location: login.php"); exit();
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
//Вход
// Страница авторизации
// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

if(isset($_POST['submit1']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT ID_Пользователя, Пароль FROM пользователь WHERE Логин='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);
	if($data['ID_Пользователя']== 1){
        header("Location: admin.php"); exit();

	}
	else{
    // Сравниваем пароли
    if($data['Пароль'] === md5(md5($_POST['pass'])))
    {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));
        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: kab.php?id=".$data['ID_Пользователя'].""); exit();
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Регистрация/Вход</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,500" rel="stylesheet">

	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.theme.default.min.css">
	<link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="img/icons/portfolio.ico">
</head>
<body>
	<!-- ================Offcanvus Menu Area =================-->
	<div class="side_menu">
		<ul class="list menu_right">
			<li>
				<a href="index.php">Главная</a>
			</li>
			<li>
				<a href="blog.php">Портфолио</a>
			</li>
			<!-- <li>
				<a href="#">Pages</a>
				<ul class="list">
					<li>
						<a href="elements.html">Elements</a>
					</li>
				</ul>
			</li> -->
			<!-- <li>
				<a href="#">Blog</a>
				<ul class="list">
					<li>
						<a href="blog.html">Blog</a>
					</li>
					<li>
						<a href="single-blog.html">Публикация</a>
					</li>
				</ul>
			</li> -->
			<li>
				<a href="contact.php">Контакты</a>
			</li>
			<li>
				<a href="about.php">О нас</a>
			</li>
			<li>
					<a href="kab.php?id=<?php echo $_GET['id']?>">Личный кабинет</a>
				</li> 
			<li>
				<a href="login.php">Регистрация/Вход</a>
			</li>
		</ul>
</div>
	<!--================End Offcanvus Menu Area =================-->

	<!--================Canvus Menu Area =================-->
	<div class="canvus_menu">
		<div class="container">
			<div class="float-right">
				<div class="toggle_icon" title="Меню">
					<span></span>
				</div>
			</div>
		</div>
	</div>
	<!--================End Canvus Menu Area =================-->

  <header class="hero-banner project-bg">
	<a class="navbar-brand main-logo" href="index.html"> Portfolio <span><img src="img/icons/portfolio.png" style="height: 32px; width: 32px;"></span>Lab</a>
    
    <div class="container">
      <h2 class="section-intro__subtitle">Регистрация/Вход</h2>
      <div class="btn-group breadcrumb">
        <a href="#/" class="btn">Главная</a>
        <span class="btn btn--rightBorder">Регистрация/Вход</span>
      </div>
    </div>
  </header>

  	<section class="portfolio section-margin">
		<form method=post class="form-contact regist">
			<h2>Регистрация</h2>
			<div class="row">
			<div class="col-lg-5">
				<div class="form-group">
				<input class="form-control" name="name" type="text" placeholder="Имя" required>
				</div>
				<div class="form-group">
					<input class="form-control" name="login" type="login" placeholder="Логин" required>
				</div>
				<div class="form-group">
					<input class="form-control" name="email" type="email" placeholder="Почта" required>
				</div>
				<div class="form-group">
					<input class="form-control" name="photo" type="text" placeholder="Фото" required>
				</div>
				<div class="form-group">
				<input class="form-control" name="password" type="password" placeholder="Пароль" required>
				</div>
				<div class="form-group">
				<input class="form-control" name="password" type="password" placeholder="Повторите пароль">
				</div>
			</div>
			</div>
			<div class="form-group text-center text-md-left">
			<button name="submit" type="submit" class="btn active btn--leftBorder">Регистрация</button>
			</div>
		</form>

		<form method=post class="form-contact login">
			<h2>Вход</h2>
			<div class="row">
			<div class="col-lg-5">
				<div class="form-group">
				<input class="form-control" name="login" type="login" placeholder="Логин" required>
				</div>
				<div class="form-group">
				<input class="form-control" name="pass" type="password" placeholder="Пароль">
				</div>
			</div>
			</div>
			<div class="form-group text-center text-md-left">
			<button name = "submit1" type="submit" class="btn active btn--leftBorder">Войти</button>
			</div>
		</form>
	</section>

	<footer class="footer footer-bg">
		<div class="container">
			<div class="d-sm-flex justify-content-between footer__bottom top-border" style="position: relative; top: -60px;">
				<p> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed by <a href="https://instagram.com/black.unicorn.18" target="_blank">Shpuntova Zlata</a></p>
			</div>
		</div>
	</footer>



	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>	
	<script src="vendor/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.min.js"></script>

	<script>
		var dropToggle = $('.menu_right > li').has('ul').children('a');
		dropToggle.on('click', function() {
			dropToggle.not(this).closest('li').find('ul').slideUp(200);
			$(this).closest('li').children('ul').slideToggle(200);
			return false;
		});

		$( ".toggle_icon" ).on('click', function() {
			$( 'body' ).toggleClass( "open" );
		});
	</script>
</body>
</html>