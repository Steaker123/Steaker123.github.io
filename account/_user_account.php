
<?PHP
$_OPTIMIZATION["title"] = "Мой аккаунт";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();


$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id = '$user_id'");
$refs = $db->FetchRow(); // Считаем рефералов 1 уровня
$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id2 = '$user_id'");
$refs2 = $db->FetchRow(); // Считаем рефералов 2 уровня
$db->Query("SELECT COUNT(*) FROM db_users_a WHERE referer_id3 = '$user_id'");
$refs3 = $db->FetchRow(); // Считаем рефералов 3 уровня


# ========= вывод всего заработано на рефералах ========= #
        $db->Query("SELECT doxod2 FROM db_users_a WHERE referer_id2 = '$user_id'");
        $doxod_refs2 = $db->FetchArray();
        $doxod_refs2['doxod2'];

        $db->Query("SELECT doxod2,doxod3 FROM db_users_a WHERE referer_id3 = '$user_id'");
        $doxod_refs3 = $db->FetchArray();
        $doxod_refs3['doxod3'];

        $zarab_na_refax = $prof_data["from_referals"] + $doxod_refs2['doxod2'] + $doxod_refs3['doxod3'];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();



$A=$func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);
$B=$func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);
$C=$func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);
$D=$func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);
$E=$func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);
$F=$func->SumCalc($sonfig_site["f_in_h"], $user_data["f_t"], $user_data["last_sbor"]);
$G=$A+$B+$C+$D+$E+$F; 

$kyr1 = $user_data["a_t"]*$sonfig_site["a_in_h"];
$kyr2 = $user_data["b_t"]*$sonfig_site["b_in_h"];
$kyr3 = $user_data["c_t"]*$sonfig_site["c_in_h"];
$kyr4 = $user_data["d_t"]*$sonfig_site["d_in_h"];
$kyr5 = $user_data["e_t"]*$sonfig_site["e_in_h"];
$kyr6 = $user_data["f_t"]*$sonfig_site["f_in_h"];
 
$kyrcall = $kyr1+$kyr2+$kyr3+$kyr4+$kyr5+$kyr6;


?>
<div class="page-content-wrapper ">

    <div class="container">

        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-muted font-light profilemsz">Скорость заработка</h4>
                    </div>
                    <div class="panel-body p-t-10">
                        <h2 class="m-t-0 m-b-15 profilemst"><i class="mdi mdi-speedometer text-danger m-r-10"></i><b><?php echo sprintf("%.4f",$kyrcall/$sonfig_site["items_per_coin"]);?>Р / час</b></h2>
                        <p class="text-muted m-b-0 m-t-20"><mark class="profilemsd">Больше чем у <b>88%</b> пользователей</mark></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-muted font-light profilemsz">Количество рефералов</h4>
                    </div>
                    <div class="panel-body p-t-10">
                        <h2 class="m-t-0 m-b-15 profilemst"><i class="mdi mdi-account-multiple text-primary m-r-10"></i><b><?=$refs; ?> чел.</b></h2>
                        <p class="text-muted m-b-0 m-t-20"><mark class="profilemsd">Больше чем у <b>99%</b> пользователей</mark></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-muted font-light profilemsz">Выплачено заработка</h4>
                    </div>
                    <div class="panel-body p-t-10">
                        <h2 class="m-t-0 m-b-15 profilemst"><i class="mdi mdi-cash-multiple text-primary m-r-10"></i><b><?=$prof_data["payment_sum"]; ?>Р</b></h2>
                        <p class="text-muted m-b-0 m-t-20"><mark class="profilemsd">Больше чем у <b>99%</b> пользователей</mark></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-muted font-light profilemsz">Кликов в сёрфинге</h4>
                    </div>
                    <div class="panel-body p-t-10">
                        <h2 class="m-t-0 m-b-15 profilemst"><i class="mdi mdi-mouse text-danger m-r-10"></i><b>нет</b></h2>
                        <p class="text-muted m-b-0 m-t-20"><mark class="profilemsd">Больше чем у <b>81%</b> пользователей</mark></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title">Данные аккаунта</h3></div>
                    <div class="panel-body">
                        <h5 class="profileinfoh5">Имя: <span>не установлено</span></h5>
  <h5 class="profileinfoh5">Логин: <span><?=$prof_data["user"]; ?></span></h5>
  <h5 class="profileinfoh5">E-mail: <span class="profileinfospan"><?=$prof_data["email"]; ?></span></h5>
  <h5 class="profileinfoh5">ID в системе: <span>#<?=$prof_data["id"]; ?></span></h5>
  <h5 class="profileinfoh5">Меня пригласил: <span><?=$prof_data["referer"]; ?></h5>
  <h5 class="profileinfoh5">Регистрация: <span><?=date("d.m.Y в H:i",$prof_data["date_reg"]); ?></span></h5>
                        <button type="button" class="btn waves-effect btn-default btn-block" onclick="location.href='./settings';"> <i class="mdi mdi-settings"></i> Настройки аккаунта</button>
