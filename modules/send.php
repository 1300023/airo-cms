<?php 


if ($_POST['send']) {

$mail = "Внимание! Поступил Экспресс-заказ от клиента.\n\n";

$mail .= "ФИО: {$_POST['fio']}\n";
$mail .= "Телефон: {$_POST['phone']}\n";
$mail .= "Email: {$_POST['email']}\n";
$mail .= "Вопрос: {$_POST['text']}\n";


$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=\"windows-1251\"\r\n";

mail("info@mastmarket.ru", "mastmarket.ru: Поступил экспресс-заказ от клиента.", $mail, $headers ) or die("не пошло");

}


echo "<p><font color='green'>Письмо успешно отправлено!</font></p>";
echo "<META http-equiv='refresh' content='0; url=/obratnaya_svyaz/'>";

?>