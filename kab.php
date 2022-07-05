<?php
session_start();
include "databases.php";
$pol = $_GET['id'];
$query = mysqli_query($link, "SELECT ID_Пользователя, Аватарка, Имя, Логин, Email FROM пользователь where ID_Пользователя = $pol");
$query1 = mysqli_query($link, "SELECT ID_Работы, Имя, Название, Описание, Фото, FK_ID_Пользователя FROM работы JOIN пользователь ON пользователь.ID_Пользователя = работы.FK_ID_Пользователя where ID_Пользователя = $pol");
$result = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Личный кабинет</title>
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
				<a href="index.php?id=<?php echo $_GET['id']?>">Главная</a>
			</li>
			<li>
				<a href="blog.php?id=<?php echo $_GET['id']?>">Портфолио</a>
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
				<a href="contact.php?id=<?php echo $_GET['id']?>">Контакты</a>
			</li>
			<li>
				<a href="about.php?id=<?php echo $_GET['id']?>">О нас</a>
			</li>
			<li>
					<a href="kab.php?id=<?php echo $_GET['id']?>">Личный кабинет</a>
				</li> 
			<li>
				<a href="login.php?id=<?php echo $_GET['id']?>">Регистрация/Вход</a>
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
	<a class="navbar-brand main-logo" href="index.php"> Portfolio <span><img src="img/icons/portfolio.png" style="height: 32px; width: 32px;"></span>Lab</a>
    
    <div class="container">
      <h2 class="section-intro__subtitle">Личный кабинет</h2>
      <div class="btn-group breadcrumb">
        <a href="#/" class="btn">Главная</a>
        <span class="btn btn--rightBorder">Личный кабинет</span>
      </div>
    </div>
  </header>

  	<section class="portfolio section-margin">
      <div class="b-post__title"> 
    <h1><span class="t1" itemprop="name"><?php echo $result['Имя'] ?></span> </h1>
 </div> 
 <div class="b-post__infotable clearfix"> 
     <div class="b-post__infotable_left"> 
            <div class="b-sidecover"> 
             <img itemprop="image" style = "width:25%" src="<?php echo $result['Аватарка'] ?>" alt="Майкл Дж. Фокс" data-caption-title="Фото &quot;Майкл Дж. Фокс&quot;"> 
            </div> 
        </div> <div class="b-post__infotable_right"> <div class="b-post__infotable_right_inner"> 
                <table class="b-post__info">
					<tr> 
                    <td class="l"><h2>Имя: <?php echo $result['Имя'] ?></h2></td> </tr> 
                    <tr> <td class="l"><h2>Email: <?php echo $result['Email'] ?></h2></td> </tr> 
                    <tr> <td class="l"><h2>Логин: <?php echo $result['Логин'] ?></h2></td></tr> </tbody></table> 
                </div> 
            </div> 
        </div>
    </div>
</div>  
	<!-- Start post-content Area -->
	
<h1 style="margin-left:255px; margin-top: 55px">Список работ:</h1>
	<?php while($result1 = mysqli_fetch_assoc($query1)){?>
	<section class="post-content-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<div class="col-lg-3  col-md-3 meta-details">
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $result1['Имя'] ?></a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#">2022</a> <span class="lnr lnr-calendar-full"></span></p>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 ">
							<div class="feature-img">
								<img class="img-fluid" src="<?php echo $result1['Фото'] ?>" alt="">
							</div>
							<a class="posts-title" href="blog-single.html"><h3><?php echo $result1['Название'] ?></h3></a>
							<p class="excert">
								<?php echo $result1['Описание'] ?>
							</p>
							<a href="single-blog.php?id=<?php echo $result1['ID_Работы'];?>" class="primary-btn">Подробнее</a>
						</div>
					</div>
  				</div>
			</div>
		</div>
	</section>
	<?php }?>
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
  
