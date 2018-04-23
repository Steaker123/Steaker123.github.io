<?PHP
$_OPTIMIZATION["title"] = "Банкомет - Каждый день!";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

$um = 11;

$db->Query("SELECT * FROM db_config WHERE id = '1'");
$data_c = $db->FetchArray();
$db->FreeMemory();

# Определение платежей по акции 'Накопительный банк'
$c_date = date("Ymd",time());
$c_date_begin = strtotime($c_date." 00:00:00");
$c_date_end = strtotime($c_date." 23:59:59");

$db->Query("SELECT sum(serebro) FROM db_insert_money WHERE date_add >='".$c_date_begin."' AND  date_add <='".$c_date_end."' AND money >= '1'" );
if($db->NumRows() == 0) $sum_c = 0;
else $sum_c = $db->FetchRow();

if($sum_c == '') $sum_c = 0;
?>

<div class="alert alert-warning">
<p><center>Каждый день! Суммируются все поступления на проект в течение дня, начисляется <font style="color:#e22;"><b>3%</b></font> от суммы текущего банка.<br>
Призовыми являются только три места. Они делят 3% от банка между собой следующим образом:<br/><br/>


<div class="btn-group" style="background: #fff;">
	<div class="btn panel-danger"><img src="/img/1st.png"><br/> <b style="font-size: 28px">1.5%</b></div>
	<div class="btn panel-danger"><img src="/img/2st.png"><br/> <b style="font-size: 28px">1.0%</b></div>
	<div class="btn panel-danger"><img src="/img/3st.png"><br/> <b style="font-size: 28px">0.5%</b></div>
</div>
</center>
</p>

<?PHP

$c_date = date("Ymd",time());
$c_date_begin = strtotime($c_date." 00:00:00");
$c_date_end = strtotime($c_date." 23:59:59");
$y_date = date("Ymd",time()-24*60*60);
$y_date_begin = strtotime($y_date." 00:00:00");
$y_date_end = strtotime($y_date." 23:59:59");

# Определение платежей по акции 'Накопительный банк'
$c_date = date("Ymd",time());
$c_date_begin = strtotime($c_date." 00:00:00");
$c_date_end = strtotime($c_date." 23:59:59");
$now = time();
$zavershenie = $c_date_end - $now;
$hours = floor($zavershenie/3600);
floor($minutes =($zavershenie/3600 - $hours)*60);
$seconds = ceil(($minutes - floor($minutes))*60);
$min=ceil($minutes)-1;

?>

 <center><div class="alert">
 <b style="font-size: 20px;">Сумма текущего банка <font style="color:#71c65B;"><?=$sum_c?></font> монет</b>
 <h2 style="width: 500px;font-size: 20px;">Розыгрыш состоится через:  <font style="color:#e1261B;"><span id="my_timer"><?=$hours;?>:<?=$min;?>:<?=$seconds;?></span></font></h2></div></center>

</div>

<center><h3>Участники сегодняшнего розыгрыша</h3></center>
<table class='table table-bordered table-striped' align='center' width="99%">
  <tr>
	<td align="center" class="m-tb">Пользователь</td>
	<td align="center" class="m-tb">Пополнение</td>
	<td align="center" class="m-tb">Место в конкурсе</td>
	<td align="center" class="m-tb">Время</td>
	<td align="center" class="m-tb">Сумма Выигрыша</td>
  </tr>

<?php
//echo "<center><div class='alert'>Розыгрыш состоится через: $hours:$min:$seconds</div></center>";
$db->Query("SELECT user, SUM(serebro) AS serebro FROM db_insert_money WHERE date_add >='".$c_date_begin."' AND  date_add <='".$c_date_end."' GROUP BY user ORDER BY serebro DESC LIMIT 7");

if($db->NumRows() > 0){
	$i=1;
while($bon = $db->FetchArray()){
	
?>

		
	<tr class="htt">
    		<td align="center"><?=$bon["user"]; ?></td>
    		<td align="center"><?=$bon["serebro"]; ?></td>
    		<td align="center"><?=$i; ?></td>
		<td align="center"><?=date("H:i:s",$bon["date_add"]); ?></td>
		<td align="center"><?PHP if ($i==1) echo $sum_c*0.025; else if ($i==2) echo $sum_c*0.015; else if ($i==3) echo $sum_c*0.01; else echo "0";?></td>
  	</tr>


	<?PHP
		$i++;
		}

  
	}else echo '<tr><td align="center" colspan="5">Нет записей</td></tr>'
  ?>

</table>

<hr>
  <center>
	<h3><b>Результаты предыдущих розыгрышей</b></h3>
    </center>

<table class='table table-bordered table-striped' align='center' width="99%">
<tr>
	<td align="center" class="m-tb">ID</td>
	<td align="center" class="m-tb">Дата</td>	
	<td align="center" class="m-tb">Пользователь</td>
	<td align="center" class="m-tb">Банк</td>
	<td align="center" class="m-tb">Приз</td>
</tr>

<?PHP
$db->Query("SELECT a.id as id, a.sum as sum, a.bank as bank, a.date_add as date_add, b.user as user FROM db_back a LEFT OUTER JOIN db_users_a b ON b.id = a.user_id ORDER BY a.id DESC LIMIT 20");


if($db->NumRows() > 0) {
	$count = 0;
	
	while($bon = $db->FetchArray()) {
		if($count%2 == 0) {
?>
		<tr class="htt">
    		<td align="center"><?=$bon["id"]; ?></td>
    		<td align="center"><?=date("d.m.Y",$bon["date_add"]); ?></td>			
    		<td align="center"><?=$bon["user"]; ?></td>
    		<td align="center"><?=$bon["bank"]; ?></td>
		<td align="center"><?=$bon["sum"]; ?></td>
  		</tr>

<?PHP
		} else {
?>

	<tr class="htt">
    		<td align="center"><?=$bon["id"]; ?></td>
    		<td align="center"><?=date("d.m.Y",$bon["date_add"]); ?></td>			
    		<td align="center"><?=$bon["user"]; ?></td>
    		<td align="center"><?=$bon["bank"]; ?></td>
		<td align="center"><?=$bon["sum"]; ?></td>
  	</tr>

<?PHP
		}
		
		$count ++;
	}
} else echo '<tr><td align="center" colspan=5>Нет записей</td></tr>'

?>

</table>
<?php
/*$db->Query("SELECT date_add as date_add, user as user, user_id as user_id, serebro as sserebro  FROM db_insert_money WHERE date_add >='".$y_date_begin."' AND  date_add <='".$y_date_end."' GROUP BY user ORDER by sserebro DESC LIMIT 2,3");
$firstuser=$db->FetchArray();
$firstpercent=(1.5/100)*$sum_c;
$db->Query("UPDATE db_users_b SET money_b = money_b + '".$firstpercent."' WHERE id = '".$firstuser['user_id']."'");	

echo $firstuser["user"];*/
?>
	

