<?php 
include "databases.php";
	//$query = mysqli_query($link, "SELECT ID_Работы, Имя, Email, Тема, Текст_отзыва, FK_Пользователя FROM работы JOIN пользователь ON пользователь.ID_Пользователя = работы.FK_ID_Пользователя");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Контакты</title>
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
					<a href="kab.php">Личный кабинет</a>
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
      <h2 class="section-intro__subtitle">Контакты</h2>
      <div class="btn-group breadcrumb">
        <a href="#/" class="btn">Главная</a>
        <span class="btn btn--rightBorder">Контакты</span>
      </div>
    </div>
  </header>


  <section class="section-margin">
    <div class="container">
      <!-- google map start -->
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map"></div>
		<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A9dd65b31e840de37992d9941869893dbb8ba77c3fc38777c361cf28657712b51&amp;source=constructor" width="1109" height="420" frameborder="0"></iframe>
	</div>
      <!-- google map end -->


      <div class="row align-items-center">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="lnr lnr-home"></i></span>
            <div class="media-body">
              <h3>ул. Жуковского 5/1 кв. 203</h3>
              <p>Минск, Беларусь</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="lnr lnr-phone-handset"></i></span>
            <div class="media-body">
              <h3><a href="tel:445302131">+375 (44) 530-21-31</a></h3>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="lnr lnr-envelope"></i></span>
            <div class="media-body">
              <h3><a href="mailto:zshpuntova@gmail.com">zshpuntova@gmail.com</a></h3>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
          <form method = post action="send.php" class="form-contact">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="name" type="text" placeholder="Имя" required>
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" type="email" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                  <input class="form-control" name="subject" type="text" placeholder="Тема">
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                    <textarea class="form-control different-control w-100" name="message" id="textarea" cols="30" rows="6" placeholder="Введите сообщение"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right">
              <button name = "submit" type="submit" class="btn active btn--leftBorder">Отправить</button>
            </div>
          </form>
          <script>
            function prov3()
            {
              alert ("Не удалось выполнить действие")
            }
          </script>
        </div>
      </div>
    </div>
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