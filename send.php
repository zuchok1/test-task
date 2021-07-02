<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь

$buyName = $_POST['buyName'];
$buyPhone = $_POST['buyPhone'];
$buyMessage = $_POST['buyMessage'];
$buyEmail = $_POST['buyEmail'];

// Формирование самого письма
$title = "Новый заказ";

$body = "
    <h2>Новый заказ</h2>
    <b>Имя:</b> $buyName<br>
    <b>Телефон:</b> $buyPhone<br>
    <b>Email:</b> $buyEmail<br><br>
    <b>Товар:</b><br>$buyMessage
    ";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    
    $mail->Host       = 'mail.zuchok.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'test@zuchok.ru'; // Логин на почте
    $mail->Password   = '9E3e9H2x'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('test@zuchok.ru', 'Тест'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('zuchok228@gmail.com'); // Ещё один, если нужен

// Отправка сообщения
$mail->isHTML(true);

$mail->Subject = $title;
$mail->Body = $body;    


// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
header('Location: thanks.html');

