<?php
//==========================================================================================
//ПОДКЛЮЧЕНИЕ К БАЗЕ

$driver = 'mysql';
$host = '127.0.0.1';
$port = '3306';
$database = 'home_work';

$username = 'root';
$password = '';
$charset = 'utf8mb4';

$dsn = "$driver:host=$host;port=$port;dbname=$database;charset=$charset";
$pdo = new PDO($dsn, $username, $password, []);


$id = $_GET['id'] ?? null;
$status = $_GET['status'] ?? null;

//==========================================================================================
//ЗАПОЛНЕНИЕ ТАБЛИЦЫ category
//ДЕЛАЕТСЯ ОДИН РАЗ ПРИ ПЕРВОМ ЗАПУСКЕ ДЛЯ ПЕРВИЧНОГО ЗАПОЛНЕНИЯ ТАБЛИЦЫ и СОЗДАНИЯ КАТЕГОРИЙ.
//ЗАТЕМ ЗАКОММЕНТИРУЕТСЯ.

//$categories = array("Мебель", "Инструменты","Продукты");
//
//foreach ($categories as $category) {
//    $sql = "INSERT category (name) VALUES (:name)";
//    $stmt = $pdo->prepare($sql);
//    $params = [
//        'name'=>$category
//              ];
//    $stmt->execute($params);
//}
//==========================================================================================
//ЗАПОЛНЕНИЕ ТАБЛИЦЫ product
//ДЕЛАЕТСЯ ОДИН РАЗ ПРИ ПЕРВОМ ЗАПУСКЕ ДЛЯ ПЕРВИЧНОГО ЗАПОЛНЕНИЯ ТАБЛИЦЫ И СОЗДАНИЯ ГРУППЫ ТОВАРОВ.
//ЗАТЕМ ЗАКОММЕНТИРУЕТСЯ.

//$products = array(
//    ["Стол","Кухонный","шт","1","100"],
//    ["Стул","Кухонный","шт","1","20"],
//    ["Диван","Раскладной","шт","1","300"],
//    ["Кровать","Полуторная","шт","1","200"],
//);
//
//foreach ($products as $product) {
//    $sql = "INSERT product (name,description,package,category_id,price) VALUES (:name, :description, :package, :category_id, :price)";
//    $stmt = $pdo->prepare($sql);
//    $params = [
//        'name'=>$product[0],
//        'description'=>$product[1],
//        'package'=>$product[2],
//        'category_id'=>$product[3],
//        'price'=>$product[4],
//    ];
//    $stmt->execute($params);
//}
//==========================================================================================
//БЛОК УДАЛЕНИЯ СТРОКИ
//ПРИ ЗНАЧЕНИИ ПЕРЕМЕННОЙ status == delete ПЕРЕДАННОЙ ПО ССЫЛКЕ В GET ЗАПРОСЕ - УДАЛЕНИЕ ВЫБРАННОЙ СТРОКИ -->

if ($status=='delete'){
    $sql = "DELETE FROM product WHERE id = '$id'";

//    $pdo->exec($sql);
//    ТАК БОЛЕЕ ПРАВИЛЬНО
    $params = [
        'id' => $id,
    ];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);



    $id = null;
    $status = null;
}
//==========================================================================================
//БЛОК РЕДАКТИРОВАНИЯ СТРОКИ
//ПРИ ЗНАЧЕНИИ ПЕРЕМЕННОЙ status == edit ПЕРЕДАННОЙ ПО ССЫЛКЕ В GET ЗАПРОСЕ - РЕДАКТИРОВАНИЕ ВЫБРАННОЙ СТРОКИ -->
if(isset($_POST['submit']) && $status=='edit') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $package = $_POST['package'];
    $price = $_POST['price'];
    $update_time = date('Y-m-d H:i:s');
//        if(!is_numeric($price)) {
//            echo "Вы ввели не число";
//        }
    $sql = 'UPDATE product SET name=:name, description=:description, package=:package, price=:price, update_time=:update_time WHERE id = :id';
    $params = [
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'package' => $package,
        'price' => $price,
        'update_time' => $update_time
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $id = null;
    $status = null;
}
//==========================================================================================
//БЛОК ДОБАВЛЕНИЯ СТРОКИ
//ПРИ ЗНАЧЕНИИ ПЕРЕМЕННОЙ status == add ПЕРЕДАННОЙ ПО ССЫЛКЕ В GET ЗАПРОСЕ - ДОБАВЛЕНИЕ СТРОКИ -->
if(isset($_POST['submit']) && $status=='add') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $package = $_POST['package'];
    $price = $_POST['price'];

