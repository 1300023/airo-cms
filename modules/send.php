<?php 


if ($_POST['send']) {

$mail = "��������! �������� ��������-����� �� �������.\n\n";

$mail .= "���: {$_POST['fio']}\n";
$mail .= "�������: {$_POST['phone']}\n";
$mail .= "Email: {$_POST['email']}\n";
$mail .= "������: {$_POST['text']}\n";


$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=\"windows-1251\"\r\n";

mail("info@mastmarket.ru", "mastmarket.ru: �������� ��������-����� �� �������.", $mail, $headers ) or die("�� �����");

}


echo "<p><font color='green'>������ ������� ����������!</font></p>";
echo "<META http-equiv='refresh' content='0; url=/obratnaya_svyaz/'>";

?>