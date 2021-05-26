<?php
// Создание коротких имен переменных
$document_root = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Автозапчасти от Вовки - Заказы клиентов</title>
</head>
<body>
<h1>Автозапчасти от Вовки</h1>
<h2>Заказы клиентов</h2>
<?php
$orders = file("E:\\OpenServer\\domains\\www\\orders.txt");
$number_of_orders = count($orders);

if($number_of_orders == 0) {
    echo "<p><strong>Ожидающие заказы отсутствуют.<br/>
            Пожалуйста, попробуйте позже.</strong></p>";
}

for ($i=0;$i<$number_of_orders;$i++){
    echo $orders[$i]."<br/>";
}

?>

</body>
</html>