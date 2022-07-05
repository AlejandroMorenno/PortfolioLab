<?php 
include "databases.php";
if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$links = $_POST['links'];
		$decript = $_POST['decript'];
		$pol = $_GET['id'];
        mysqli_query($link,"INSERT INTO работы SET Название='".$name."', Описание = '".$decript."', Фото = '".$links."', FK_ID_Пользователя='".$pol."'");
		header("Location: blog.php?id=".$_GET['id'].""); exit();
	}
	$query = mysqli_query($link, "SELECT ID_Работы, Имя, Название, Описание, Фото, FK_ID_Пользователя FROM работы JOIN пользователь ON пользователь.ID_Пользователя = работы.FK_ID_Пользователя");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Портфолио</title>
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
      <h2 class="section-intro__subtitle">Портфолио</h2>
      <div class="btn-group breadcrumb">
        <a href="index.html" class="btn">Главная</a>
        <span class="btn btn--rightBorder">Портфолио</span>
      </div>
    </div>
  </header>

  <section class="portfolio">
	<form method=post class="form-contact add-post">
		<h2>Добавить публикацию</h2>
		<div class="row">
		<div class="col-lg-5">
			<div class="form-group">
				<input class="form-control" name = "name" id="name" type="name" placeholder="Название">
			</div>
			<!-- <div class="form-group">
				<input class="form-control" id="profile" type="profile" placeholder="Профессия">
			</div> -->
			<div class="form-group">
				<input class="form-control" name = "links" id="links" type="link" placeholder="Ссылка">
			</div>
			<div class="form-group">
				<textarea class="form-control" name = "decript" id="description" type="description" placeholder="Описание"></textarea>
			</div>
		</div>
		</div>
		<div class="form-group text-center text-md-left">
			<button name = "submit" type="submit" class="btn active btn--leftBorder">Добавить</button>
		</div>
	</form>
  </section>

  <script>
	function prov(){
		valid = true;
		var name = document.getElementsByName('name').value;
		var profile = document.getElementsByName('profile').value;
		var description = document.getElementsByName('description').value;

		if ( document.getElementById('name').value == "" || !name.match(/[а-яА-Я]+/))
		{
				alert ( "Пожалуйста введите корректно поле 'Имя'." );
				valid = false;
		}
		if ( document.getElementById('profile').value == "" || !profile.match(/[а-яА-Я]+/))
		{
				alert ( "Пожалуйста заполните корректно поле 'Профессия' " );
				valid = false;
		}
		if ( document.getElementById('description').value == "" || !description.match(/[а-яА-Я]+/))
		{
				alert ( "Пожалуйста заполните корректно поле 'Описание' " );
				valid = false;
		}
		else
		{
			alert("Публикация завершена");
		}
		return valid;
	}
</script>
<h1 style="margin-left:255px; margin-top: 55px">Список работ:</h1>
  <?php while($result=mysqli_fetch_assoc($query)) {?>
	<!-- Start post-content Area -->
	<section class="post-content-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<div class="col-lg-3  col-md-3 meta-details">
							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?php echo $result['Имя'] ?></a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#">2022</a> <span class="lnr lnr-calendar-full"></span></p>
								<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
								<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 ">
							<div class="feature-img">
								<img class="img-fluid" src="<?php echo $result['Фото'] ?>" alt="">
							</div>
							<a class="posts-title" href="blog-single.html"><h3><?php echo $result['Название'] ?></h3></a>
							<p class="excert">
								<?php echo $result['Описание'] ?>
							</p>
							<a href="single-blog.php?id=<?php echo $result['ID_Работы'];?>" class="primary-btn">Подробнее</a>
						</div>
					</div>
  				</div>
			</div>
		</div>
	</section><?php }?>
	<!-- End post-content Area -->

	<!-- start footer Area -->
	<section>
	<footer class="footer footer-bg">
		<div class="container">
			<div class="d-sm-flex justify-content-between footer__bottom top-border" style="position: relative; top: -60px;">
				<p> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed by <a href="https://instagram.com/black.unicorn.18" target="_blank">Shpuntova Zlata</a></p>
			</div>
		</div>
	</footer>
	</section>
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