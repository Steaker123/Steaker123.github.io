<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
        <title>MotorMoney - {!TITLE!}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="Кабинет пользователя" name="description" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../favicon.ico">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="/style/morris.css">

        <link href="/style/bootstrap.min2.css" rel="stylesheet" type="text/css">
        <link href="/style/icons.css" rel="stylesheet" type="text/css">
        <link href="/style/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/js/jquery.js"></script>
		<script type="text/javascript" src="/js/functions.js"></script>
            </head>
	<body class="fixed-left">

<?
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a WHERE id = '$usid'");
$user_data = $db->FetchArray();
?>
        <!-- Begin page -->
        <div id="wrapper">


            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="/" class="logo"><span>Motor</span>Money</a>
                        <a href="/" class="logo-sm"><span>M</span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                            <div class="btn-group topbtngroup">
							    <a href="/"><span class="topbtnlist waves-effect">Главная</span></a>
							    <a href="/about"><span class="topbtnlist waves-effect">О проекте</span></a>
							    <a href="/guaranteed"><span class="topbtnlist waves-effect">Гарантии</span></a>
							    <a href="/contest"><span class="topbtnlist waves-effect">Конкурсы</span></a>
							    <a href="/feedback"><span class="topbtnlist waves-effect">Отзывы</span></a>
							    <a href="/helpme"><span class="topbtnlist waves-effect">Помощь</span></a>
                            </div>
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light notification-icon-box"><i class="mdi mdi-fullscreen"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <img src="/img/nouser.png" alt="user-img" class="img-circle">
                                        <span class="profile-username" style="letter-spacing: 1px;"><b><?=$_SESSION["user"]; ?></b><br/><small style="letter-spacing:0;">Пользователь</small></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/"> Мой кабинет</a></li>
                                        <li><a href="/settings"> Настройки</a></li>
                                        <li><a href="/myreferrals"> Рефералы </a></li>
                                        <li class="divider"></li>
                                        <li><a href="/output"> Выход</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->



<?PHP include("inc/_user_menu.php"); ?>


           <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
<div class="">
    <div class="page-header-title">
        <h4 class="page-title">{!TITLE!}</h4>
    </div>
</div>