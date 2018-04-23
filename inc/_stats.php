
<div class="panel panel-auth">
	<center><h4 style="color: #3c434a;"><b>Статистика</b></h4></center>
	<div class="panel-body">
<center class="stats">
<div class="row">
	<div class="stat"><b><?=$stats_data["all_users"]; ?> <sup style="color:  e44;" title="Новые за 24 часа">+<?=$stats_data["new_users"]; ?></sup> Чел.</b><br/>Участников: </div>
	<div class="stat"><b><?=sprintf("%.2f",($stats_data["all_insert"]-$stats_data["all_payment"])); ?> <?=$config->VAL2; ?></b><br/>Баланс системы:</div>
	<div class="stat"><b><?=sprintf("%.2f",$stats_data["all_payment"]); ?> <?=$config->VAL2; ?></b><br/>Выплачено: </div>
	<div class="stat"><b><?=intval(((time() - $config->SYSTEM_START_TIME) / 86400 ) +1); ?>-й день </b><br/>Игра работает:</div>
</div>
</center>
	</div>
</div>
