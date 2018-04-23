<?php
class isender{
    
	var $Hosts = "";
	
	/*======================================================================*\
	Function:	__construct
	Descriiption: Конструктор класса
	\*======================================================================*/
	function __construct(){
	
		$this->Hosts = str_replace("www.","",$_SERVER['HTTPS_HOST']);
	
	}
	
	/*======================================================================*\
	Function:	SendRegKey
	Descriiption: Отправляет регистрационный ключ
	\*======================================================================*/
	function SendRegKey($mail, $key){
	
		$text = "Вы или кто-то другой начал(а) процесс регистрации аккаунта в btc.universall.ru на ваш электронный адрес.<br><br>";
		$text.= "Чтобы завершить регистрацию в btc.universall.ru, пожалуйста, перейдите по следующей ссылке: <a href='http://cripto.biz".$this->Hosts."/signup/key/{$key}'>";
		$text.= "http://cripto.biz".$this->Hosts."/signup/key/{$key}</a>";
		$subject = "Запрос на регистрацию в cripto.biz";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	RecoveryPassword
	Descriiption: Восстановление пароля
	\*======================================================================*/
	function RecoveryPassword($user, $pass, $mail){
	
		$text.= "<b>Уважаемый(ая) пользователь</b>, вы создали заявку о восстановлении пароля. <br><br>";
		$text.= "Ваш пароль: {$pass}";
		$subject = "Восстановление пароля в cripto.biz";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SendAfterReg
	Descriiption: Отправляет данные после регистрации
	\*======================================================================*/
	function SendAfterReg($user, $mail, $pass){
	
		$text = "<b>Уважаемый(ая) пользователь</b>, Вы завершили регистрацию аккаунт в игре btc.universall.ru. Желаем вам больших заработков!<br><br>";
		$text.= "Для входа используйте данные: {$user};{$pass}.";
		$subject = "Завершение регистрации в cripto.biz";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	SetNewPassword
	Descriiption: Отправляет данные после смены пароля
	\*======================================================================*/
	function SetNewPassword($user, $pass, $mail){
	
		$text = "<b>Уважаемый(ая) пользователь,</b><BR />";
		$text.= "Ваши новые данные для входа: {$user};{$pass}<BR />";
		$text.= "Если вы не проводили данные изменения или вам нужна помощь, пожалуйста, обратитесь в Службу Поддержки.";
		$subject = "Смена пароля в cripto.biz";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
	
	
	/*======================================================================*\
	Function:	Headers
	Descriiption: Создание заголовков письма
	\*======================================================================*/
	function Headers(){
	
	$headers = "MIME-Version: 1.0\r\n";
	$headers.= "Content-type: text/html; charset=Windows-1251\r\n";
	$headers.= "Date: ".date("m.d.Y (H:i:s)",time())."\r\n";
	$headers.= "From: noreply@cripto.biz \r\n";
	
		return $headers;
	
	}
	
	/*======================================================================*\
	Function:	SendMail
	Descriiption: Отправитель
	\*======================================================================*/
	function SendMail($recipient, $subject, $message){
	
		$message .= "<br><br>
                <small>Пожалуйста, не отвечайте на данное письмо. Данный почтовый адрес не может быть использован для связи с нами. 
                Если у вас есть вопросы, обращайтесь в support@cripto.biz</small>";
		return (mail($recipient, $subject, $message, $this->Headers())) ? true : false;
	
	}
	
	
	
}
?>