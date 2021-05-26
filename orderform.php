<form action="processorder.php" method="post">
<table style="border: 0;">
<tr style="background: #cccccc">
<td style="width: 150px; text-align: center;">Товары</td>
<td style="width: 15px; text-align: center;">Количество</td>
</tr>
<tr>
<td>Шины</td>
<td><input type="text" name="tireqty" size="3" maxlength="3"></td>
</tr>
<tr>
<td>Масло</td>
<td><input type="text" name="oilqty" size="3" maxlength="3"></td>
</tr>
<tr>
<td>Свечи зажигания</td>
<td><input type="text" name="sparkqty" size="3" maxlength="3"></td>
</tr>
<tr>
</tr>
    <tr>
        <td>Адрес для доставки</td>
        <td><input type="text" name="address" size="40" ></td>
        <!--<td style="width: 150px;">Как вы нашли Автозапчасти от Вовки?</td>
        <td>
            <select name="find" >
                <option value="a">Я постоянный клиент</option>
                <option value="b">В телевизионной рекламе</option>
                <option value="c">В телефонном справочнике</option>
                <option value="d">По сарафанному радио</option>
            </select>
        </td>
        -->
    </tr>
<td colspan="2" style="text-align: center;"><input type="submit" value="Отправить заказ"></td>

</table>
</form>