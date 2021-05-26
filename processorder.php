
<?php
// Создание коротких имен переменных
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'] ;
$sparkqty = $_POST['sparkqty'];
$find = $_POST['find'];
$address = preg_replace('/\t|\R/','',$_POST['address']);
$date = date('H:i, jS F Y');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Автозапчасти от Вовки - результаты заказа</title>
</head>
<body>
    <h1>Автозапчасти от Вовки</h1>
    <h2>Результаты заказа</h2>
    <?php 
        echo "<p>Заказ обработан в ";
        echo date('H:i, jS F Y');
        echo "</p>";
        echo "<p> Ваш заказ: </р><br/>";


        // Вычисление итоговых сумм для формы
        $totalqty = 0;
        $totalqty = $tireqty + $sparkqty + $oilqty;
        echo "<p>Заказано товаров: ".$totalqty."<br/>";
            if ($totalqty == 0) {
        echo " Вы ничего не заказали на предыдущей странице!<br />";
            } else {
        if ($tireqty > 0)
            echo htmlspecialchars($tireqty) . ' шин<br/>';
        if ($oilqty > 0)
            echo htmlspecialchars($oilqty) . ' бутылок масла<br/>';
        if ($sparkqty > 0)
            echo htmlspecialchars($sparkqty) . ' свечей зажигания<br/>';
            }
        $totalamount = 0.00;

        // Константы цены товаров
        define('TIREPRICE', 100);
        define('OILPRICE', 10);
        define('SPARKPRICE', 4);

        $totalamount = $tireqty * TIREPRICE
                    + $oilqty * OILPRICE
                    + $sparkqty *SPARKPRICE;
        echo "Итого: $".number_format($totalamount,2)."<br/>";

        $taxrate = 0.10;
        $totalamount = $totalamount * (1+$taxrate);
        echo "Всего, включая налог с продаж: $".number_format($totalamount,2)."</p>";

        echo "<p>Адрес доставки: ".htmlspecialchars($address)."</p>";


    // Работа с файлом
    $outputstring = $date."\t".$tireqty."Кол-во шин\t".$oilqty."Кол-во бутылок масла\t"
        .$sparkqty."Кол-во свечей зажигания\t\$".$totalamount
        ."\t".$address."\n";

    @$fp = fopen("E:\\OpenServer\\domains\\www\\orders.txt",'ab');

    if (!$fp) {
        echo "<p><strong>В настоящий момент ваш запрос не может быть обработан.
                Пожалуйста, попробуйте позже.</strong></p>";
        exit;
    }
    flock($fp,LOCK_EX);
    fwrite($fp,$outputstring, strlen($outputstring));
    flock($fp,LOCK_UN);
    fclose($fp);
    echo "<p>Спасибо, заказ записан.</p>";

    ?>
</body>
</html>