<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
</head>
<body>
    <?php 
        $value = $_POST['value'] ?? 0;
        $currency = $_POST['currency'] ?? '';

        $result = 0;
        $cot_dolar = 5.8;
        $cot_euro = 6.5;
    ?>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <input type="text" name="value" step="0.01" value="<?=$value?>">

        <select name="currency">
            <option value="dolar">Dólar</option>
            <option value="euro">Euro</option>
        </select>

        <input type="submit">
    </form>

    <?php 
        switch ($currency) {
            case 'dolar':
                $result = $value / $cot_dolar;
                break;
            case 'euro':
                $result = $value / $cot_euro;
                break;
        }

        echo "<p>".number_format($result, 2, ",", ".")."</p>";
    ?>
</body>
</html>