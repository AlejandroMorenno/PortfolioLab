<?php
include 'databases.php';
if(isset($_POST['submit'])){
	$name = $_POST['name'];	
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
	$pol = $_GET['id'];
    mysqli_query($link,"INSERT INTO отзыв SET Ник = '".$name."', Email = '".$email."', Фотокарточка = '".$subject."', Текст_отзыва = '".$message."' ");
	header("Location: single-blog.php?id=".$_GET['id'].""); exit();
  }
$query = mysqli_query($link, "SELECT ID_Отзыва, Ник, Email, Фотокарточка, Текст_отзыва FROM отзыв");
$query1 = mysqli_query($link, "SELECT * FROM работы JOIN пользователь ON пользователь.ID_Пользователя = работы.FK_ID_Пользователя where ID_Работы = {$_GET['id']}");
$info = mysqli_fetch_assoc($query1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Публикация</title>
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
	<a class="navbar-brand main-logo" href="index.html"> Portfolio <span><img src="img/icons/portfolio.png" style="height: 32px; width: 32px;"></span>Lab</a>
    <div class="container">
      <h2 class="section-intro__subtitle">Публикация</h2>
      <div class="btn-group breadcrumb">
        <a href="index.html" class="btn">Главная</a>
        <span class="btn btn--rightBorder">Публикация</span>
      </div>
    </div>
  </header>

	<!-- Start post-content Area -->
	<section class="post-content-area single-post-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<div class="col-lg-12">
							<div class="feature-img">
								<img class="img-fluid" src="<?php echo $info['Фото'] ?>" alt="">
							</div>
						</div>
						<div class="col-lg-3  col-md-3 meta-details">
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $info['Имя'] ?></a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#">2022</a> <span class="lnr lnr-calendar-full"></span></p>
								<ul class="social-links col-lg-12 col-md-12 col-6">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-github"></i></a></li>
									<li><a href="#"><i class="fa fa-behance"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-md-9">
							<h3 class="mt-20 mb-20 text-white"><?php echo $info['Название']?></h3>
							<p class="excert">
								<?php echo $info['Описание'] ?>
							</p>
						</div>
					</div>
					<div class="navigation-area">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
								<div class="arrow">
									<a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
								</div>
							</div>
							
						</div>
					</div>
					<div class="comments-area">
						<h4 class="text-white">Comments</h4>
						<?php while($result = mysqli_fetch_assoc($query)) { ?>
						<div class="comment-list">
							<div class="single-comment justify-content-between d-flex">
								<div class="user justify-content-between d-flex">
									<div class="thumb">
										<img src="<?php echo $result['Фотокарточка'] ?>" alt="">
									</div>
									<div class="desc">
										<h5><a href="#"><?php echo $result['Ник'] ?></a></h5>
										<p class="date"><?php echo $result['Email']?> </p>
										<p class="comment">
											<?php echo $result['Текст_отзыва'] ?>
										</p>
									</div>
								</div>
							</div>
						</div>
							<?php }?>
					</div>
					<div class="comment-form">
						<h4 class="text-white">Оставьте комментарий</h4>
						<form method = post>
							<div class="form-group form-inline">
								<div class="form-group col-lg-6 col-md-12 name">
									<input name = "name" type="text" class="form-control" id="name" placeholder="Имя" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Имя'">
								</div>
								<div class="form-group col-lg-6 col-md-12 email">
									<input name = "email" type="email" class="form-control" id="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'">
								</div>
							</div>
							<div class="form-group">
								<input name = "subject" type="text" class="form-control" id="subject" placeholder="Тема" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Тема'">
							</div>
							<div class="form-group">
								<textarea class="form-control mb-10" rows="5" name="message" placeholder="Сообщение" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Сообщение'"
								 required=""></textarea>
							</div>
							<button name = "submit" type="submit" class="btn active btn--leftBorder">Добавить</button>
						</form>
						<script>
							function prov2()
    						{
        						alert ("Не удалось выполнить действие")
  	 						}
						</script>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End post-content Area -->


	<!-- start footer Area -->
	<footer class="footer footer-bg">
			<div class="container">
				<div class="d-sm-flex justify-content-between footer__bottom top-border" style="position: relative; top: -60px;">
					<p> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed by <a href="https://instagram.com/black.unicorn.18" target="_blank">Shpuntova Zlata</a></p>
				</div>
			</div>
		</footer>
	<!-- End footer Area -->


	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>	
	<script src="vendor/bootstrap/bootstrap.bundle.min.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.min.js"></script>

	<script>

		var heroCarousel = $('.heroCarousel');
		heroCarousel.owlCarousel({
		loop:true,
		margin:10,
		nav: false,
		startPosition: 1,
		responsiveClass:true,
		responsive:{
			0:{
				items:1
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