// ЧТОБЫ НЕ УСЛОЖНЯТЬ ПРОГРАММУ ПРИСВАИВАЮ ПО УМОЛЧАНИЮ КАТЕГОРИЮ "МЕБЕЛЬ" с "id"=1
//А ТАК ПРИШЛОСЬ БЫ СТАВИТЬ ПРОВЕРКУ НА ВВОДИМЫЕ ЗНАЧЕНИЯ КАТЕГОРИЙ
//А ТАКЖЕ ПРОВЕРКУ НА ВВОД ЦЕНЫ НА ЧИСЛО
//
    $category_id = 1;

    $sql = "INSERT product (name,description,package,category_id,price) VALUES (:name, :description, :package, :category_id, :price)";
    $stmt = $pdo->prepare($sql);
    $params = [
        'name' => $name,
        'description' => $description,
        'package' => $package,
        'category_id' => $category_id,
        'price' => $price,
    ];
    $stmt->execute($params);
//    header("Location: home_work_2.php");
    $id = null;
    $status = null;
}
//==========================================================================================
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Home_Work_2</title>
</head>
<body>
<!--//ВЫБОРКА ИЗ ТАБЛИЦЫ product ВСЕХ ТОВАРОВ С КАТЕГОРИЕЙ "Мебель" И ВЫВОД ТАБЛИЦЫ НА ЭКРАН -->
<!--//ПРИ ЗНАЧЕНИИ ПЕРЕМЕННОЙ status == edit ПЕРЕДАННОЙ ПО ССЫЛКЕ В GET ЗАПРОСЕ - РЕДАКТИРОВАНИЕ ВЫБРАННОЙ СТРОКИ -->
<!--//ПРИ ЗНАЧЕНИИ ПЕРЕМЕННОЙ status == add ПЕРЕДАННОЙ ПО ССЫЛКЕ В GET ЗАПРОСЕ - ДОБАВЛЕНИЕ ВЫБРАННОЙ СТРОКИ -->

<table cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <tr>
        <th>Номер&nbsp&nbsp</th>
        <th>Название&nbsp&nbsp</th>
        <th>Описание&nbsp&nbsp</th>
        <th>Ед.измерения&nbsp&nbsp</th>
        <th>Цена </th>
    </tr>

    <?php $sql = "SELECT id, name, description, package, price FROM product WHERE category_id = 1";

    foreach($pdo->query($sql) as $row){
        if ($row['id'] == $id && $status == 'edit'){
            ?>
            <tr>
                <td> <?php echo $row['id'] ?></td>
                <form action="" method="post">
                    <td><input type="text" name="name" value="<?php echo $row['name'] ?>" "></td>
                    <td><input type="text" name="description" value="<?php echo $row['description'] ?>" "></td>
                    <td><input type="text" name="package" value="<?php echo $row['package'] ?>" "></td>
                    <td><input type="text" name="price" value="<?php echo $row['price'] ?>" "></td>
                    <td><input type="submit" name="submit" value="Сохранить"</td>
                </form>

            </tr>
        <?php    }
        else {     ?>

            <tr>
                <td> <?php echo $row['id'] ?></td>

                <td> <?php echo $row['name'] ?></td>

                <td><?php echo $row['description'] ?></td>

                <td><?php echo $row['package'] ?></td>

                <td><?php echo $row['price'] ?></td>

                <td><a href='home_work_2.php?id=<?php echo $row['id']?>&status=edit'>&nbspРедактировать</a></td>

                <td><a href='home_work_2.php?id=<?php echo $row['id']?>&status=delete'>&nbspУдалить</a></td>

            </tr>
        <?php } ?>
    <?php } ?>

    <?php if ($status == 'add'){ ?>
    <tr>
        <td> <?php echo $row['id']+1 ?></td>
        <form action="" method="post">
            <td><input type="text" name="name" value="<?php echo $row['name'] ?>" "></td>
            <td><input type="text" name="description" value="<?php echo $row['description'] ?>" "></td>
            <td><input type="text" name="package" value="<?php echo $row['package'] ?>" "></td>
            <td><input type="text" name="price" value="<?php echo $row['price'] ?>" "></td>
            <td><input type="submit" name="submit" value="Сохранить"</td>
        </form>

    </tr>
    <?php } ?>

    </tbody>
</table>

<div style="margin-top:20px; margin-left:20px">

    <a href='home_work_2.php?status=add'><span>ДОБАВИТЬ СТРОКУ</span></a>

</div>


</body>
</html


