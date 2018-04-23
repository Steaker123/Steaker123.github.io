<?PHP
$_OPTIMIZATION["title"] = "Вход в аккаунт";
$_OPTIMIZATION["description"] = "Авторизация пользователя в системе";
$_OPTIMIZATION["keywords"] = "Авторизация пользователя в системе";

?>
<!doctype html>
<html lang="ru">

<head>
    <meta charset="windows-1251" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <title>MotorMoney - {!TITLE!}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arsenal:400,700|Ubuntu" />
    <link rel="stylesheet" href="/style/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/style/pagestyle.css" type="text/css" />
    <link rel="stylesheet" href="/style/formstyle.css" type="text/css" /> 
    <link rel="icon" type="image/png" href="favicon.ico">
    <link href="/style/sweet-alert.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/js/functions.js"></script>
</head>

<body>
    <div class="container">
        <div class="content">

	<?php if ($_SESSION["user_id"]) : ?>
	<?php endif;?>
	<?php if (!$_SESSION["user_id"]) : ?>
            <article class="col-md-12">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
<form id="loginform" action="" method="post">

                            <div class="form-heading text-center">
					<a href="/"><img src="/img/logo-small.png" style="max-width: 100%;"></a>
					<div class="title">Вход в аккаунт</div>
                            </div>
<?PHP

# Определение платежей по акции 'Накопительный банк'
$c_date = date("Ymd",time());
$c_date_begin = strtotime($c_date." 00:00:00");
$c_date_end = strtotime($c_date." 23:59:59");
$y_date = date("Ymd",time()-24*60*60);
$y_date_begin = strtotime($y_date." 00:00:00");
$y_date_end = strtotime($y_date." 23:59:59");


