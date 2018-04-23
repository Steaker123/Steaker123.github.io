
<?PHP
$_OPTIMIZATION["title"] = " Заказ выплаты";
$user_id = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$user_id' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$config_site = $db->FetchArray();

$status_array = array( 0 => "Проверяется", 1 => "Выплачивается", 2 => "Отменена", 3 => "Выплачено");
# Минималка серебром!
$minPay = 100;
/*if($user_id != '1'){
	echo '<center><b><font color = "red">Ведутся технические работы</font></b></center><BR />';
	return;
}*/

?>
<style>
body{background:#f3f2f0 !important;}
.insert_box{padding: 10px;border-radius: 10px;-moz-box-shadow: 0 1px 2px 0 rgba(0,0,0,.14);-webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,.14);box-shadow: 0 1px 2px 0 rgba(0,0,0,.14);}
.insert_new_btn {
    color: #fff;
    font-weight: 700;
    border: none;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;
    border-bottom-left-radius: 50px;
    border-top-left-radius: 50px;
    outline: none;
    -webkit-transition: 333ms ease-in-out;
    transition: 333ms ease-in-out;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding: 10px 38px 10px;
	margin-top:10px;
    font-size: 15px;
	letter-spacing:1px;
    background-color: #ff8c00;
    -webkit-box-shadow: 0 10px 15px 0 rgba(255,140,0,.2);
    box-shadow: 0 7px 15px 0 rgba(255,140,0,.2);
    text-shadow: 1px 1px #de7a00;
}
.insert_new_input{border-radius: 50px;letter-spacing: 1px;text-align: center;background-color: #fdfdfd;height: 41px;font-size: 13px;}
.insert_new_input:focus::-webkit-input-placeholder {color: transparent}
.insert_new_input:focus::-moz-placeholder          {color: transparent}
.insert_new_input:focus:-moz-placeholder           {color: transparent}
.insert_new_input:focus:-ms-input-placeholder      {color: transparent}
.insert_new_btn:hover{color:#fff !important;-webkit-transition:133ms ease-in-out;transition:133ms ease-in-out-webkit-box-shadow:0 7px 30px 0 rgba(255,140,0,.4));box-shadow:0 7px 30px 0 rgba(255,140,0,.4);}
.insert_new_btn:active{color:#fff !important;}
.insert_new_btn:focus{color:#fff !important;}
@media (min-width: 1200px) and (max-width: 1470px) {.insert_new_btn{font-size: 13px;padding: 10px 0px 10px;}}
.balancei_form {
    margin-top: 20px;
}
</style>
<div class="page-content-wrapper ">

    <div class="container">

<?PHP
# Заглушка запрещает выводить более 50 руб.
if($_POST["sum"] >= 4999){
?>
<center class="alert alert-warning">Максимальная сумма вывода доступная для Вас составляет <b>50 рублей!</b> за 24 часа.</center>
<?PHP
return;
}
?>

<?PHP
# Заносим выплату
if(isset($_POST['swap'])){ // проверка: была ли отправлена форма
	if(!empty($_POST['purse'])){
		$ps = Array(
		'Payeer'=>'1136053',
		'QIWI'=>'60792237',
		'ЯндексДеньги'=>'25344',
		'Билайн'=>'24898938',
		'Мегафон'=>'24899391',
		'МТС'=>'24899291',
		'ТЕЛЕ2'=>'95877310',
		'VISA' =>'117146509',
		'MASTERCARD' =>'57644634',
		'MAESTRO' =>'57766314'
		);
		$ps = $ps[$_POST['ps']];
		if(!empty($ps)){
			if($_POST['ps'] == 'Payeer'){
				function ViewPurse($purse){
					if( substr($purse,0,1) != "P" ) return false;
					if( !preg_match("#^[0-9]{7,8}$#", substr($purse,1)) ) return false;	
					return $purse;
				}
			}
			if($_POST['ps'] == 'ЯндексДеньги'){
				function ViewPurse($purse){
					if( !preg_match("#^41001[0-9]{7,10}$#",$purse) ) return false;
					return $purse;
				}
				$minPay = '1000';
			}
			if($_POST['ps'] == 'QIWI'){
				function ViewPurse($purse){
					if( !preg_match("#^\+(91|994|82|372|375|374|44|998|972|66|90|81|1|507|7|77|380|371|370|996|9955|992|373|84)[0-9]{6,14}$#",$purse) ) return false;
					return $purse;
				}
				$minPay = '1000';
			}
			if(isset($_POST['phone']) && $_POST['ps'] != 'QIWI'){
				function ViewPurse($purse){
					if( !preg_match("#^[\+]{1}[7]{1}[9]{1}[\d]{9}$#",$purse) ) return false;
					return $purse;
				}
				$minPay = '1000';
			}
			
			if($_POST['ps'] == 'VISA'){
				function ViewPurse($purse){
					if(!preg_match("#^([45]{1}[\d]{15}|[6]{1}[\d]{17})$#",$purse)) return false;
					return $purse;
				}
			}
			if($_POST['ps'] == 'MASTERCARD'){
				function ViewPurse($purse){
					if( !preg_match("#^([45]{1}[\d]{15}|[6]{1}[\d]{17})$#",$purse) ) return false;
					return $purse;
				}
				
			}
			if($_POST['ps'] == 'MAESTRO'){
				function ViewPurse($purse){
					if( !preg_match("#^([45]{1}[\d]{15}|[6]{1}[\d]{15,17})$#",$purse) ) return false;
					return $purse;
				}
				
			}
			if(isset($_POST['card'])){
				$minPay = '650';
				function ViewPerson($person){
					if( !preg_match("#^([a-zA-ZА-Яабвгдеёжзийклмнопрстуфхцчшщьыъэюя\.\-\' ]+)$#",$person) ) return false;
					return $person;
				}
				$person = ViewPerson($_POST['person']);
			}
			$purse = ViewPurse($_POST['purse']);
			if($purse != false){
			if((!empty($person) AND $person != false) OR !isset($person)){
				$sum = round(intval($_POST['sum']),2);
				$val = 'RUB';
				if($sum >= $minPay){
					if($sum <= $user_data['money_p']){
					# Проверяем на существующие заявки
						$db->Query("SELECT COUNT(*) FROM db_payment WHERE user_id = '$user_id' AND (status = '0' OR status = '1')");
						if($db->FetchRow() == 0){
							$sum_pay = round( ($sum / $config_site['ser_per_wmr']), 2);
							if($user_data["pay_points"] >= $sum_pay){
							# Делаем выплату
								$payeer = new rfs_payeer($config->AccountNumber, $config->apiId, $config->apiKey);
								if ($payeer->isAuth()){
									$arBalance = $payeer->getBalance();
									if($arBalance['auth_error'] == 0){
										$balance = $arBalance['balance']['RUB']['DOSTUPNO'];
										if($balance >= $sum_pay){
											$array = array(
												'action' => 'output',
												'ps' => $ps,
												'curIn' => $val, // счет списания
												'sumOut' => $sum_pay, // сумма получения
												'curOut' => $val, // валюта получения
												'param_ACCOUNT_NUMBER' => $purse // получатель
											);
											if(!empty($person)){
												$array['param_CONTACT_PERSON'] = $person;
											}
											$initOutput = $payeer->initOutput($array);
											if ($initOutput){
												$historyId = $payeer->output();
													if ($historyId > 0){
													# Снимаем с пользователя
														$db->Query("UPDATE db_users_b SET money_p = money_p - '$sum', payment_sum = payment_sum + '$sum_pay', pay_points = pay_points - '$sum_pay' WHERE id = '$user_id'");
														
														# Вставляем запись в выплаты
														$da = time();
														$dd = $da + 60*60*24*15;
														
														$ppid = $arTransfer["historyId"];
															
														$db->Query("INSERT INTO db_payment (user, user_id, purse, sum, valuta, serebro, pay_sys_id, payment_id, date_add, status) VALUES ('$usname','$user_id','$purse','$sum_pay','RUB', '$sum', '$ps', '$ppid','".time()."', '3')");
															
														$db->Query("UPDATE db_stats SET all_payments = all_payments + '$sum_pay' WHERE id = '1'");
														echo "<center><font color = 'green'><b>Выплачено!</b></font></center><BR />";
														$db->Query("SELECT * FROM db_users_b WHERE id = '$user_id' LIMIT 1");
														$user_data = $db->FetchArray();
													}else{
														echo '<center><font color = "red"><b>Ошибка ['.print_r($payeer->getErrors(), true).'] - попробуйте через  20-30 секунд или сообщите о ней администратору!</b></font></center><BR />';
													}
											}else{
												echo '<center><font color = "red"><b>Ошибка ['.print_r($payeer->getErrors(), true).'] - попробуйте через 20-30 секунд или сообщите о ней администратору!</b></font></center><BR />';
											}
										}else echo '<center><font color = "red"><b>Сервер перегружен - попробуйте через 10-30 секунд или сообщите о ней администратору</b></font></center><BR />';
									}else echo '<center><font color = "red"><b>Не удалось выплатить! Попробуйте позже.</b></font></center><BR />';
								}else echo '<center><font color = "red"><b>Не удалось выплатить! Попробуйте позже. Ошибка № 631 </b></font></center><BR />';
    							  }else echo '<center><font color = "red"><b>У вас недостаточно <a href="/energy">Энергии!</a></b></font></center><BR />';
							}else echo '<center><font color = "red"><b>У вас имеются необработанные заявки. Дождитесь их выполнения.</b></font></center><BR />';
					}else echo '<center><font color = "red"><b>Вы указали больше, чем имеется на вашем счету.</b></font></center><BR />';
				}else echo '<center><b><font color = "red">Минимальная сумма для выплаты составляет '.$minPay.' руб!</font></b></center><BR />';
				}else echo '<center><b><font color = "red">Данные держателя карты указаны неверно!</font></b></center><BR />';
			}else echo '<center><b><font color = "red">Номер счета '.$purse.' указан неверно</font></b></center><BR />';
		}else echo '<center><b><font color = "red">Платежная система не указана!</font></b></center><BR />';
	}else echo '<center class="alert alert-danger"><b>Вы не ввели номер кошелька</b></center><BR />';
}
?>


<style>
	.selectPS{
    display: inline-block;
    width: 100px;
    vertical-align: top;
    text-align: center;
    padding: 5px 5px 10px 5px;
    margin: 5px 2px;
	text-transform: uppercase;
    background: #f8f9f9; border-radius: 4px;
    border: 1px solid #d7d7d7;
    cursor: pointer;
}
.selectPS:hover{
    border: 1px solid #0c6f84;
    background: #D1e0F8;
}
.selectPS .imagesps{
    width: 55px;
    box-sizing: border-box;
    height: 55px;margin: 0 auto;
    display: block;
}
.selectPS label{
    font-size: 8pt;
    display: block;
    margin-top: 10px;
}
</style>
<script type="text/javascript">
function addfield(ps,name){
	var el = document.getElementById('new');
	var el1 = document.getElementById('new1');
	var el2 = document.getElementById('new2');
	var el3 = document.getElementById('new3');
	if(el){el.parentNode.removeChild(el);}
	if(el1){el1.parentNode.removeChild(el1);}
	if(el2){el2.parentNode.removeChild(el2);}
	if(el3){el3.parentNode.removeChild(el3);}
	if(ps == 'phone'){
		var newTd = document.createElement('td');
		newTd['id'] = 'new';
		newTd.innerHTML = '<label>Номер телефона '+name+':</label>';
		paysys.insertBefore(newTd, paysys.children[0]);
		var newTd = document.createElement('td');
		newTd['id'] = 'new1';
		newTd.innerHTML = '<input class="form-control" style="margin: 2px 0;" type="text" name="purse" size="15"><input type="hidden" name="ps" value="'+name+'"><input type="hidden" name="phone">';
		paysys.insertBefore(newTd, paysys.children[1]);
		min = 1000;
		document.getElementById('str_min').style.display = 'block';
		document.getElementById('min').innerHTML = min;
		document.getElementById('name_ps').innerHTML = name;
	}
	if(ps == 'eps'){
		var newTd = document.createElement('td');
		newTd['id'] = 'new';
		newTd.innerHTML = '<label>Номер счета '+name+':</label>';
		paysys.insertBefore(newTd, paysys.children[0]);
		var newTd = document.createElement('td');
		newTd['id'] = 'new1';
		newTd.innerHTML = '<input type="text" class="form-control" style="margin: 2px 0;" name="purse" size="15"><input type="hidden" name="ps" value="'+name+'">';
		paysys.insertBefore(newTd, paysys.children[1]);
		min = <?=$minPay;?>;
		if(name == 'Яндекс'){min = 1000;}
		document.getElementById('str_min').style.display = 'block';
		document.getElementById('min').innerHTML = min;
		document.getElementById('name_ps').innerHTML = name;
	}	
	if(ps == 'card'){
		var newTd = document.createElement('td');
		newTd['id'] = 'new';
		newTd.innerHTML = '<label>Номер карты '+name+':</label>';
		paysys.insertBefore(newTd, paysys.children[0]);
		var newTd = document.createElement('td');
		newTd['id'] = 'new1';
		newTd.innerHTML = '<input type="text" class="form-control" name="purse" size="15"><input type="hidden" name="ps" value="'+name+'"><input type="hidden" name="card">';
		paysys.insertBefore(newTd, paysys.children[1]);
		var newTd = document.createElement('td');
		newTd['id'] = 'new2';
		newTd.innerHTML = '<label>Имя, Фамилия держателя:</label>';
		person.insertBefore(newTd, person.children[0]);
		var newTd = document.createElement('td');
		newTd['id'] = 'new3';
		newTd.innerHTML = '<input class="form-control" style="margin: 2px 0;" type="text" name="person" size="15">';
		person.insertBefore(newTd, person.children[1]);
		min = 65000;
		document.getElementById('str_min').style.display = 'block';
		document.getElementById('min').innerHTML = min;
		document.getElementById('name_ps').innerHTML = name;
	}
}
</script>

        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/pb_logo.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a onclick="addfield('eps','Payeer');" href="#select" type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Заказать выплату </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/ym_logo.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a onclick="addfield('eps','ЯндексДеньги');" href="#select" type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Заказать выплату </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/qiwi_logo.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a onclick="addfield('phone','QIWI');" href="#select" type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Заказать выплату </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/maestro.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a onclick="addfield('card','MAESTRO');" href="#select" type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn" data-toggle="modal" data-target="#paymodal_1"><i class="fa fa-credit-card"></i> Заказать выплату </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/pm_logo.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a type="button" disabled="" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Временно недоступно </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/card_logo.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a onclick="addfield('card','VISA');" href="#select" type="button" disabled="" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Временно недоступно </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/wm_logo.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a type="button" disabled="" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Временно недоступно </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/master.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a onclick="addfield('card','MASTERCARD');" href="#select" type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Заказать выплату </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/bl_logo.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a onclick="addfield('phone','Билайн');" href="#select" type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Заказать выплату </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/t2_logo.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a onclick="addfield('phone','ТЕЛЕ2');" href="#select" type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Заказать выплату </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/mts_logo.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a onclick="addfield('phone','МТС');" href="#select" type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Заказать выплату </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/mg_logo.png">
    <form class="balancei_form">
                            <div class="form-group m-b-0">
          <a onclick="addfield('phone','Мегафон');" href="#select" type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn"><i class="fa fa-credit-card"></i> Заказать выплату </a>
      </div>
  </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


<?

# Заглушка от халявщиков
if($user_data["insert_sum"] >=0 OR $user_data["kredit"] >= 1){

?>
<div class="panel panel-default" id="select">
<div id="str_min" class="panel-heading" style="display:none;">Минимальная сумма выплаты на <b><span id="name_ps"></span></b> составляет <span id="min"></span> монет.</div>
<form action="" method="post">
<div class="panel-body">
<table id="pay"width="99%" style="max-width: 500px;" border="0" align="center">
  <tr id="paysys"></tr>
  <tr id="person"></tr>
  <tr>
    <td><label>Сумма для вывода:</label> </td>
	<td><div class="input-group" style="max-width: 150px;"><input class="form-control" type="text" name="sum" id="sum" value="<?=round($user_data['money_p']); ?>" size="15"><span class="input-group-addon">Монет </span></div></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
	<input class="btn btn-success" type="submit" name="swap" value="Заказать выплату" style="margin-top:10px;" /></td>
  </tr>
</table></div>
</form>
</div>
<?$minPay = '';?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title racetabletitle"><i class="fa fa-list-ul"></i> Ваши последние выплаты</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
<thead>
	<th align="center" class="m-tb">Монеты</th>
	<th align="center" class="m-tb">Сумма</th>
	<th align="center" class="m-tb">Система</th>
	<th align="center" class="m-tb">Кошелек</th>
	<th align="center" class="m-tb">Дата</th>
	<th align="center" class="m-tb">Статус</th>
</thead><tbody>
  <?PHP
  
  $db->Query("SELECT * FROM db_payment WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 10");
  
	if($db->NumRows() > 0){
	$img = Array(
		'1136053'=>'payeer',
		'60792237'=>'qiwi',
		'25344'=>'yandex',
		'24898938'=>'beeline',
		'24899391'=>'megafon',
		'24899291'=>'mts',
		'95877310'=>'tele2',
		'117146509' =>'visa',
		'57644634' =>'master',
		'57766314' =>'maestro'
		);
  		while($ref = $db->FetchArray()){
		
		?>
	<tr class="htt">
    		<td align="center"><?=$ref["serebro"]; ?></td>
    		<td align="center"><?=sprintf("%.2f",$ref["sum"] - $ref["comission"]); ?> <?=$ref["valuta"]; ?></td>
		<td align="center"><? if(!empty($ref["pay_sys_id"])){echo '<img src="/img/ps/'.$img[$ref["pay_sys_id"]].'.png" width="25px">';}?></td>
    		<td align="center"><?=$ref["purse"]; ?></td>
		<td align="center"><?=date("d.m.Y",$ref["date_add"]); ?></td>
    		<td align="center"><?=$status_array[$ref["status"]]; ?></td>
  	</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="6">Нет записей</td></tr>'
  
  ?>
</tbody>
</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </div><!-- container -->


</div>
<?PHP

return;
}

?>

<center class="alert alert-danger"><b>Вы не можете заказать выплату! </b><br/><small> Сумма ваших пополнений не более 50 рублей, Пожалуйста пополните баланс!<BR />
<a href="/insert"><b>Перейти к разделу</b></a> и пополнить баланс на необходимую сумму для возможности вывода средств.</small></center>


