
<?PHP
$_OPTIMIZATION["title"] = "Партнерская программа";
$user_id = $_SESSION["user_id"];
$uname = $_SESSION["user"];
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
?>




<div class="page-content-wrapper ">

    <div class="container">

        <div class="row">
            <div class="col-sm-6 col-lg-3 partner_cl_top">
                <div class="panel text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-muted font-light profilemsz">Количество рефералов</h4>
                    </div>
                    <div class="panel-body p-t-0">
                        <h2 class="m-t-0 m-b-5 profilemst"><i class="mdi mdi-account-network text-danger m-r-10"></i><b><?=$refs; ?> / <?=$refs2; ?> / <?=$refs3; ?> чел.</b></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 partner_cl_top">
                <div class="panel text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-muted font-light profilemsz">Доход с рефералов</h4>
                    </div>
                    <div class="panel-body p-t-0">
                        <h2 class="m-t-0 m-b-5 profilemst"><i class="mdi mdi-cash-multiple text-primary m-r-10"></i><b><?=sprintf("%.2f",$zarab_na_refax); ?>Р</b></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 partner_cl_top">
                <div class="panel text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-muted font-light profilemsz">Просмотров реф. ссылки</h4>
                    </div>
                    <div class="panel-body p-t-0">
                        <h2 class="m-t-0 m-b-5 profilemst"><i class="mdi mdi-mouse text-danger m-r-10"></i><b>не раз</b></h2>
                    </div>
                </div>
            </div>
        </div><!-- end row -->

        <div class="row">
            <div class="col-lg-9 partner_cl">
                <div class="panel panel-primary">
                    <div class="panel-body">
  <div class="row">
  <div class="col-md-6">
                          <h4 class="m-b-10 m-t-0" style="color:#d20909;">Реферальная ссылка и баннеры:</h4>
    <h5 class="profileinfoh5"><b class="partner_stath5">Реф. ссылка:</b> <span style="float:none;margin-left: 15px;"> http://<?=$_SERVER['HTTP_HOST']; ?>/?ref=<?=$_SESSION["user_id"]; ?></span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">Баннер 448x60:</b> <span style="float:none;margin-left: 15px;"> в разработке</span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">Баннер 200x300:</b> <span style="float:none;margin-left: 15px;"> в разработке</span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">Баннер 240x400:</b> <span style="float:none;margin-left: 15px;"> в разработке</span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">Баннер 728x90:</b> <span style="float:none;margin-left: 15px;"> в разработке</span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">Баннер 200x200:</b> <span style="float:none;margin-left: 15px;"> в разработке</span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">Баннер 100x100:</b> <span style="float:none;margin-left: 15px;"> в разработке</span></h5>
                        </div>
  <div class="col-md-6">
  <h4 class="m-b-10 m-t-0" style="color:#d20909;">Реф. статистика:</h4>
                          <h5 class="profileinfoh5"><b class="partner_stath5">- Кол-во рефералов (1 ур.):</b> <span><?=$refs; ?> чел.</span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">- Кол-во рефералов (2 ур.):</b> <span><?=$refs2; ?> чел.</span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">- Кол-во рефералов (3 ур.):</b> <span><?=$refs3; ?> чел.</span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">- Общий доход с рефералов:</b> <span><?=sprintf("%.2f",$zarab_na_refax); ?>Р</span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">- Доход с рефералов (1 ур.):</b> <span><?=$prof_data["from_referals"];?>Р</span></h5>
    <h5 class="profileinfoh5"><b class="partner_stath5">- Доход с рефералов (2 ур.):</b> <span><?=$doxod_refs2['doxod2'];?>Р</span></h5>
    <h5 class="profileinfoh5 m-b-0"><b class="partner_stath5">- Доход с рефералов (3 ур.):</b> <span><?=$doxod_refs3['doxod3'];?>Р</span></h5>
  </div>
  </div>
</div>
                </div>
            </div>
            <div class="col-lg-9 partner_cl">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h4 class="m-b-10 m-t-0">Описание партнерской программы:</h4>
  <p>В партнерской программе может участвовать любой пользователь проекта. Программа предусматривает ряд вознаграждений за определенные действия Ваших рефералов. Рефералы - пользователи, которые зарегистрировались на проекте после перехода по Вашей реферальной ссылке.</p>
                        <h4 class="m-b-10 m-t-0">Вознаграждения:</h4>
  <p class="partner_payp"> - 12% от суммы пополнения реферала 1 уровня</p>
  <p class="partner_payp"> - 3% от суммы пополнения реферала 2 уровня</p>
  <p class="partner_payp"> - 1% от суммы пополнения реферала 3 уровня</p>
  <p class="partner_payp"> - 0.005 руб. с каждого просмотра в "Сёрфинге сайтов"</p>
  <p class="partner_payp"> - 5% от суммы пополнения рекламного баланса</p>
  <h5 class="m-b-0 m-t-0" style="color:#b10909;letter-spacing:1px;">Вознаграждения выплачиваются на Ваш баланс для вывода!</h5>
</div>
                </div>
            </div>
        </div> <!-- End Row -->

    </div><!-- container -->


</div>