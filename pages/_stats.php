<?PHP
$_OPTIMIZATION["title"] = "Статистика";
$_OPTIMIZATION["description"] = "Статистика выплаты, регистрации, пополнения, лидеры.";
$_OPTIMIZATION["keywords"] = "Статистика, последняя статистика игры с выводом денег платящие игры экономические фермы";
?>
<style>
@media (min-width:1600px) {
.card__period {
    font-size: 12px;
    letter-spacing: 1px;
}
}
</style>

<?PHP
$tfstats = time() - 60*60*24;
$db->Query("SELECT 
(SELECT COUNT(*) FROM db_users_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment,
(SELECT COUNT(*) FROM db_users_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();
?>

<div class="head-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="title-page">Статистика</h1>
        <div class="breadcrumbs">
          <ul class="breadcrumbs__list">
            <li class="breadcrumbs__item">
              <a href="/" class="breadcrumbs__link">Главная</a>
            </li>
            <li class="breadcrumbs__item">Статистика</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="content" style="padding-bottom:50px;">
        <div class="container">
      <div class="col-md-6">
      <div class="course__price" style="margin-bottom:15px;">
        <div class="course__price-item">
          <div class="course__price-kind">Всего пополнено:</div>
          <div class="course__price-value"><?=sprintf("%.2f",$stats_data["all_insert"]); ?> руб.</div>
        </div>
        <div class="course__price-item">
          <div class="course__price-kind">Всего выплачено:</div>
          <div class="course__price-value"><?=sprintf("%.2f",$stats_data["all_payment"]); ?> руб.</div>
        </div>
      </div>
    </div>
      <div class="col-md-6">
      <div class="course__price" style="margin-bottom:15px;">
        <div class="course__price-item">
          <div class="course__price-kind">Всего участников:</div>
          <div class="course__price-value"><?=$stats_data["all_users"]; ?> чел.</div>
        </div>
        <div class="course__price-item">
          <div class="course__price-kind">Новых за 24 часа:</div>
          <div class="course__price-value"><?=$stats_data["new_users"]; ?> чел.</div>
        </div>
      </div>
    </div>
      <div class="col-md-6">
                <div class="popup_protect__def__img col" style="display: block;">
        <img src="/img/stats_1.png">
      </div>
                <div class="card__head">
        <h3 class="card__name">Рейтинг участников по скорости заработка</h3>
        <div class="card__period">Обновление раз в 60 минут</div>
      </div>
        <table class="bordered" style="width:100%;margin-bottom:15px;">
            <thead>
            <tr>
              <th>Логин</th>
              <th>Дата регистрации</th>
              <th>Скорость</th>
            </tr>
            </thead>
            <tbody><tr>
                  <td>Analyzer</td>
                  <td>08/06/2017 в 10:49</td>
                  <td>69.9716 руб.</td>
              </tr><tr>   </tbody></table>
            </div>
      <div class="col-md-6">
                <div class="popup_protect__def__img col" style="display: block;">
        <img src="/img/stats_2.png">
      </div>
                <div class="card__head">
        <h3 class="card__name">Рейтинг участников по доходу с рефералов</h3>
        <div class="card__period">Обновление раз в 60 минут</div>
      </div>
        <table class="bordered" style="width:100%;margin-bottom:15px;">
            <thead>
            <tr>
              <th>Логин</th>
              <th>Дата регистрации</th>
              <th>Реф. доход</th>
            </tr>
            </thead>
            <tbody>
<?php
	$db->Query("SELECT * FROM `db_users_b`,`db_users_a` WHERE db_users_b.id = db_users_a.id ORDER BY db_users_b.to_referer DESC LIMIT 5 ");

	while($data = $db->FetchArray()){
	?><tr>
                  <td><?=$data["user"]; ?></td>
                  <td><?=date("d/m/Y в H:i",$data["date_reg"]); ?></td>
                  <td><?=sprintf("%.2f",$data["to_referer"]); ?> руб.</td>
              </tr>
	<?PHP
	}
?> </tbody></table>
            </div>
      <div class="col-md-6">
                <div class="popup_protect__def__img col" style="display: block;">
        <img src="/img/stats_3.png">
      </div>
                <div class="card__head">
        <h3 class="card__name">Рейтинг участников по сумме заработка</h3>
        <div class="card__period">Обновление раз в 10 минут</div>
      </div>
        <table class="bordered" style="width:100%;margin-bottom:15px;">
            <thead>
            <tr>
              <th>Логин</th>
              <th>Дата регистрации</th>
              <th>Выведено</th>
            </tr>
            </thead>
            <tbody>
<?php
	$db->Query("SELECT * FROM `db_users_b`,`db_users_a` WHERE db_users_b.id = db_users_a.id ORDER BY db_users_b.payment_sum DESC LIMIT 5 ");
	while($data = $db->FetchArray()){
	?><tr>
                  <td><?=$data["user"]; ?></td>
                  <td><?=date("d/m/Y в H:i",$data["date_reg"]); ?></td>
                  <td><?=sprintf("%.2f",$data["payment_sum"]); ?> руб.</td>
              </tr>
	<?PHP
	}
?></tbody></table>
            </div>
      <div class="col-md-6">
                <div class="popup_protect__def__img col" style="display: block;">
        <img src="/img/stats_4.png">
      </div>
                <div class="card__head">
        <h3 class="card__name">Рейтинг участников по кол-ву рефералов</h3>
        <div class="card__period">Обновление раз в 10 минут</div>
      </div>
        <table class="bordered" style="width:100%;margin-bottom:15px;">
            <thead>
            <tr>
              <th>Логин</th>
              <th>Дата регистрации</th>
              <th>Рефералы</th>
            </tr>
            </thead>
            <tbody>
<?php
	$db->Query("SELECT * FROM `db_users_a` ORDER BY referals DESC LIMIT 5 ");
	while($data = $db->FetchArray()){
	?><tr>
                  <td><?=$data["user"]; ?></td>
                  <td><?=date("d/m/Y в H:i",$data["date_reg"]); ?></td>
                  <td><?=$data["referals"]; ?> чел.</td>
              </tr>
	<?PHP
	}
?>
	  </tbody></table>
            </div>
      <div class="col-md-6">
                <div class="popup_protect__def__img col" style="display: block;">
        <img src="/img/stats_5.png">
      </div>
                <div class="card__head">
        <h3 class="card__name">Последние 20 выплат участникам</h3>
        <div class="card__period">За последние 7 дней: 0.00 руб.</div>
      </div>
        <table class="bordered" style="width:100%;">
            <thead>
            <tr>
              <th>Логин</th>
              <th>Дата выплаты</th>
              <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
<?PHP

$all_pay_sum=0;
$dt = time() - 60*60*48;
$db->Query("SELECT * FROM db_payment, db_users_a  WHERE db_payment.status = '3' AND db_users_a.user = db_payment.user ORDER BY db_payment.date_add DESC LIMIT 20");
	while($data1 = $db->FetchArray()){
	
	$all_pay_sum += $data1["serebro"]/100;
?>
		<tr>
                  <td><?=$data1["user"]; ?>/td>
                  <td><?=date("d/m/Y H:i",$data1["date_add"]); ?></td>
                  <td><?=sprintf("%.2f",$data1["sum"]); ?> руб.</td>
              </tr>
	<?PHP
	}
?></tbody></table>
            </div>


      <div class="col-md-6">
                <div class="popup_protect__def__img col" style="display: block;">
        <img src="/img/stats_6.png">
      </div>
                <div class="card__head">
        <h3 class="card__name">Последние 20 пополнений баланса</h3>
        <div class="card__period">За последние 7 дней: 0.00 руб.</div>
      </div>
        <table class="bordered" style="width:100%;">
            <thead>
            <tr>
              <th>Логин</th>
              <th>Дата пополнения</th>
              <th>Сумма</th>
            </tr>
            </thead>
            <tbody>

<?PHP	
$db->Query("SELECT * FROM db_insert_money, db_users_a  WHERE  db_users_a.user = db_insert_money.user ORDER BY db_insert_money.date_add DESC LIMIT 20");
	while($data2 = $db->FetchArray()){
?>
<tr>
                  <td><?=$data1["user"]; ?></td>
                  <td><?=date("d/m/Y H:i",$data1["date_add"]); ?></td>
                  <td><?=sprintf("%.2f",$data1["sum"]); ?> руб.</td>
              </tr>

	<?PHP
	}
?>
</tbody></table>
            </div>
  </div>
</div>