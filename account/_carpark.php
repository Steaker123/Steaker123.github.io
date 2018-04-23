
<div class="page-content-wrapper ">

    <div class="container">

        <div class="row">
            <div class="col-md-12">

<?PHP
# by Juice - jumast@ya.ru - (c) 2017 
# RIP motormoney, функциональность данного скрипта Fruif-Farm не имеет ничего общего с оригинальным сайтом.
# По этому могут быть неисправности, Вы уж извините, доработка требует слишком много времени и усилий
# За отдельную плату дополню, поменяю и т.д. пишите по контактам выше.

$_OPTIMIZATION["title"] = "Покупка авто";
$usid = $_SESSION["user_id"];
$refid = $_SESSION["referer_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

# Покупка нового дерева
if(isset($_POST["item"])){

$array_items = array(1 => "a_t", 2 => "b_t", 3 => "c_t", 4 => "d_t", 5 => "e_t", 6 => "f_t");
$array_name = array(1 => "Камаз - 1 уровень", 2 => "Ман - 2 уровень", 3 => "Ивеко - 3 уровень", 4 => "Даф - 4 уровень", 5 => "Вольво - 5 уровень", 6 => "Мерседес - 6 уровень");
$item = intval($_POST["item"]);
$citem = $array_items[$item];

	if(strlen($citem) >= 3){
		
		# Проверяем средства пользователя
		$need_money = $sonfig_site["amount_".$citem];
		if($need_money <= $user_data["money_b"]){
			
			if($user_data["last_sbor"] == 0 OR $user_data["last_sbor"] > ( time() - 60*20) ){
				
				$to_referer = $need_money * 0.1;

				# Добавляем строения и списываем деньги
				$db->Query("UPDATE db_users_b SET money_b = money_b - $need_money, $citem = $citem + 1,  
				last_sbor = IF(last_sbor > 0, last_sbor, '".time()."') WHERE id = '$usid'");

				# Даем энергию пользователю 50% от стоимости
				$energy = $need_money * 0.005;
				$db->Query("UPDATE db_users_b SET pay_points = pay_points + '$energy' WHERE id = '$usid'");
				
				# Вносим запись о покупке
				$db->Query("INSERT INTO db_stats_btree (user_id, user, tree_name, amount, date_add, date_del) 
				VALUES ('$usid','$usname','".$array_name[$item]."','$need_money','".time()."','".(time()+60*60*24*15)."')");
				$life_time->AddItem($usid,$citem);
				
				echo "<div class='alert alert-success'><b>Вы успешно купили спиннер.</b></div>";
				
				$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
				$user_data = $db->FetchArray();
				
			
			}else echo "<center><div class='alert error'>Перед тем как купить, следует собрать прибыль</div></center><BR />";
		
		}else echo "<div class='alert alert-danger'><b>Недостаточно монет для покупки.</b></div>";
	    }

}

$lvl1= ($sonfig_site["a_in_h"]*100)/$sonfig_site["amount_a_t"]/$sonfig_site["items_per_coin"]*24*30; // окупаемость
$lvl2= ($sonfig_site["b_in_h"]*100)/$sonfig_site["amount_b_t"]/$sonfig_site["items_per_coin"]*24*30; // окупаемость
$lvl3= ($sonfig_site["c_in_h"]*100)/$sonfig_site["amount_c_t"]/$sonfig_site["items_per_coin"]*24*30; // окупаемость
$lvl4= ($sonfig_site["d_in_h"]*100)/$sonfig_site["amount_d_t"]/$sonfig_site["items_per_coin"]*24*30; // окупаемость
$lvl5= ($sonfig_site["e_in_h"]*100)/$sonfig_site["amount_e_t"]/$sonfig_site["items_per_coin"]*24*30; // окупаемость
$lvl6= ($sonfig_site["f_in_h"]*100)/$sonfig_site["amount_f_t"]/$sonfig_site["items_per_coin"]*24*30; // окупаемость

?>


</div></div>


        <div class="row">
            <div class="col-md-12 col-lg-6">
<div class="row">
  <div class="col-md-12">
<?php
include '_claim.php';
?>
</div>
                <div class="col-md-12">
                    <div class="panel panel-color panel-warning">
                        <div class="panel-heading">
        <h3 class="panel-title carsinfoblockh3">Описание игрового процесса</h3>
    </div>
                          <div class="panel-body p-t-10">
        <h4 class="carsinfoh4">Автопарк, машины и скорость заработка:</h4>
      <p class="carsinfop">Чем больше машин в Вашем автопарке, тем больше доход он приносит. Основная единица измерения дохода в motormoney это "скорость заработка". У каждой из представленных машин своя скорость заработка, которая измеряется в количестве заработанных машиной рублей за час реального времени. Так, например, машина 9 уровня приносит 24.3 рубля в час, 583 рублей в день или 17496 рублей в месяц!</p>
        <h4 class="carsinfoh4">Способы заработка на проекте motormoney:</h4>
      <p class="carsinfop">Если вы не хотите покупать машины, то мы предлагаем Вам заработать следующими способами:</p>
      <p class="carsinfop" style="padding-left:20px;"><a href="/user/surfing">Сёрфинг сайтов</a> - смотрите сайты наших рекламодателей и получайте до 0,07 руб за один просмотр!</p>
      <!--<p class="carsinfop" style="padding-left:20px;"><a href="">Линия удачи</a>, <a href="">Одно из трех</a>, <a href="">Великая битва</a> - азартные игры с другими пользователями проекта.</p>-->
      <p class="carsinfop" style="padding-left:20px;"><a href="/user/partnership">Партнерская программа</a> - приглашайте в проект своих друзей и знакомых и получайте премиальные.</p>
      <p class="carsinfop" style="padding-left:20px;"><a href="/user/daily">Ежедневный бонус</a>, <a href="/contest">Конкурсы</a> - получайте призы и бонусы за свою активность на проекте!</p>
      <p class="carsinfop" style="padding-left:20px;"><a href="/user/quests">Оплачиваемые квесты</a> - получайте вознаграждение за выполнение простых и понятных заданий!</p>
    </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title text-muted font-light profilemsz"><i>Машины в Вашем автопарке</i></h4>
                        </div>
                          <div class="panel-body p-t-10">
      <div class="row">
	<table class="table table-bordered">
		<thead><th>Название</th><th>Осталось дней</th></thead>
<?php $life_time->GetTable($usid); ?>
	</table>      </div>
    </div>
                    </div>
                </div>
</div>
            </div>
<div class="col-md-12 col-lg-6">
<div class="row">
<div class="col-sm-12 col-sm-6">
      <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title text-center">Hyundai Solaris</h3></div>
          <div class="panel-body">
<div class="carsbuydiv"><img src="/img/cars/n1.png"></div>
<h5 class="profileinfoh5">Стоимость: <span><?=$sonfig_site["amount_a_t"]; ?> руб.</span></h5>
<h5 class="profileinfoh5">Доходность: <span><?=sprintf("%.0f",$lvl1); ?>% / мес.</span></h5>
<h5 class="profileinfoh5">Скорость: <span><?=$sonfig_site["a_in_h"]/10000; ?>Р / час</span></h5>

<form action="/carpark?shop" method="post">
<input type="hidden" name="item" value="1">
<button type="submit" class="btn waves-effect btn-default btn-block carsshopbtn"> <i class="mdi mdi-cart"></i> Купить машину (<?=$sonfig_site["amount_a_t"]; ?> р.)</button>
</form>

</div>
      </div>
  </div><div class="col-sm-12 col-sm-6">
      <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title text-center">Volkswagen Beetle</h3></div>
          <div class="panel-body">
<div class="carsbuydiv"><img src="/img/cars/n2.png"></div>
              <h5 class="profileinfoh5">Стоимость: <span><?=$sonfig_site["amount_b_t"]; ?> руб.</span></h5>
<h5 class="profileinfoh5">Доходность: <span><?=sprintf("%.0f",$lvl2); ?>% / мес.</span></h5>
<h5 class="profileinfoh5">Скорость: <span><?=$sonfig_site["b_in_h"]/10000; ?>Р / час</span></h5>

<form action="/carpark?shop" method="post">
<input type="hidden" name="item" value="2">
<button type="submit" class="btn waves-effect btn-default btn-block carsshopbtn"> <i class="mdi mdi-cart"></i> Купить машину (<?=$sonfig_site["amount_b_t"]; ?> р.)</button>
</form>
</div>
      </div>
  </div><div class="col-sm-12 col-sm-6">
      <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title text-center">Toyota Camry</h3></div>
          <div class="panel-body">
<div class="carsbuydiv"><img src="/img/cars/n3.png"></div>
              <h5 class="profileinfoh5">Стоимость: <span><?=$sonfig_site["amount_c_t"]; ?> руб.</span></h5>
<h5 class="profileinfoh5">Доходность: <span><?=sprintf("%.0f",$lvl3); ?>% / мес.</span></h5>
<h5 class="profileinfoh5">Скорость: <span><?=$sonfig_site["c_in_h"]/10000; ?>Р / час</span></h5>

<form action="/carpark?shop" method="post">
<input type="hidden" name="item" value="3">
<button type="submit" class="btn waves-effect btn-default btn-block carsshopbtn"> <i class="mdi mdi-cart"></i> Купить машину (<?=$sonfig_site["amount_c_t"]; ?> р.)</button>
</form>
</div>
      </div>
  </div><div class="col-sm-12 col-sm-6">
      <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title text-center">BMW 530i</h3></div>
          <div class="panel-body">
<div class="carsbuydiv"><img src="/img/cars/n4.png"></div>
              <h5 class="profileinfoh5">Стоимость: <span><?=$sonfig_site["amount_d_t"]; ?> руб.</span></h5>
<h5 class="profileinfoh5">Доходность: <span><?=sprintf("%.0f",$lvl4); ?>% / мес.</span></h5>
<h5 class="profileinfoh5">Скорость: <span><?=$sonfig_site["d_in_h"]/10000; ?>Р / час</span></h5>

<form action="/carpark?shop" method="post">
<input type="hidden" name="item" value="4">
<button type="submit" class="btn waves-effect btn-default btn-block carsshopbtn"> <i class="mdi mdi-cart"></i> Купить машину (<?=$sonfig_site["amount_d_t"]; ?> р.)</button>
</form>
</div>
      </div>
  </div><div class="col-sm-12 col-sm-6">
      <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title text-center">Audi Q7</h3></div>
          <div class="panel-body">
<div class="carsbuydiv"><img src="/img/cars/n5.png"></div>
              <h5 class="profileinfoh5">Стоимость: <span><?=$sonfig_site["amount_e_t"]; ?> руб.</span></h5>
<h5 class="profileinfoh5">Доходность: <span><?=sprintf("%.0f",$lvl5); ?>% / мес.</span></h5>
<h5 class="profileinfoh5">Скорость: <span><?=$sonfig_site["e_in_h"]/10000; ?>Р / час</span></h5>

<form action="/carpark?shop" method="post">
<input type="hidden" name="item" value="5">
<button type="submit" class="btn waves-effect btn-default btn-block carsshopbtn"> <i class="mdi mdi-cart"></i> Купить машину (<?=$sonfig_site["amount_e_t"]; ?> р.)</button>
</form>
</div>
      </div>
  </div><div class="col-sm-12 col-sm-6">
      <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title text-center">Mercedes-Benz SLS AMG</h3></div>
          <div class="panel-body">
<div class="carsbuydiv"><img src="/img/cars/n6.png"></div>
              <h5 class="profileinfoh5">Стоимость: <span><?=$sonfig_site["amount_f_t"]; ?> руб.</span></h5>
<h5 class="profileinfoh5">Доходность: <span><?=sprintf("%.0f",$lvl6); ?>% / мес.</span></h5>
<h5 class="profileinfoh5">Скорость: <span><?=$sonfig_site["f_in_h"]/10000; ?>Р / час</span></h5>

<form action="/carpark?shop" method="post">
<input type="hidden" name="item" value="6">
<button type="submit" class="btn waves-effect btn-default btn-block carsshopbtn"> <i class="mdi mdi-cart"></i> Купить машину (<?=$sonfig_site["amount_f_t"]; ?> р.)</button>
</form>
</div>
      </div>
  </div><div class="col-sm-12 col-sm-6">
      <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title text-center">Porsche 991 Cabrio</h3></div>
          <div class="panel-body">
<div class="carsbuydiv"><img src="/img/cars/n7.png"></div>
              <h5 class="profileinfoh5">Стоимость: <span>12500 руб.</span></h5>
<h5 class="profileinfoh5">Доходность: <span>32% / мес.</span></h5>
<h5 class="profileinfoh5">Скорость: <span>5.55? / час</span></h5>

<form action="/carpark?shop" method="post">
<input type="hidden" name="item" value="7">
<button type="submit" class="btn waves-effect btn-default btn-block carsshopbtn"> <i class="mdi mdi-cart"></i> Купить машину (12500 руб.)</button>
</form>
</div>
      </div>
  </div><div class="col-sm-12 col-sm-6">
      <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title text-center">Tesla Model S</h3></div>
          <div class="panel-body">
<div class="carsbuydiv"><img src="/img/cars/n8.png"></div>
              <h5 class="profileinfoh5">Стоимость: <span>20000 руб.</span></h5>
<h5 class="profileinfoh5">Доходность: <span>33% / мес.</span></h5>
<h5 class="profileinfoh5">Скорость: <span>9.16? / час</span></h5>

<form action="/carpark?shop" method="post">
<input type="hidden" name="item" value="8">
<button type="submit" class="btn waves-effect btn-default btn-block carsshopbtn"> <i class="mdi mdi-cart"></i> Купить машину (20000 руб.)</button>
</form>
</div>
      </div>
  </div><div class="col-sm-12 col-sm-6">
      <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title text-center">Ferrari F12</h3></div>
          <div class="panel-body">
<div class="carsbuydiv"><img src="/img/cars/n9.png"></div>
              <h5 class="profileinfoh5">Стоимость: <span>50000 руб.</span></h5>
<h5 class="profileinfoh5">Доходность: <span>35% / мес.</span></h5>
<h5 class="profileinfoh5">Скорость: <span>24.3? / час</span></h5>

<form action="/carpark?shop" method="post">
<input type="hidden" name="item" value="9">
<button type="submit" class="btn waves-effect btn-default btn-block carsshopbtn"> <i class="mdi mdi-cart"></i> Купить машину (50000 руб.)</button>
</form>
</div>
      </div>
  </div></div>
</div>
        </div>
        <!-- end row -->


    </div><!-- container -->


</div> <!-- Page content Wrapper -->
<link href="./style/sweet-alert.css" rel="stylesheet" type="text/css">
<script src="./style/sweet-alert.min.js"></script>

</div> <!-- content -->