<!DOCTYPE html>
<html>
<head>
    <title>Авзапчасти от Вовки - Стоимость доставки</1:1Г1е>
</head>
<body>
<table style="border: Opx; padding: Зрх">
<tr>
    <td style="background: #cccccc; text-align: center;">Paccтояние</td>
    <td style="background: #cccccc; text-align: center;">Cтоимость</td>
</tr>
<?php
for ($distance = 50; $distance <= 250; $distance += 50) {
    echo "<tr>
<td style=\"text-align: right;\">".$distance."</td>
<td style=\"text-align: right;\">".($distance / 10)."</td>
</tr>\n";}
?>

</table>
</body>
</html>