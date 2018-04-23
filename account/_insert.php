
<?PHP
$_OPTIMIZATION["title"] = "Пополнить баланс";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_config WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

/*
if($_SESSION["user_id"] != 1){
echo "<center><b><font color = red>Технические работы</font></b></center>";
return;
}
*/
?>

<style>
body{background:#f3f2f0 !important;}
.insert_box{padding: 10px;border-radius: 10px;-moz-box-shadow: 0 1px 2px 0 rgba(0,0,0,.14);-webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,.14);box-shadow: 0 1px 2px 0 rgba(0,0,0,.14);}
.insert_new_btn {
    color: #fff;
    font-weight: 700;
    border: none;
    border-top-right-radius: 50px;
    border-bottom-right-radius: 50px;
    border-bottom-left-radius: 50px;
    border-top-left-radius: 50px;
    outline: none;
    -webkit-transition: 333ms ease-in-out;
    transition: 333ms ease-in-out;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding: 10px 38px 10px;
	margin-top:10px;
    font-size: 15px;
	letter-spacing:1px;
    background-color: #ff8c00;
    -webkit-box-shadow: 0 10px 15px 0 rgba(255,140,0,.2);
    box-shadow: 0 7px 15px 0 rgba(255,140,0,.2);
    text-shadow: 1px 1px #de7a00;
}
.insert_new_btn:hover{color:#fff;-webkit-transition:133ms ease-in-out;transition:133ms ease-in-out-webkit-box-shadow:0 7px 30px 0 rgba(255,140,0,.4));box-shadow:0 7px 30px 0 rgba(255,140,0,.4);}
.insert_new_input{border-radius: 50px;letter-spacing: 1px;text-align: center;background-color: #fdfdfd;height: 41px;font-size: 13px;}
.insert_new_input:focus::-webkit-input-placeholder {color: transparent}
.insert_new_input:focus::-moz-placeholder          {color: transparent}
.insert_new_input:focus:-moz-placeholder           {color: transparent}
.insert_new_input:focus:-ms-input-placeholder      {color: transparent}
.balancei_pscount{height:25px;color:#7f7f7f;}
.insert_new_btn:active{color:#fff !important;}
.insert_new_btn:focus{color:#fff !important;}
@media (min-width: 1200px) and (max-width: 1470px) {
	.insert_new_input{font-size: 10px;}
	.insert_new_btn{font-size: 13px;padding: 10px 0px 10px;}
	.balancei_pscount{display:none;}
	}
</style>

<div class="page-content-wrapper ">

    <div class="container">
<?
# Free-kassa
$fk_merchant_id = '12345'; //merchant_id ID мазагина в free-kassa.ru http://free-kassa.ru/merchant/cabinet/help/
$fk_merchant_key = 'jq8w259f'; //Секретное слово http://free-kassa.ru/merchant/cabinet/profile/tech.php

/// db_payeer_insert
if(isset($_POST["sum"])){

$sum = round(floatval($_POST["sum"]),2);


# Заносим в БД
$db->Query("INSERT INTO db_payeer_insert (user_id, user, sum, date_add) VALUES ('".$_SESSION["user_id"]."','".$_SESSION["user"]."','$sum','".time()."')");

$desc = base64_encode($_SERVER["HTTP_HOST"]." - USER ".$_SESSION["user"]);
$m_shop = $config->shopID;
$m_orderid = $db->LastInsert();
$m_amount = number_format($sum, 2, ".", "");
$m_curr = "RUB";
$m_desc = $desc;
$m_key = $config->secretW;

$arHash = array(
 $m_shop,
 $m_orderid,
 $m_amount,
 $m_curr,
 $m_desc,
 $m_key
);
$sign = strtoupper(hash('sha256', implode(":", $arHash)));

?>
<center>
<form method="GET" action="//payeer.com/api/merchant/m.php">
	<input type="hidden" name="m_shop" value="<?=$config->shopID; ?>">
	<input type="hidden" name="m_orderid" value="<?=$m_orderid; ?>">
	<input type="hidden" name="m_amount" value="<?=number_format($sum, 2, ".", "")?>">
	<input type="hidden" name="m_curr" value="RUB">
	<input type="hidden" name="m_desc" value="<?=$desc; ?>">
	<input type="hidden" name="m_sign" value="<?=$sign; ?>">
	<input type="submit" name="m_process" value="Перейти и оплатить" class="btn btn-danger" />
</form>
</center>
<?PHP

return;
}
?>
<script type="text/javascript">
var min = 1;
var ser_pr = 100;
function calculate(st_q) {
    
	var sum_insert = parseInt(st_q);
	$('#res_sum').html( (sum_insert * ser_pr) );
	
	var re = /[^0-9\.]/gi;
    var url = window.location.href;
    var desc = '<?=$usid;?>';
    var sum = $('#sum').val();
    if (re.test(sum)) {
        sum = sum.replace(re, '');
        $('#oa').val(sum);
    }
    if (sum < min) {
        $('#error').html('Минимальная сумма пополнения - 1 рублей! ');
		$('#submit').attr("disabled", "disabled");
        return false;
    } else {
        $('#error').html('');
    }

    $.get('/free-kassa-data.php?prepare_once=1&l='+desc+'&oa='+sum, function(data) {
         var re_anwer = /<hash>([0-9a-z]+)<\/hash>/gi;
         $('#s').val(re_anwer.exec(data)[1]);
         $('#submit').removeAttr("disabled");
    });
}
	
</script>

        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/pb_logo.png">
  <div class="balancei_pscount"><img src="assets/ps/micro/euroset.png" class="m-r-10"><img src="assets/ps/micro/alfa.png" class="m-r-10"><img src="assets/ps/micro/svuaznoy.png" class="m-r-10"><img src="assets/ps/micro/prom.png"></div>

<form class="balancei_form" method="POST" action="">
    <input type="hidden" name="m" value="<?=$fk_merchant_id?>">
<div class="form-group">
		<input type="text" name="sum" size="7" id="psevdo" class="form-control balancei_input insert_new_input" maxlength="9" placeholder="Введите сумму пополнения... (руб.)" required="">
</div>
 <div class="form-group m-b-0">
          <button type="submit" class="btn waves-light btn-block balancei_btngo insert_new_btn"> Перейти к оплате </button>
      </div>
</form>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/fk_logo.png">
  <div class="balancei_pscount"><img src="assets/ps/micro/steam.png" class="m-r-10"><img src="assets/ps/micro/beeline.png" class="m-r-10"><img src="assets/ps/micro/tele2.png" class="m-r-10"><img src="assets/ps/micro/mts.png"></div>
    <form class="balancei_form" method=GET action="http://www.free-kassa.ru/merchant/cash.php">
    <input type="hidden" name="m" value="<?=$fk_merchant_id?>">
                            <div class="form-group">
        <input name="oa" id="sum" size="7" id="oa" class="form-control balancei_input insert_new_input" maxlength="9" placeholder="Введите сумму пополнения... (руб.)" required="" type="text">
      </div>

	<input type="hidden" name="s" id="s" value="0">
	<input type="hidden" name="us_id" id="us_id" value="<?=$usid;?>">
       <input type="hidden" name="o" id="desc" value="<?=$usid;?>" />
       <div class="form-group m-b-0">
          <button type="submit" class="btn waves-light btn-block balancei_btngo insert_new_btn"> Перейти к оплате </button>
      </div>
  </form>
                    </div>
                </div>
            </div>




            <div class="col-sm-6 col-lg-4">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/ym_logo.png">
	<div class="balancei_pscount"><img src="assets/ps/micro/visa.png" class="m-r-10"><img src="assets/ps/micro/mc.png" class="m-r-10"><img src="assets/ps/micro/maestro.png" class="m-r-10"><img src="assets/ps/micro/mir.png"></div>
    <form class="balancei_form" method="post" action="/ajax/insert.php?type=6">
                            <div class="form-group">
        <input name="sum" class="form-control balancei_input insert_new_input" maxlength="9" placeholder="Введите сумму пополнения... (руб.)" required="" type="text">
      </div>
                            <div class="form-group m-b-0">
                            <button type="submit" class="btn waves-light btn-block balancei_btngo insert_new_btn"> Перейти к оплате </button>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/adv_logo.png">
  <div class="balancei_pscount"><img src="assets/ps/micro/btc.png" class="m-r-10"><img src="assets/ps/micro/exmo.png"></div>
    <form class="balancei_form" method="post" action="/ajax/insert.php?type=3">
                            <div class="form-group">
        <input name="sum" class="form-control balancei_input insert_new_input" maxlength="9" placeholder="Введите сумму пополнения... (руб.)" required="" type="text">
      </div>
                            <div class="form-group m-b-0">
          <button type="submit" class="btn waves-light btn-block balancei_btngo insert_new_btn"> Перейти к оплате </button>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/qiwi_logo.png">
	<div class="balancei_pscount" style="margin-top:10px;height: auto;font-size: 12px;display: block;">Зачисление в срок 1-12 часов</div>
    <form class="balancei_form" method="post" target="_blank" action="/ajax/insert.php?type=5">
                            <div class="form-group">
        <input name="sum" id="sum2" class="form-control balancei_input insert_new_input" maxlength="9" placeholder="Введите сумму пополнения... (руб.)" disabled="" required="" type="text">
      </div>
                            <div class="form-group m-b-0">
                            <button type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn" data-toggle="modal" data-target="#myModal"> Инструкция по пополнению </button>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/wm_logo.png">
	<div class="balancei_pscount" style="margin-top:10px;height: auto;font-size: 12px;display: block;">Ожидается в сентябре 2017 г.</div>
    <form class="balancei_form" method="post" action="https://merchant.webmoney.ru/lmi/payment.asp" accept-charset="windows-1251" id="webmoney">
      <input name="LMI_PAYMENT_AMOUNT" id="PAYMENT_AMOUNT2" type="hidden">
  <input name="LMI_PAYMENT_DESC" value="Пополнение баланса в MotorMoney от Samara" type="hidden">
  <input name="LMI_PAYMENT_NO" id="PAYMENT_ID2" type="hidden">
  <input name="LMI_PAYEE_PURSE" value="R788720201101" type="hidden">
  <input name="LMI_SIM_MODE" value="0" type="hidden">
                            <div class="form-group">
        <input id="sum2" class="form-control balancei_input insert_new_input" maxlength="9" placeholder="Введите сумму пополнения... (руб.)" required="" disabled="" type="text">
      </div>
                            <div class="form-group m-b-0">
          <button id="subm2" type="button" class="btn waves-light btn-block balancei_btngo insert_new_btn" disabled=""> Временно недоступно</button>
      </div>
  </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center insert_box">
                    <div class="panel-body p-t-20">
    <img class="balancei_psimg m-b-5" src="/img/ps/pm_logo.png">
	<div class="balancei_pscount" style="margin-top:10px;height: auto;font-size: 12px;display: block;">Зачисление по курсу ЦБ РФ</div>
    <form class="balancei_form" method="post" action="https://perfectmoney.is/api/step1.asp" id="perfect">
      <input name="PAYEE_ACCOUNT" value="U14329293" type="hidden">
      <input name="PAYEE_NAME" value="MotorMoney" type="hidden">
      <input name="PAYMENT_ID" id="PAYMENT_ID" type="hidden">
      <input name="PAYMENT_AMOUNT" id="PAYMENT_AMOUNT" type="hidden">
      <input name="PAYMENT_UNITS" value="USD" type="hidden">
      <input name="STATUS_URL" value="https://motormoney.org/perfectmoney" type="hidden">
      <input name="PAYMENT_URL" value="https://motormoney.org/pages/success" type="hidden">
      <input name="PAYMENT_URL_METHOD" value="POST" type="hidden">
      <input name="NOPAYMENT_URL" value="https://motormoney.org/pages/fail" type="hidden">
      <input name="NOPAYMENT_URL_METHOD" value="POST" type="hidden">
      <div class="form-group">
        <input id="sum" class="form-control balancei_input insert_new_input" maxlength="9" placeholder="Введите сумму пополнения... (руб.)" required="" type="text">
      </div>
                            <div class="form-group m-b-0">
          <button type="button" id="subm" class="btn waves-light btn-block balancei_btngo insert_new_btn"> Перейти к оплате </button>
      </div>
  </form>
                    </div>
                </div>
            </div>

                    </div>
                </div>
            </div>