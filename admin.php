<?php
session_start();
include "databases.php";

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Администратор</title>
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
	<a class="navbar-brand main-logo" href="index.php"> Portfolio <span><img src="img/icons/portfolio.png" style="height: 32px; width: 32px;"></span>Lab</a>
    
    <div class="container">
      <h2 class="section-intro__subtitle">Администратор</h2>
    </div>
  </header>

  	<section class="portfolio section-margin">
      <div class="b-post__title"> 
    <h1><span class="t1" itemprop="name"></span> </h1>
 </div> 
 <div class="b-post__infotable clearfix"> 
     <div class="b-post__infotable_left"> 
    </div>
</div>  
	<!-- Start post-content Area -->

	<section class="post-content-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<div class="col-lg-3  col-md-3 meta-details">
                        <?php 
                                $query=mysqli_query($link, "SELECT * from `пользователь` order by `Имя`");
                                echo "<div style='align:center;'><h4>Список пользователей</h4></div>
                                        <table width='100%' border='1'>";
                                while($user=mysqli_fetch_assoc($query))
                                {
                                  echo "<tr><form method='post'>
                                          <td>".$user['Имя']."</td>
                                          <td>".$user['Логин']."</td>
                                          <td>".$user['Пароль']."</td>
                                          <td><input type='hidden' name='id' value='".$user['ID_Пользователя']."'>
                                          <input type='submit' name='del' onclick='return question()' value='Удалить'>
                                          </form></td>
                                          </tr>";
                                }
                                echo "</table>
                                        <br>";

                                    $query1=mysqli_query($link, "SELECT * from `работы`JOIN `пользователь` ON пользователь.ID_Пользователя = работы.FK_ID_Пользователя order by `Название`");        
                                        echo "<div style='align:center;'><h4>Список работ</h4></div>
                                        <table width='100%' border='1'>";
                                while($work=mysqli_fetch_assoc($query1))
                                {
                                  echo "<tr><form method='post'>
                                          <td>".$work['Название']."</td>
                                          <td>".$work['Описание']."</td>
                                          <td>".$work['Фото']."</td>
                                          <td>".$work['Имя']."</td>
                                          <td><input type='submit' name='red' value='Редактировать'></td>
                                          <td><input type='hidden' name='id' value='".$work['ID_Работы']."'>
                                          <input type='submit' name='del1' onclick='return question()' value='Удалить'>
                                          </form></td>
                                          </tr>";
                                }
                                echo "</table>
                                        <br>";
                        //	  				<a href='index.php?act=teach'>Назад</a>";


                        if(isset($_POST['redact']))
                        {
                                    $q=mysqli_query($link, "UPDATE `работы`
                                             set `Название`='".$_POST['name']."',`Описание`='".$_POST['login']."'
                                             where `ID_Работы`='".$_POST['id']."'");
                                    echo "<h4>Работа <b>".$_POST['name']."</b> успешно отредактирован.</h4><br><br>";
                                    die();
                        }

                        if(isset($_POST['red']))
                        {
                               $te=mysqli_query($link, "SELECT * from `работы` where `ID_Работы`='".$_POST['id']."'");
                               $t=mysqli_fetch_assoc($te);
                                 echo "<form method='post'>
                                     <h4>Редактирование формы работы: </h4><br>
                                    <input placeholder='Ф.И.О.' type='text' name='name' id='fld_11' value='".$t['Название']."'><br><br>
                                    <input placeholder='Логин' type='text' name='login' id='fld_21' value='".$t['Описание']."'><br><br>
                                    <input type='hidden' name='id' value='".$_POST['id']."'>
                                    <input type='submit' onclick='return check1()' name='redact' value='Редактировать'><br>
                                    </form>";
                              //echo "<a href='index.php?act=teach'>Назад</a>";
                                die();
                        }

                        if(isset($_POST['del1']))
                            {
                                $del=mysqli_query($link, "SELECT `Название` from `Работы`
                                where `ID_Работы`='".$_POST['id']."'");
                               $name=mysqli_fetch_assoc($del);
                               $q=mysqli_query($link, "DELETE from `Работы` where `ID_Работы`='".$_POST['id']."'");
                                //echo "Учитель успешно удален.<br><br><a href='add_teach.php?act=redact'>Назад</a>";
                                die();
                            }
                                if(isset($_POST['del']))
                                {
                                        $del=mysqli_query($link, "SELECT `Имя` from `Пользователь`
                                        where `ID_Пользователя`='".$_POST['id']."'");
                                       $name=mysqli_fetch_assoc($del);
                                       $q=mysqli_query($link, "DELETE from `Пользователь` where `ID_Пользователя`='".$_POST['id']."'");
                                        //echo "Учитель успешно удален.<br><br><a href='add_teach.php?act=redact'>Назад</a>";
                                        die();
                                }
                        ?>
						</div>
					</div>
  				</div>
			</div>
		</div>
	</section>
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
  
