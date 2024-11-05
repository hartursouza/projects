<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de produtos</title>
</head>
<body>
    <?php 
        // Carrega os produtos
        $products = require './src/table/products.php';

        // Inicializa a variável de ordenação
        $order = $_POST['order'] ?? null;

        // Ordenar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $order = $_POST['order'];

            if ($order == 'price') {
                usort($products, function ($value1, $value2){
                    return $value1['price'] <=> $value2['price'];
                });
            }

            if ($order == 'quantity') {
                usort($products, function ($value1, $value2){
                    return $value1['quantity'] <=> $value2['quantity'];
                });
            }
        }
    ?>
    <div><span>Ordenar por:</span></div>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <select name="order">
            <option value="price" <?= $order === 'price' ? 'selected' : '' ?>>Preço</option>
            <option value="quantity" <?= $order === 'quantity' ? 'selected' : '' ?>>Quantidade</option>
        </select>
        <input type="submit" value="Ordenar">
    </form>
    <br>
    <table>
        <caption>Catálogo de produtos</caption>
        <thead>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
        </thead>
        <tbody>
            <?php foreach ($products as $product):?>
                <tr>
                    <th scope="row"><?=$product['name']?></th>
                    <td><?=$product['price']?></td>
                    <td><?=$product['quantity']?></td>
                </tr>  
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>