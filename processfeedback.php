<?php

// Создать короткие имена переменных
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

// Настроить статическую информацию
$toaddress = "feedback@example.com";

$subject = "Отзыв от веб-сайта";

$mailcontent = "Имя клиента: ".str_replace("\r\n","",$name)."\n".
                "Почтовый адрес клиента".str_replace("\r\n","",$email)."\n".
                "Комментарий клиента: \n".str_replace("\r\n","",$feedback)."\n";

$fromaddress = "From: webserver@example.com";

// Вызвать функцию mail() для отправки электронной почты
mail($toaddress, $subject, $mailcontent, $fromaddress);
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Автозапчати от Вовки - Отзыв отправлен</title>
</head>
<body>

    <h1>Отзыв отправлен</h1>
    <p>Ваш отзыв был отправлен</p>
    <p><?php echo nl2br(htmlspecialchars($feedback));?></p>
</body>
</html>
