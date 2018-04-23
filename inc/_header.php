<!DOCTYPE html>
<html>
	<head>
		<meta charset="windows-1251">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="imagetoolbar" content="no">
		<meta name="msthemecompatible" content="no">
		<meta name="cleartype" content="on">
		<meta name="HandheldFriendly" content="True">
		<title>MotorMoney RIP - {!TITLE!}</title>
		<meta name="description" content="{!DESCRIPTION!}">
		<meta name="keywords" content="{!KEYWORDS!}">
		<link rel="icon" href="./favicon.png">
		<link href="/style/app.css" rel="stylesheet">
		<link href="/style/sweet-alert.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/js/functions.js"></script>
	</head>

	<body class="page">
<?
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a WHERE id = '$usid'");
$user_data = $db->FetchArray();

$newsus = $user_data["news"];

$numnews = 0;
$db->Query("SELECT * FROM db_news ORDER BY id DESC");
while($newses = $db->FetchArray()){
$numnews = $numnews+1;
}
?>
<?PHP
$tfstats = time() - 60*60*24;
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment,
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();
?>


		<div class="header">
			<div class="header__row container">
				<div class="row">
					<div class="col-md-5 col-xs-12 col-sm-12">
						<div class="logo" style="min-height:32px;">
							<a href="/" class="logo__link">
								<img src="/img/logo.png" class="logo__icon">
							</a>
						</div>
					</div>
					<div class="header__contact col-md-7 col-xs-12 col-sm-12">
	<?php if ($_SESSION["user_id"]) : ?>
						<a class="btn header__callback" href="/profile">
							<span class="btn__text">Мой аккаунт</span>
						</a>
	<?php endif;?>
	<?php if (!$_SESSION["user_id"]) : ?>
						<a class="btn header__callback" href="/login">
							<span class="btn__text">Вход в аккаунт</span>
						</a>
<?php endif;?>
					</div>
				</div>
			</div>

			<div class="nav">
				<div class="nav__btn-wrap">
					<button class="btn nav__btn" type="button">
						<span class="btn__text">
							<span class="nav__icon"></span>
						</span>
					</button>
				</div>
				<div class="nav__body container">
					<div class="nav__inner">
						<div class="nav__close"></div>
						<ul class="nav__list">
							<li class="nav__item"><a href="/" class="nav__link">Главная</a></li>
							<li class="nav__item"><a href="/about" class="nav__link">О проекте</a></li>
							<li class="nav__item"><a href="/stat" class="nav__link">Статистика</a></li>
							<li class="nav__item"><a href="/guaranteed" class="nav__link">Гарантии</a></li>
							<li class="nav__item"><a href="/contest" class="nav__link">Конкурсы</a></li>
							<li class="nav__item"><a href="/feedback" class="nav__link">Отзывы</a></li>
							<li class="nav__item"><a href="/helpme" class="nav__link">Помощь</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

