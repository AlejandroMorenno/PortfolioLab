<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>О нас</title>
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
				<a href="service.html">Возможности</a>
			</li> -->
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
      <h2 class="section-intro__subtitle">О Нас</h2>
      <div class="btn-group breadcrumb">
        <a href="#/" class="btn">Главная</a>
        <span class="btn btn--rightBorder">О нас</span>
      </div>
    </div>
  </header>

  <section class="about section-margin mb-5">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-5">
					<div class="about__img text-center text-md-left mb-5 mb-md-0">
						<img class="img-fluid" src="img/about.png" alt="">
						<a href="#/" class="about__img__date text-center">
							<h3>800+</h3>
							<p>Довольных <br> пользователей</p>
						</a>
					</div>
				</div>
				<div class="col-md-7 pl-xl-5">
					<div class="section-intro">
						<h4 class="section-intro__title">О нас</h4>
					</div>
					<p>Мы помогаем вам выполять качественно все проекты, сдавать готовые в срок дедлайна и совершенствоваться в вашей области работы. На нашем сайте вы найдете примеры работ других веб-разработчиков или дизайнеров. Сможете оставить отзыв и посмотреть работы других пользователей. </p>
				</div>
			</div>
		</div>
	</section>
	


	<section class="overview section-margin mt-0">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-4 col-xl-3 mb-4 mb-xl-0">
					<div class="media align-items-center overview__single">
						<span class="overview__single__icon"><i class="ti-crown"></i></span>
						<div class="media-body">
							<h3>286+</h3>
							<p>Готовых проектов загружено</p>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 col-xl-3 mb-4 mb-xl-0">
					<div class="media align-items-center overview__single">
						<span class="overview__single__icon"><i class="ti-face-smile"></i></span>
						<div class="media-body">
							<h3>942+</h3>
							<p>Положительных отзывов</p>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-lg-4 col-xl-3 mb-4 mb-xl-0">
					<div class="media align-items-center overview__single">
						<span class="overview__single__icon"><i class="ti-user"></i></span>
						<div class="media-body">
							<h3>263+</h3>
							<p>Пользователи веб-дизайнеры</p>
						</div>
					</div>
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
    var testimonialCarousel = $('.testimonialCarousel');
      testimonialCarousel.owlCarousel({
      loop:true,
      margin:80,
      startPosition: 2,
      nav: false,
      responsiveClass:true,
      responsive:{
        0:{
            items:1
        },
        1000:{
            items:2,
            loop:true
        }
      }
	});
	
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