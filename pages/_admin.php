<div class="head-page">
  <div class="container">
    <div class="row">

	<?php if ($_SESSION["admin"]) : ?>
<?PHP include("inc/_admin_menu.php"); ?>
	<?php endif;?>
<div class="col-xs-9">
		<div class="row">
			<div class="content" style="padding: 15px;background: #fff;border: 2px solid #ededed;">

<?PHP

# by Juice - jumast@ya.ru - (c) 2017 
# RIP motormoney, функциональность данного скрипта Fruif-Farm не имеет ничего общего с оригинальным сайтом.
# По этому могут быть неисправности, Вы уж извините, доработка требует слишком много времени и усилий
# За отдельную плату дополню, поменяю и т.д. пишите по контактам выше.

$_OPTIMIZATION["title"] = "Административная панель";
$_OPTIMIZATION["description"] = "Аккаунт пользователя";
$_OPTIMIZATION["keywords"] = "Аккаунт, личный кабинет, пользователь";
$not_counters = true;
# Блокировка сессии
if(!isset($_SESSION["admin"])){ include("pages/admin/_login.php"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		
		case "404": include("pages/_404.php"); break; // Страница ошибки
                case "compconfig": include("pages/admin/_compconfig.php"); break; // Управление конкурсами
		case "invcompconfig": include("pages/admin/_invcompconfig.php"); break; // Управление конкурсами
		case "stats": include("pages/admin/_stats.php"); break; // Статистика
		case "config": include("pages/admin/_config.php"); break; // Настройки
		case "story_buy": include("pages/admin/_story_buy.php"); break; // История покупок деревьев
		case "story_swap": include("pages/admin/_story_swap.php"); break; // История обмена в обменнике
		case "story_insert": include("pages/admin/_story_insert.php"); break; // История пополнений баланса
		case "ticket": include("pages/admin/_ticket.php"); break; // Тикеты
		case "story_sell": include("pages/admin/_story_sell.php"); break; // История рынка
		case "news": include("pages/admin/_news_a.php"); break; // Новости
		case "users": include("pages/admin/_users.php"); break; // Список пользователей
		case "payments": include("pages/admin/_payments.php"); break; // Запросы на выплаты WM
			
	# Страница ошибки
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/admin/_stats.php");

?>
    </div>
  </div>
</div>
</div>
</div>
</div>