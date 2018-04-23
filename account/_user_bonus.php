<?PHP
$_OPTIMIZATION["title"] = "Ваши достижения";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_a, db_users_b WHERE db_users_a.id = db_users_b.id AND db_users_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?> 

<?php
include 'user_bonus.php';
?>

<script type="text/javascript">
(function(){
    var rb = document.createElement('script');
        d = new Date();
    d.setHours(0);
    d.setMinutes(0);
    d.setSeconds(0);
    d.setMilliseconds(0);
    rb.type = 'text/javascript';
    rb.async = true;
    rb.src = '//s1.rotaban.ru/rotaban.js?v=' + d.getTime();
    (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(rb);
})();
</script>


								<div class="silver-bk">


<style>     
  .bonus_user_error {
    background: #e8e8f8;
    padding: 11px 107px 10px;
    height: 80px;margin: 10px 0;
    position: relative;
    opacity: 0.5;
}
  .bonus_user {
    background: #e8e8f8;
    padding: 11px 107px 10px;
    position: relative;
}
.bonus_user_name {
    color: #3838bd;
    font-weight: bold;
    font-size: 20px;
}
.bonus_user_title {
    color: rgba(0, 0, 0, 0.42);
    font-weight: bold;
    font-size: 15px;
}
.prize {
    position: absolute; right: 0px;top: 0;
    margin1: -62px 424px;text-align: center;
    width: 124px;height: 80px;
    color: #ffffff;
    padding: 2px 7px; border: 4px double #e8e8f8;
    background: #3838bd;
}
.prize span{font-weight: bold;
	font-size: 24px;
	display: block; line-height: 22px;
}
</style>

<?php if ($prof_data[bonus_1] >= 1) { ?>
<div class="bonus_user">
<img src="/img/growth.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name"> Бонус начинающего игрока #1</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам пополнившим балланс на сумму 100 и более рублей.</div>
  <div class="prize"> Приз: <span>100</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/growth.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name"> Бонус начинающего игрока #1</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам пополнившим балланс на сумму 100 и более рублей.</div>
  <div class="prize"> Приз:  <span>100</span> монет </div>
</div>

<? } ?>
<?php if ($prof_data[bonus_1] >= 2) { ?>
<div class="bonus_user">
<img src="/img/growth.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name"> Бонус начинающего игрока #2</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам пополнившим балланс на сумму 200 и более рублей.</div>
  <div class="prize"> Приз: <span>200</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/growth.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name"> Бонус начинающего игрока #2</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам пополнившим балланс на сумму 200 и более рублей.</div>
  <div class="prize"> Приз: <span>200</span> монет </div>
</div>

<? } ?>

 <?php if ($prof_data[bonus_1] >= 3) { ?>
<div class="bonus_user">
<img src="/img/growth.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name"> Бонус начинающего игрока #3</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам пополнившим балланс на сумму 300 и более рублей.</div>
  <div class="prize"> Приз: <span>300</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/growth.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name"> Бонус начинающего игрока #3</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам пополнившим балланс на сумму 300 и более рублей.</div>
  <div class="prize"> Приз: <span>300</span> монет </div>
</div>

<? } ?>

<?php if ($prof_data[bonus_1] >= 4) { ?>
<div class="bonus_user">
<img src="/img/growth.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name"> Бонус начинающего игрока #4</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам пополнившим балланс на сумму 400 и более рублей.</div>
  <div class="prize"> Приз: <span>400</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/growth.png" style=" position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name"> Бонус начинающего игрока #4</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам пополнившим балланс на сумму 400 и более рублей.</div>
  <div class="prize"> Приз: <span>400</span> монет </div>
</div>

<? } ?>

<?php if ($prof_data['bonus_2'] >= 1) { ?>
<div class="bonus_user">
<img src="/img/network.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #1db680"> Бонус рефовода #1</div>
  <div class="bonus_user_title"> Данный бонус выдается игрокам имеющим 50 и больше рефералов.</div>
  <div class="prize" style="background: #1db680;"> Приз: <span>500</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/network.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #1db680"> Бонус рефовода #1</div>
  <div class="bonus_user_title" > Данный бонус выдается игрокам имеющим 50 и больше рефералов.</div>
  <div class="prize" style="background: #1db680;"> Приз: <span>500</span> монет </div>
</div>

<? } ?>

<?php if ($prof_data['bonus_2'] >= 2) { ?>
<div class="bonus_user">
<img src="/img/network.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #1db680"> Бонус рефовода #2</div>
  <div class="bonus_user_title"> Данный бонус выдается игрокам имеющим 100 и больше рефералов.</div>
  <div class="prize" style="background: #1db680;"> Приз: <span>1000</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/network.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #1db680"> Бонус рефовода #2</div>
  <div class="bonus_user_title"> Данный бонус выдается игрокам имеющим 100 и больше рефералов.</div>
  <div class="prize" style="background: #1db680;"> Приз: <span>1000</span> монет </div>
</div>

<? } ?>

<?php if ($prof_data['bonus_2'] >= 3) { ?>
<div class="bonus_user">
<img src="/img/network.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #1db680"> Бонус рефовода #3</div>
  <div class="bonus_user_title"> Данный бонус выдается игрокам имеющим 200 и больше рефералов.</div>
  <div class="prize" style="background: #1db680;"> Приз: <span>1500</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/network.png" style="    position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #1db680"> Бонус рефовода #3</div>
  <div class="bonus_user_title"> Данный бонус выдается игрокам имеющим 200 и больше рефералов.</div>
  <div class="prize" style="background: #1db680;"> Приз: <span>1500</span> монет </div>
</div>

<? } ?>


<?php if ( $prof_data['bonus_3'] >= 1) { ?>
<div class="bonus_user">
<img src="/img/hourglass.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #424a60"> Опытный игрок #1</div>
  <div class="bonus_user_title"> Данный бонус выдается если с момента регистрации прошло 30 дней.</div>
  <div class="prize" style="background: #424a60 ;"> Приз: <span>1000</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/hourglass.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color:#424a60 "> Опытный игрок #1</div>
  <div class="bonus_user_title"> Данный бонус выдается если с момента регистрации прошло 30 дней.</div>
  <div class="prize" style="background: #424a60"> Приз: <span>1000</span> монет </div>
</div>
<? } ?>

<?php if ($prof_data['bonus_3'] >= 2) { ?>
<div class="bonus_user">
<img src="/img/hourglass.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #424a60"> Опытный игрок #2</div>
  <div class="bonus_user_title"> Данный бонус выдается если с момента регистрации прошло 150 дней.</div>
  <div class="prize" style="background: #424a60 ;"> Приз: <span>1500</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/hourglass.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color:#424a60 "> Опытный игрок #2</div>
  <div class="bonus_user_title"> Данный бонус выдается если с момента регистрации прошло 150 дней.</div>
  <div class="prize" style="background: #424a60"> Приз: <span>1500</span> монет </div>
</div>

<? } ?> 

<?php if ($prof_data['bonus_3'] >= 3) { ?>
<div class="bonus_user">
<img src="/img/hourglass.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #424a60"> Опытный игрок #3</div>
  <div class="bonus_user_title"> Данный бонус выдается если с момента регистрации прошло 360 дней.</div>
  <div class="prize" style="background: #424a60 ;"> Приз: <span>2000</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/hourglass.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color:#424a60 "> Опытный игрок #3</div>
  <div class="bonus_user_title"> Данный бонус выдается если с момента регистрации прошло 360 дней.</div>
  <div class="prize" style="background: #424a60"> Приз: <span>2000</span> монет </div>
</div>

<? } ?>

<?php if ( $prof_data['bonus_4'] >= 1) { ?>
<div class="bonus_user">
<img src="/img/strongbox.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #a87e43"> Богатый игрок #1</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам имеющим на аккаунте 10000 на вывод  серебра и больше.</div>
  <div class="prize" style="background: #a87e43"> Приз: <span>1400</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/strongbox.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color:#a87e43 "> Богатый игрок #1</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам имеющим на аккаунте 10000 на вывод  серебра и больше.</div>
  <div class="prize" style="background: #a87e43"> Приз: <span>1400</span> монет  </div>
</div>

<? } ?>
<?php if ( $prof_data['bonus_4'] >= 2) { ?>
<div class="bonus_user">
<img src="/img/strongbox.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #a87e43"> Богатый игрок #2</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам имеющим на аккаунте 20000 на вывод  серебра и больше.</div>
  <div class="prize" style="background: #a87e43"> Приз: <span>2100</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/strongbox.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color:#a87e43 "> Богатый игрок #2</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам имеющим на аккаунте 20000 серебра на вывод  и больше.</div>
  <div class="prize" style="background: #a87e43"> Приз: <span>2100</span> монет </div>
</div>

<? } ?>
<?php if ( $prof_data['bonus_4'] >= 3) { ?>
<div class="bonus_user">
<img src="/img/strongbox.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color: #a87e43"> Богатый игрок #3</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам имеющим на аккаунте 30000 серебра на вывод  и больше.</div>
  <div class="prize" style="background: #a87e43"> Приз: <span>2800</span> монет </div>
</div>

<? }else{ ?>

<div class="bonus_user_error">
<img src="/img/strongbox.png" style="position: absolute; margin: -4px -86px;">
  <div class="bonus_user_name" style="color:#a87e43 "> Богатый игрок #3</div>
  <div class="bonus_user_title"> Данный бонус выдается всем игрокам имеющим на аккаунте 30000 серебра на вывод и больше.</div>
  <div class="prize" style="background: #a87e43"> Приз: <span>2800</span> монет </div>
</div>

<? } ?>

								<div class="clr"></div>	
								</div>
								

