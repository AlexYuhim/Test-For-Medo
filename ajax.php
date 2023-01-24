<?php
include_once 'config.php';
if(isset($_GET['order'])){

  $mail = isset($_GET['mail'])?$_GET['mail']:'';
  $product = isset($_GET['value_check'])?$_GET['value_check']:[];
// добавляем в базу
$res = db_query("INSERT INTO `test_for_medo`( `mail`, `product`) VALUES ('$mail','$product')"); 

//  для рассылки почты
  $to = 'itdirector-info@yandex.ru'; 
  $subject = 'заказ';
  $message = 'произведен заказ продукта:'."\r\n". $product.'.'."\r\n". 'Почтовый адрес заказчика' . "\r\n". $mail ; 
  $headers = 'From: pochta@quiz.ru' . "\r\n" . 'Content-Type: text/html; charset=utf-8' . "\r\n" . 'Reply-To: pochta@quiz.ru' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

$mail= mail($to, $subject, $message, $headers); 

exit();
}

 ?>