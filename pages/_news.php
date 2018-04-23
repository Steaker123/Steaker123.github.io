<?PHP

$_OPTIMIZATION["title"] = "Новости";
$_OPTIMIZATION["description"] = "Новости проекта";
$_OPTIMIZATION["keywords"] = "Новости нашего проекта";
?>
<br/>
<?PHP

if(isset($_SESSION["user_id"]))
{
	$db->Query("SELECT * FROM db_users_a WHERE id = '$usid' LIMIT 1");
	$user_data = $db->FetchArray();
	$newsus = $user_data["news"];

	$numnews = 0;
	$db->Query("SELECT * FROM db_news ORDER BY id DESC");
	while($newses = $db->FetchArray()){
	$numnews = $numnews+1;
	}

	if($numnews > $newsus)
	{
		$db->Query("UPDATE db_users_a SET news = '$numnews' WHERE id = '$usid'");
		Header("Location: /news");
	}
}

$db->Query("SELECT * FROM db_news ORDER BY id DESC");

if($db->NumRows() > 0){

	while($news = $db->FetchArray()){
	
	?>
<div class="panel-group" id="accordion">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#<?=$news["id"]; ?>">
			<b><?=$news["title"]; ?></b>
              </a>
<span class="pull-right"><?=date("d.m.Y",$news["date_add"]); ?></span>
            </h4>
    </div>
    <div id="<?=$news["id"]; ?>" class="panel-collapse collapse in">
      <div class="panel-body">
        <?=$news["news"]; ?>
      </div>
    </div>
  </div>
</div>

	<?PHP
	
	}

}else echo "<center class='alert alert-danger'>Новостей нет :(</center>";

?>