</div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title">Статистика аккаунта</h3></div>
                    <div class="panel-body">
                        <h5 class="profileinfoh5">Сумма пополнений: <span><?=$prof_data["insert_sum"]; ?>Р</span></h5>
  <h5 class="profileinfoh5">Сумма выплат: <span><?=$prof_data["payment_sum"]; ?>Р</span></h5>
  <h5 class="profileinfoh5">Доход с рефералов: <span><?=sprintf("%.2f",$zarab_na_refax); ?>Р</span></h5>
  <h5 class="profileinfoh5">Сделано кликов: <span>нет</span></h5>
  <h5 class="profileinfoh5">Кол-во рефералов: <span><?=$refs; ?>/<?=$refs2; ?>/<?=$refs3; ?> чел.</span></h5>
  <h5 class="profileinfoh5">Машин в автопарке: <span><?=$prof_data["a_t"]+$prof_data["b_t"]+$prof_data["c_t"]+$prof_data["d_t"]+$prof_data["e_t"]+$prof_data["f_t"]; ?> ед.</span></h5>
                        <button type="button" class="btn waves-effect btn-default btn-block" onclick="location.href='./wall?id=1';"> <i class="mdi mdi-account-box"></i> Стена пользователя</button>
</div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-lg-6">
                <div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title">График изменения скорости заработка</h3></div>
                    <div class="panel-body">
                        <div id="morris-area-example" class="profilecharth"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h4 class="m-t-0">Машины в Вашем автопарке</h4>
  <div class="row">
    <div class="col-lg-1 col-sm-2 col-xs-2 text-center">
          <img src="/img/cars/n1.png" class="profilecarimg"><h3>x<?=$prof_data["a_t"]; ?></h3></div>
    <div class="col-lg-1 col-sm-2 col-xs-2 text-center">
          <img src="/img/cars/n2.png" class="profilecarimg"><h3>x<?=$prof_data["b_t"]; ?></h3></div>
    <div class="col-lg-1 col-sm-2 col-xs-2 text-center">
          <img src="/img/cars/n3.png" class="profilecarimg"><h3>x<?=$prof_data["c_t"]; ?></h3></div>
    <div class="col-lg-1 col-sm-2 col-xs-2 text-center">
          <img src="/img/cars/n4.png" class="profilecarimg"><h3>x<?=$prof_data["d_t"]; ?></h3></div>
    <div class="col-lg-1 col-sm-2 col-xs-2 text-center">
          <img src="/img/cars/n5.png" class="profilecarimg"><h3>x<?=$prof_data["e_t"]; ?></h3></div>
    <div class="col-lg-1 col-sm-2 col-xs-2 text-center">
          <img src="/img/cars/n6.png" class="profilecarimg"><h3>x<?=$prof_data["f_t"]; ?></h3></div>
      </div>  </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div><!-- container -->


</div> <!-- Page content Wrapper -->
</div> <!-- content -->