<?PHP
$_OPTIMIZATION["title"] = "Ежедневный бонус";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

# Реф начисление
$db->Query("SELECT user, referer_id FROM db_users_a WHERE id = '{$usid}' LIMIT 1");
$user_refdata = $db->FetchArray();
$refid = $user_refdata["referer_id"];

# Настройки бонусов
$bonus_min = 10;
$bonus_max = 100;

?>

<div class="page-content-wrapper ">

    <div class="container">
        <div class="row">
            <div class="col-lg-9 partner_cl">
                <div class="panel panel-primary">
                    <div class="panel-body">
  <p class="raceinfotext">Каждый пользователь проекта имеет возможность раз в сутки получить ежедневный бонус, сумма бонуса 0,1 - 1 рубль. Благодаря ежедневному бонусу, <a href="/user/surfing">сёрфингу сайтов</a> и/или <a href="/user/partnership">партнерской программе</a> пользователи проекта, которые решили участвовать в проекте без вложений могут накопить на машины начальных уровней, тем самым заработать реальные деньги без инвестиций.</p>


	
<?PHP
$ddel = time() + 60*60*24;
$dadd = time();
$db->Query("SELECT COUNT(*) FROM db_bonus WHERE user_id = '$usid' AND date_del > '$dadd'");

$hide_form = false;

	if($db->FetchRow() == 0){
	
		# Выдача бонуса
		if(isset($_POST["bonus"])){
		
			$sumrad = rand($bonus_min, rand($bonus_min, $bonus_max) );
			$sum=$sumrad;
			$sumref = $sum * 0.05; // Реф начисление 5%
			$energy = $sum * 0.01; // Даем 10% энергии от бонуса
			
			# Зачилсяем юзверю
			$db->Query("UPDATE db_users_b SET money_p = money_p + '$sum' WHERE id = '$usid'");
			$db->Query("UPDATE db_users_b SET pay_points = pay_points + '$energy' WHERE id = '$usid'"); // 10 процентов энергии
			$db->Query("UPDATE db_users_b SET money_p = money_p + '$sum' WHERE id = '$usid'");
			$db->Query("UPDATE db_users_b SET money_p = money_p + '$sumref' WHERE id = '$refid'"); // Реф начисление.
			$db->Query("UPDATE db_users_b SET to_referer =  to_referer + '$sumref' WHERE id = '$usid'");
			
			# Вносим запись в список бонусов
			$db->Query("INSERT INTO db_bonus (user, user_id, sum, date_add, date_del) VALUES ('$uname','$usid','$sum','$dadd','$ddel')");
			
			# Случайная очистка устаревших записей
			$db->Query("DELETE FROM db_bonus WHERE date_del < '$dadd'");
			
			echo "<div class='alert alert-success'>На Ваш счет для вывода зачислен бонус в размере {$sum} монет, <b>+{$energy} энергии</b></div>";
			
			$hide_form = true;
			
		}
			
			# Показывать или нет форму
			if(!$hide_form){
?>

<center><br/>

<div class="column_3" id="hidden_link" onclick="document.all.hidden_link1.style.display='block';" style="width: 468px;display:yes">
<?php
include "_bonlink.php";
?>
</div>
<div class="column_3" id="hidden_link1" onclick="document.all.hidden_link2.style.display='block';" style="display:none"><br/>
<form action="" method="post"><input type="submit" name="bonus" value="Получить бонус" class="btn btn-success"></form></div>
</center>


<?PHP 

			}

	}else {
	   $db->Query("SELECT * FROM db_bonus WHERE user_id = '$usid' AND date_del > '$dadd'");
$u_data = $db->FetchArray();
$time = $u_data['date_del'] - $dadd;
$hours = floor($time/3600);
floor($minutes =($time/3600 - $hours)*60);
$seconds = ceil(($minutes - floor($minutes))*60);
$min=ceil($minutes)-1;
	   ?>
<div class="text-center"><h3 class="ideas_goto"><a><i class="fa fa-clock-o"></i> <b id="bonus">Следующий бонус будет доступен через: <?=json_encode($hours);echo ' ч.  ';echo json_encode($min);echo ' мин.  '; echo json_encode($seconds);echo ' сек.  ';?></b><script>setInterval(function(){
$("#bonus").load("# #bonus"); }, 1000); </script></a></h3></div>
        <?php
	}
?>

  </div>

                </div>
            </div>
        </div>
        <!-- end row -->
    </div><!-- container -->
</div>

            <div class="col-lg-9 partner_cl">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title racetabletitle"><i class="fa fa-list-ul"></i> Последние 20 полученных бонусов</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">

<table class="table table-bordered" cellpadding='3' cellspacing='0' align='center' width="97%">  
<thead><tr>
	<th><b>ID</b></th>
	<th><b>Пользователь</b></th>
	<th><b>Сумма</b></th>
	<th><b>Дата</b></th></tr>
</thead><tbody>
  <?PHP
  
  $db->Query("SELECT * FROM db_bonus ORDER BY id DESC LIMIT 20");
  
	if($db->NumRows() > 0){
  
  		while($bon = $db->FetchArray()){
		
		?>
		
	<tr class="text-center bonus_tr">
    		<td align="center"><?=$bon["id"]; ?></td>
    		<td align="center"><a href="/wall/<?=$bon["user"]; ?>"><?=$bon["user"]; ?></a></td>
    		<td align="center"><?=$bon["sum"]; ?></td>
		<td align="center"><?=date("d.m.Y в H:i:s",$bon["date_add"]); ?></td>
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="5">Нет записей</td></tr>'
  ?>
</tbody>
</table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>