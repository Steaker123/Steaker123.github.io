
<style>
.bonus_block {
    width: 100px;
    margin-left: 27px;
    height: 100%;
    text-align: center;
    display: inline-block;
    color: gray;
    position: relative;
}
span.bonus_span {
    margin: 82px 0px 0 -25px;
    position: absolute; border-radius: 6px;
    color: #406371; padding: 0px 3px;
}
img.bonus_img {
    position: absolute;
    margin: 9px -22px;
    opacity: 0.2;
}
.bonus_img {
    position: absolute;
    opacity: 0.2;
    background: url(/img/bonus_error.png) no-repeat center center;
    width: 100%;
    height: 80%;
}
.money_bonus {
    position: absolute;
    opacity: 0.2;
    background: url(/img/money_bonus.png) no-repeat center center;
    width: 100%;
    height: 80%;
}
.success_bonus {
    position: absolute;
    background: url(/img/success_bonus.png) no-repeat center center;
    width: 100%;
    height: 80%;
}
</style>

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

<?php

$db->Query("SELECT * FROM db_users_a WHERE id = '$user_id' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_users_b WHERE id = '$user_id' LIMIT 1");
$user_data_b = $db->FetchArray();
$time = time();
$new_time = time() + 86400;
$new_times = time() + 172800;
$user_name = $user_data["user"]; 
$user_id = $user_data["id"]; 
$time_bonus = $user_data["time_bonus"] ;
$time_bonus_error = $user_data["time_bonus_error"] ;
$bonus_us = $user_data["bonus_us"] ;

   if ($time >= $time_bonus_error  ) {

     $db->Query("UPDATE db_users_a SET bonus_us = 0  WHERE id = '$user_id'");
     $db->Query("UPDATE db_users_a SET time_bonus_error = '$new_times'  WHERE id = '$user_id'");
     $db->Query("UPDATE db_users_a SET time_bonus = '$new_time'  WHERE id = '$user_id'");
     Header('Location: /profile'); 

   }  else {

 if ($time > $time_bonus  ) {


     $db->Query("UPDATE db_users_a SET time_bonus_error = '$new_times'  WHERE id = '$user_id'");
     $db->Query("UPDATE db_users_a SET time_bonus = '$new_time'  WHERE id = '$user_id'");
     $db->Query("UPDATE db_users_a SET bonus_us = bonus_us + 1  WHERE id = '$user_id'");
     Header('Location: /profile'); 
 }
       if ($bonus_us == 7  ) {
      $db->Query("UPDATE db_users_a SET bonus_us = bonus_us +1 WHERE id = '$user_id'");
      $db->Query("UPDATE db_users_b SET money_b = money_b + 100  WHERE id = '$user_id'");
      $db->Query("UPDATE db_users_a SET time_bonus = '$new_time'  WHERE id = '$user_id'");
      Header('Location: /profile'); 
      }

      if ($bonus_us == 8 and $time > $time_bonus ) {
      $db->Query("UPDATE db_users_a SET bonus_us = bonus_us - 8 WHERE id = '$user_id'");
      $db->Query("UPDATE db_users_a SET time_bonus = '$new_time'  WHERE id = '$user_id'");
      Header('Location: /profile'); 
      } 
      } 
?>
<div style="background: #e8e8f8;padding: 17px 5px;border-radius: 4px;height: 150px;"> 
<center style="font-size: 18px;text-transform: uppercase;">Бонус за активность</center>

<?php 
if ($bonus_us == 0) {
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 1 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 2 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 3 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 4 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 5 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 6 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='money_bonus'></div> <span class='bonus_span' > 7 день </span> </div>";
}

if ($bonus_us == 1) {
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 1 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 2 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 3 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 4 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 5 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 6 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='money_bonus'></div> <span class='bonus_span' > 7 день </span> </div>";
 } 

if ($bonus_us == 2) {
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 1 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 2 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 3 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 4 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 5 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 6 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='money_bonus'></div> <span class='bonus_span' > 7 день </span> </div>";
 } 

 if ($bonus_us == 3) {
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 1 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 2 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 3 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 4 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 5 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 6 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='money_bonus'></div> <span class='bonus_span' > 7 день </span> </div>";
 } 

if ($bonus_us == 4) {
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 1 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 2 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 3 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 4 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 5 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 6 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='money_bonus'></div> <span class='bonus_span' > 7 день </span> </div>";
 }

if ($bonus_us == 5) {
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 1 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 2 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 3 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 4 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 5 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='bonus_img'></div> <span class='bonus_span' > 6 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='money_bonus'></div> <span class='bonus_span' > 7 день </span> </div>";
 } 

if ($bonus_us == 6) {
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 1 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 2 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 3 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 4 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 5 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 6 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='money_bonus'></div> <span class='bonus_span' > 7 день </span> </div>";
 } 

if ($bonus_us == 7) {
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 1 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 2 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 3 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 4 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 5 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 6 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='money_bonus' style='opacity: 10.0;'></div> <span class='bonus_span' > 7 день </span> </div>";
 } 
 if ($bonus_us == 8) {
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 1 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 2 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 3 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 4 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 5 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='success_bonus'></div> <span class='bonus_span' > 6 день </span> </div>";
echo "<div class = 'bonus_block'> <div class='money_bonus' style='opacity: 10.0;'></div> <span class='bonus_span' > 7 день </span> </div>";
 } 
 ?>	

</div> 
<br/>