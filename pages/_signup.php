<?PHP
$_OPTIMIZATION["title"] = "Регистрация";
$_OPTIMIZATION["description"] = "Регистрация пользователя в системе";
$_OPTIMIZATION["keywords"] = "Регистрация нового участника в системе";

if(isset($_SESSION["user_id"])){ Header("Location: /profile"); return; }
?>

            <article class="col-md-12">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
<form id="regform" action="" method="post">
                            <div class="form-heading text-center">
							    <a href="/"><img src="/img/logo.png" style="max-width: 100%;"></a>
								<div class="title">Регистрация аккаунта</div>
                            </div>

<?PHP
	
# by Juice - jumast@ya.ru - (c) 2017 
# RIP motormoney, функциональность данного скрипта Fruif-Farm не имеет ничего общего с оригинальным сайтом.
# По этому могут быть неисправности, Вы уж извините, доработка требует слишком много времени и усилий
# За отдельную плату дополню, поменяю и т.д. пишите по контактам выше.


	# Регистрация

	if(isset($_POST["login"])){


	$login = $func->IsLogin($_POST["login"]);
	$pass = $func->IsPassword($_POST["pass"]);
	$rules = isset($_POST["rules"]) ? true : false;
	$time = time();
	$ip = $func->UserIP;
	
	$email = $func->IsMail($_POST["email"]);
	$referer_id = (isset($_COOKIE["i"]) AND intval($_COOKIE["i"]) > 0 AND intval($_COOKIE["i"]) < 1000000) ? intval($_COOKIE["i"]) : 1;
	$referer_name = "";
						if($referer_id != 1){
						
							$db->Query("SELECT user FROM db_users_a WHERE id = '$referer_id' LIMIT 1");
							
							if($db->NumRows() > 0){
							
								$referer_name = $db->FetchRow();
							
							}else{ $referer_id = 1; $referer_name = "Admin"; }
						
						}else{ $referer_id = 1; $referer_name = "Admin"; }
	
		if($rules){

			if($email !== false){
		
			if($login !== false){
			
				if($pass !== false){
			
					if($pass == $_POST["repass"]){
						
						$db->Query("SELECT COUNT(*) FROM db_users_a WHERE user = '$login'");
						if($db->FetchRow() == 0){

			/* Реф 3 уровня ================== */
                        $db->Query("SELECT referer, referer_id FROM db_users_a WHERE id = '$referer_id' LIMIT 1");
                        $stats_data = $db->FetchArray();
                        $referer_name2=$stats_data["referer"];
                        $referer_id2=$stats_data["referer_id"];

                        $db->Query("SELECT referer, referer_id FROM db_users_a WHERE id = '$referer_id2' LIMIT 1");
                        $stats_data3 = $db->FetchArray();
                        $referer_name3=$stats_data3["referer"];
                        $referer_id3=$stats_data3["referer_id"];
                        /* ================== */


						preg_match('/([a-z0-9aа-я\.])+([a-z0-9а-я\-])+(\.)([a-z0-9а-я]{2,5}\.)?([a-z0-9а-я]{2,5})/i',$_COOKIE['rsite'], $out);
                        $out=$db->RealEscape($out[0]);
                        
						# Регаем пользователя
						$db->Query("INSERT INTO db_users_a (user, email, pass, referer, referer_id, referer_id2, referer_id3, date_reg, refsite, ip) 
						VALUES ('$login','{$email}','$pass','$referer_name','$referer_id','$referer_id2','$referer_id3','$time','$out',INET_ATON('$ip'))");
						
						
						$lid = $db->LastInsert();
						
						$db->Query("INSERT INTO db_users_b (id, user, money_b, last_sbor) VALUES ('$lid','$login','5000', '".time()."')");
						
						# Вставляем статистику
						$db->Query("UPDATE db_stats SET all_users = all_users +1 WHERE id = '1'");
						
						echo "<div class='alert alert-success'>Вы успешно зарегистрировались. Используйте форму для входа в аккаунт</div>";
header('Refresh: 3; URL=/login');
						?>	
						<?PHP
						return;
						}else echo "<div class='alert alert-warning'>Указанный логин уже используется</div><BR />";
						
					}else echo "<div class='alert alert-danger'>Пароль и повтор пароля не совпадают</div><BR />";
			
				}else echo "<div class='alert alert-danger'>Пароль заполнен неверно</div><BR />";
			
			}else echo "<div class='alert alert-danger'>Логин заполнен неверно</div><BR />";

		}else echo "<div class='alert alert-danger'>Email имеет неверный формат</div>";

		}else echo "<div class='alert alert-danger'>Вы не подтвердили правила</div>";
	
	}
	
	
?>

                            <div class="row">
                                <div class="col-sm-6"><input class="form-control" name="login" type="text" size="25" minlength="4" placeholder="Введите Логин" maxlength="10" value="<?=(isset($_POST["login"])) ? $_POST["login"] : false; ?>"/>
</div>
                                <div class="col-sm-6">
<input class="form-control" name="email" type="text" size="25" placeholder="Введите E-mail" maxlength="50" value="<?=(isset($_POST["email"])) ? $_POST["email"] : false; ?>"/>
                                </div>
                            </div>
                            <div class="row">
                        <div class="col-sm-6"><input class="form-control" name="pass" type="password" size="25" maxlength="20" minlength="6" placeholder="Введите Пароль" /></div>
                     <div class="col-sm-6"><input class="form-control" name="repass" type="password" size="25" minlength="6" placeholder="Повторите Пароль" /></div>
</div>

  <tr>
    <td colspan="2" align="left" style="padding: 3px;display: none;">
                        <label for="rules">
                             С <a href="/rules" target="_blank" class="stn">правилами</a> проекта ознакомлен(а) и принимаю: 
                        <input name="rules" checked="" type="checkbox" />
                        </label>
</td>
 
</tr>
</table>
                            <div class="row">
                                <div class="col-md-12 text-center">
<input class="adam-button adam-red" name="registr" type="submit" value="Зарегистрироваться">

<p class="title-description">Быть может у Вас уже <a href="/login">есть</a> аккаунт?</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </article>