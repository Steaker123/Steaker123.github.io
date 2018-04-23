<?PHP
$_OPTIMIZATION["title"] = "Настройки";
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a WHERE id = '$usid'");
$user_data = $db->FetchArray();
?>

<div class="row">


<div class="col-md-12">

<center><label>Смена пароля</label></center>
<?PHP
	if(isset($_POST["new"])){
if (preg_match("/[\>|\<|\"|\'|\\|\/]/", $com2)) { 
} else {
        
		$new = $func->IsPassword($_POST["new"]);
		
			
				if($new !== false){

					if( strtolower($new) == strtolower($_POST["re_new"])){
				
					
						$db->Query("UPDATE db_users_a SET pass = '$new', name='$name' WHERE id = '$usid'");
						
						echo "<div class='alert alert-success'>Данные успешно обновлены</div>";
					
					}else echo "<div class='alert alert-danger'>Пароль и повтор пароля не совпадают</div>";
				
				}else echo "<div class='alert alert-danger'>Новый пароль имеет неверный формат</div>";

		}
			
	}
?>

<div style="max-width: 350px;margin: 0 auto;">
<form action="" method="post" >

<div class="form-group">
	<label>Новый пароль:</label>
	<input type="password" placeholder="от 6 до 20 символов" name="new" class="form-control">
</div>
    
<div class="form-group">
	<label>Повтор пароля:</label>
	<input type="password" placeholder="Повторите пароль" name="re_new" class="form-control">
</div>
	<center><input type="submit" value="Изменить данные" class="btn btn-success"></center>
</form></div><br/>

</div>
</div>