<?php if($_SERVER['REQUEST_URI']=='/' && $_SERVER['REQUEST_URI']!='/index') {  ?>
<div class="tiser">
  <div id="tiserSlider" class="swiper-container swiper-container-horizontal">
    <div class="swiper-wrapper" style="transform: translate3d(-1349px, 0px, 0px); transition-duration: 0ms;"><div style="background-image: url(img/tiser1.jpg); width: 1349px;" class="tiser__slide swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="2">
        <div class="tiser__body">
          <div class="container">
            <div class="row">
              <div class="tiser__body-inner">
                <div class="tiser__title-wrap">
                  <h3 class="tiser__title weight700"> ПРИГЛАШАЙТЕ ДРУЗЕЙ</h3>
                </div>
                <p class="tiser__desc">Приглашайте своих друзей и знакомых в motormoney и получайте регулярные отчисления с их платежей!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="background-image: url(img/tiser2.jpg); width: 1349px;" class="tiser__slide swiper-slide swiper-slide-active" data-swiper-slide-index="0">
        <div class="tiser__body">
          <div class="container">
            <div class="row">
              <div class="tiser__body-inner">
                <div class="tiser__title-wrap">
                  <h3 class="tiser__title weight700">ПРИВЕТСТВУЕМ ВАС!</h3>
                </div>
                <p class="tiser__desc">Окунитесь с головой в RIP уникальный игровой механизм экономической игры с выводом денег motormoney.org!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="background-image: url(img/tiser3.jpg); width: 1349px;" class="tiser__slide swiper-slide swiper-slide-next" data-swiper-slide-index="1">
        <div class="tiser__body">
          <div class="container">
            <div class="row">
              <div class="tiser__body-inner">
                <div class="tiser__title-wrap">
                  <h3 class="tiser__title weight700"> ЗАРАБАТЫВАЙТЕ ДЕНЬГИ</h3>
                </div>
                <p class="tiser__desc">Расширяйте автопарк, возите клиентов, приглашайте друзей и зарабатывайте реальные деньги!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="background-image: url(img/tiser1.jpg); width: 1349px;" class="tiser__slide swiper-slide" data-swiper-slide-index="2">
        <div class="tiser__body">
          <div class="container">
            <div class="row">
              <div class="tiser__body-inner">
                <div class="tiser__title-wrap">
                  <h3 class="tiser__title weight700"> ПРИГЛАШАЙТЕ ДРУЗЕЙ</h3>
                </div>
                <p class="tiser__desc">Приглашайте своих друзей и знакомых в motormoney и получайте регулярные отчисления с их платежей!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div style="background-image: url(img/tiser2.jpg); width: 1349px;" class="tiser__slide swiper-slide swiper-slide-duplicate" data-swiper-slide-index="0">
        <div class="tiser__body">
          <div class="container">
            <div class="row">
              <div class="tiser__body-inner">
                <div class="tiser__title-wrap">
                  <h3 class="tiser__title weight700">ПРИВЕТСТВУЕМ ВАС!</h3>
                </div>
                <p class="tiser__desc">Окунитесь с головой в уникальный игровой механизм экономической игры с выводом денег motormoney.org!</p>
              </div>
            </div>
          </div>
        </div>
      </div></div>
  </div>
  <div class="tiser__pager">
    <div class="container">
      <div class="tiser__pager-item tiser__pager-item_active">
        <svg class="tiser__car"><use xlink:href="/img/icon.svg#icon_car2"></use></svg>
        <div class="tiser__pager-name">Приветствие</div>
        <div class="tiser__pager-desc">Добро пожаловать к нам!</div>
      </div>
      <div class="tiser__pager-item">
        <svg class="tiser__truck"><use xlink:href="/img/icon.svg#icon_truck"></use></svg>
        <div class="tiser__pager-name">Заработок</div>
        <div class="tiser__pager-desc">Зарабатывайте деньги</div>
      </div>
      <div class="tiser__pager-item">
        <svg class="tiser__bus"><use xlink:href="/img/icon.svg#icon_bus"></use></svg>
        <div class="tiser__pager-name">Рефералы</div>
        <div class="tiser__pager-desc">Приглашайте друзей</div>
      </div>
    </div>
  </div>
  <div class="tiser__find">
    <div class="container">
      <form action="#" class="form col-md-4 col-md-offset- tiser__form" id="regform">
        <h3 class="form__title text-center">Простая
          <span class="form__mark">
            <span class="form__mark-text">Регистрация</span>
          </span>
        </h3>
        <p class="form__desc">В самой перспективной игре с выводом денег 2017 года!</p>
        <div class="form__row row">
          <div class="col-md-12">
            <div class="control-group control-group_fullwidth">
              <span class="control-remark control-group__item">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
              </span>
              <span class="inp">
                <span class="inp__box">
                  <input class="inp__control" name="login" placeholder="Введите логин" required="" type="text">
                </span>
              </span>
            </div>
          </div>
        </div>
        <div class="form__row row">
          <div class="col-md-12">
            <div class="control-group control-group_fullwidth">
              <span class="control-remark control-group__item">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
              <span class="inp">
                <span class="inp__box">
                  <input class="inp__control" name="email" placeholder="Введите E-mail" required="" type="email">
                </span>
              </span>
            </div>
          </div>
        </div>
        <div class="form__row row">
          <div class="col-md-12">
            <div class="control-group control-group_fullwidth">
              <span class="control-remark control-group__item">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
              <span class="inp">
                <span class="inp__box">
                  <input class="inp__control" name="pass1" placeholder="Введите пароль" required="" type="password">
                </span>
              </span>
            </div>
          </div>
        </div>
        <div class="form__row row">
          <div class="col-md-12">
            <div class="control-group control-group_fullwidth">
              <span class="control-remark control-group__item">
                <i class="fa fa-repeat" aria-hidden="true"></i>
              </span>
              <span class="inp">
                <span class="inp__box">
                  <input class="inp__control" name="pass2" placeholder="Повторите пароль" required="" type="password">
                </span>
              </span>
            </div>
          </div>
        </div>
        <div class="form__row row">
          <div class="col-md-12">
          <div><div class="grecaptcha-badge" style="width: 256px; height: 60px; transition: right 0.3s ease 0s; position: fixed; bottom: 14px; right: -186px; box-shadow: 0px 0px 5px gray;"><div class="grecaptcha-error"></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div><button class="g-recaptcha btn btn_fullwidth" data-sitekey="" data-callback="onSubmit">
              <span class="btn__text">Создать аккаунт</span>
            </button>
          </div>
        </div>
        <div class="form__row row">
          <div class="col-md-12">
            <div class="form__info">Регистрация более одного аккаунта строго запрещена!</div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
 } // Главная страница
?>

<?php if($_SERVER['REQUEST_URI']!='/' && $_SERVER['REQUEST_URI']!='/index') {  ?>

<?PHP 
} // Остальные страницы
 ?>
 