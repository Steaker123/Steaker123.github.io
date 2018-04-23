
<div class="panel text-center">
	<div class="panel-heading">
		<h4 class="panel-title text-muted font-light carsspeeddesc">Касса моего автопарка:</h4>
	</div>

<?PHP

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

	if(isset($_POST["sbor"])){
	
		if($user_data["last_sbor"] < (time() - 600) ){
		
			$tomat_s = $func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);
			$straw_s = $func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);
			$pump_s = $func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);
			$peas_s = $func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);
			$pean_s = $func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);
			$apel_s = $func->SumCalc($sonfig_site["f_in_h"], $user_data["f_t"], $user_data["last_sbor"]);
			
			$db->Query("UPDATE db_users_b SET 
			a_b = a_b + '$tomat_s', 
			b_b = b_b + '$straw_s', 
			c_b = c_b + '$pump_s', 
			d_b = d_b + '$peas_s', 
			e_b = e_b + '$pean_s', 
			f_b = f_b + '$apel_s', 
			all_time_a = all_time_a + '$tomat_s',
			all_time_b = all_time_b + '$straw_s',
			all_time_c = all_time_c + '$pump_s',
			all_time_d = all_time_d + '$peas_s',
			all_time_e = all_time_e + '$pean_s',
			all_time_f = all_time_f + '$apel_s',
			last_sbor = '".time()."' 
			WHERE id = '$usid' LIMIT 1");
			
			
			$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
			$user_data = $db->FetchArray();
			
$all_items = $user_data["a_b"] + $user_data["b_b"] + $user_data["c_b"] + $user_data["d_b"] + $user_data["e_b"] + $user_data["f_b"];

	if($all_items > 0){
	
			
		$money_add = $func->SellItems($all_items, $sonfig_site["items_per_coin"]);

		$tomat_b = $user_data["a_b"];
		$straw_b = $user_data["b_b"];
		$pump_b = $user_data["c_b"];
		$pean_b = $user_data["d_b"];
		$peas_b = $user_data["e_b"];
		$apel_b = $user_data["f_b"];
		
		$money_b = ( (100 - $sonfig_site["percent_sell"]) / 100) * $money_add;
		$money_p = ( ($sonfig_site["percent_sell"]) / 100) * $money_add;
		
		# Обновляем юзверя
		$db->Query("UPDATE db_users_b SET money_b = money_b + '$money_b', money_p = money_p + '$money_p', a_b = 0, b_b = 0, c_b = 0, d_b = 0, e_b = 0, f_b = 0  
		WHERE id = '$usid'");
		
		$da = time();
		$dd = $da + 60*60*24*15;
		
		# Вставляем запись в статистику
		$db->Query("INSERT INTO db_sell_items (user, user_id, a_s, b_s, c_s, d_s, e_s, f_s, amount, all_sell, date_add, date_del) VALUES 
		('$usname','$usid','$tomat_b','$straw_b','$pump_b','$pean_b','$peas_b','$apel_b','$money_add','$all_items','$da','$dd')");
		
		echo "<center><div class='alert alert-success'>Собрано {$money_add} руб.</div></center>";
		
		$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
		$user_data = $db->FetchArray();
		
	}else echo "<center><div class='alert alert-danger'>Нечего собрать.</div></center>";

		}else echo "<center><div class='alert alert-danger'>10 минут не прошло!</div></center>";
	
	}


$kyr1 = $user_data["a_t"]*$sonfig_site["a_in_h"];
$kyr2 = $user_data["b_t"]*$sonfig_site["b_in_h"];
$kyr3 = $user_data["c_t"]*$sonfig_site["c_in_h"];
$kyr4 = $user_data["d_t"]*$sonfig_site["d_in_h"];
$kyr5 = $user_data["e_t"]*$sonfig_site["e_in_h"];
$kyr6 = $user_data["f_t"]*$sonfig_site["f_in_h"];

$kyrcall = $kyr1+$kyr2+$kyr3+$kyr4+$kyr5+$kyr6;
?>

 	<div class="panel-body p-t-0">

	
	<script>
		function show()
		{
			$.ajax({
				url: "../sklad.php",
				cache: false,
				success: function(html){
					$("#bls").html(html);
				}
			});
		}
	
		$(document).ready(function(){
			show();
			setInterval('show()',10);
		});
	</script>
	<h1 class="m-t-0 m-b-0 carsbalcount"><i class="mdi mdi-wallet text-danger m-r-5"></i><span id="bls"></span> <div class="rub">руб.</div></h1>
	<h4 class="m-t-5 m-b-15 carsspeedcount"><i class="mdi mdi-speedometer text-primary m-r-10"></i><b><?php echo sprintf("%.4f",$kyrcall/$sonfig_site["items_per_coin"]);?>Р / час </b></h4>
	<p class="text-muted m-b-0 m-t-15">
	<form action="/carpark?sbor" method="post">
		<input type="hidden" name="sbor">
		<button type="submit" class="btn waves-effect btn-default"> <i class="fa fa-money"></i> Снять деньги с кассы автопарка</button>
	</form>
	</p>
	</div>
</div>

	