$db->Query("SELECT * FROM db_back WHERE date_add >='".$c_date_begin."' AND  date_add <='".$c_date_end."' ORDER BY id DESC LIMIT 1");
if($db->NumRows() == 0) {


$db->Query("SELECT sum(serebro) FROM db_insert_money WHERE date_add >='".$y_date_begin."' AND  date_add <='".$y_date_end."' AND money >= '1'" );
if($db->NumRows() == 0) $sum_c = 0;
else $sum_c = $db->FetchRow();
	
	
$db->Query("SELECT date_add as date_add, user as user, user_id as user_id, SUM(serebro) as sserebro  FROM db_insert_money WHERE date_add >='".$y_date_begin."' AND  date_add <='".$y_date_end."' GROUP BY user ORDER by sserebro DESC LIMIT 1");
$firstuser=$db->FetchArray();
$firstpercent=(1.5/100)*$sum_c;
$db->Query("UPDATE db_users_b SET money_b = money_b + '".$firstpercent."' WHERE id = '".$firstuser['user_id']."'");	


$db->Query("SELECT date_add as date_add, user as user, user_id as user_id, SUM(serebro) as sserebro  FROM db_insert_money WHERE date_add >='".$y_date_begin."' AND  date_add <='".$y_date_end."' GROUP BY user ORDER by sserebro DESC LIMIT 1,2");
$seconduser=$db->FetchArray();
$secondpercent=(1.0/100)*$sum_c;
$db->Query("UPDATE db_users_b SET money_b = money_b + '".$secondpercent."' WHERE id = '".$seconduser['user_id']."'");	


$db->Query("SELECT date_add as date_add, user as user, user_id as user_id, SUM(serebro) as sserebro  FROM db_insert_money WHERE date_add >='".$y_date_begin."' AND  date_add <='".$y_date_end."' GROUP BY user ORDER by sserebro DESC LIMIT 2,3");
$thirduser=$db->FetchArray();
$thirdpercent=(0.5/100)*$sum_c;
$db->Query("UPDATE db_users_b SET money_b = money_b + '".$thirdpercent."' WHERE id = '".$thirduser['user_id']."'");	

$db->Query("INSERT INTO db_back (`id`,`user_id`,`bank`,`sum`,`date_add`) VALUES(NULL,'".$firstuser['user_id']."','".$sum_c."','".$firstpercent."','".time()."'),(NULL,'".$seconduser['user_id']."','".$sum_c."','".$secondpercent."','".time()."'), (NULL,'".$thirduser['user_id']."','".$sum_c."','".$thirdpercent."','".time()."')");


//$db->Query("INSERT INTO db_back (`id`,`user_id`,`bank`,`sum`,`date_add`) VALUES(NULL,'".$firstuser['user_id']."','".$sum_c."','".$firstpercent."','".time()."')");
//$db->Query("INSERT INTO db_back (`id`,`user_id`,`bank`,`sum`,`date_add`) VALUES(NULL,'".$seconduser['user_id']."','".$sum_c."','".$secondpercent."','".time()."')");
//$db->Query("INSERT INTO db_back (`id`,`user_id`,`bank`,`sum`,`date_add`) VALUES(NULL,'".$thirduser['user_id']."','".$sum_c."','".$thirdpercent."','".time()."')");



	/*$db->Query("SELECT sum(serebro) as serebro, user_id FROM db_insert_money WHERE date_add >='".$y_date_begin."' AND  date_add <='".$y_date_end."'  AND money >= '1' GROUP BY SEREBRO");
	$num_nb = $db->NumRows();
	$sum_nb = 0;
	$user_nb = '';
	
	if($num_nb != 0) {
		if($num_nb == 1) {
			$data_nb = $db->FetchArray();
			$sum_nb = $sum_nb + $data_nb['serebro'];
			$user_nb = $user_nb.$data_nb['user_id']." ";
		} else {
			while($data_nb = $db->FetchArray()) {
				$sum_nb = $sum_nb + $data_nb['serebro'];
				$user_nb = $user_nb.$data_nb['user_id']." ";
			}
		}
		
		$ar_user_nb = explode(" ", $user_nb);
		$pos_nb = rand(0, $num_nb-1);

		$db->Query("SELECT percent_back FROM db_config WHERE id = '1'");
		$percent_back = $db->FetchRow();
		$db->FreeMemory();
		
		$sum_nb1 = round($sum_nb * $percent_back / 100,0);
		
		# Зачилсяем юзверю
		$db->Query("UPDATE db_users_b SET money_b = money_b + '".$sum_nb1."' WHERE id = '".$ar_user_nb[$pos_nb]."'");		
		
		# Пишем в табл
		$db->Query("INSERT INTO db_back (`id`,`user_id`,`bank`,`sum`,`date_add`) VALUES(NULL,'".$ar_user_nb[$pos_nb]."','".$sum_nb."','".$sum_nb1."','".time()."')");		

		# echo $sum_nb." ".$num_nb." ".$pos_nb."-".$ar_user_nb[$pos_nb];
	}*/
}
	if(isset($_POST["log_email"])){
	
	$lmail = $func->IsMail($_POST["log_email"]);
	
		if($lmail !== false){
		
			$db->Query("SELECT id, user, pass, referer_id, banned FROM db_users_a WHERE email = '$lmail'");
			if($db->NumRows() == 1){
			
			$log_data = $db->FetchArray();
			
				if(strtolower($log_data["pass"]) == strtolower($_POST["pass"])){
				
					if($log_data["banned"] == 0){
						
						# Считаем рефералов
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '".$log_data["id"]."'");
						$refs = $db->FetchRow();
						
						$db->Query("UPDATE db_users_a SET referals = '$refs', date_login = '".time()."', ip = INET_ATON('".$func->UserIP."') WHERE id = '".$log_data["id"]."'");
						
						$_SESSION["user_id"] = $log_data["id"];
						$_SESSION["user"] = $log_data["user"];
						$_SESSION["referer_id"] = $log_data["referer_id"];
						?>


<meta http-equiv="refresh" content="0;url=/profile" />


<?
						
					}else echo "<div class='alert alert-danger'>Аккаунт заблокирован</div>";
				
				}else echo "<div class='alert alert-danger'>Неверные данные</div>";
			
			}else echo "<div class='alert alert-danger'>E-mail не зарегистрирован</div>";
			
		}else echo "<div class='alert alert-danger'>Недопустимый формат E-mail</div>";
	
	}

?>
                            <div class="row">
                                <div class="col-md-12">
		<input style="" name="log_email" placeholder="Введите e-mail" type="text" maxlength="35">
</div>
                                <div class="col-md-12">
		<input style="margin-top: 5px;" name="pass" placeholder="Введите пароль" type="password" maxlength="35">
</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
		<input type="submit" value="Войти в аккаунт" class="adam-button adam-red">
		<p class="title-description"><a href="/recovery">Напомнить пароль</a> | <a href="/reg">Создать аккаунт</a></p>
                               </div>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
<?php endif;?>
            <div class="clearfix"></div>
        </div>
    </div>
    <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/js/sweet-alert.min.js"></script>
	<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
</body>
</html>