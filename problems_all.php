<?php
    session_start();
    if(empty($_SESSION['auth'])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>АвтоСервис</title>
    <link rel="stylesheet" href="css2/style.css">
</head>
<body>
    <header>
        <h1>ООО АвтоСервис</h1>
    </header>
    <nav>
        <a href="problems.php">Главная</a>
        <a href="problems.php">Подать заявку</a>
        <a href="">Все заявки</a>
        <a href="logout.php">Выйти</a>
    </nav>
    <main>
        <h2>Все заявки</h2>
                <table class="all_problems">
                    <tr>
                        <th>Номер заявки</th>
                        <th>Дата добавления</th>
                        <th>Тип авто</th>
                        <th>Модель авто</th>
                        <th>Проблема</th>
                        <th>Описание</th>
                        <th>ФИО</th>
                        <th>Номер</th>
                        <th>Сотрудник</th>
                        <th>Статус</th>
                    </tr>
                
                <?php
                    require_once("db.php");
                    if(!empty($_POST['full_name'])){
                        $search_full_name = mysqli_query($link, "SELECT * FROM problems WHERE full_name='$_POST[full_name]'");
                        while($res=mysqli_fetch_assoc($search_full_name)){
                            echo "<tr>
                                <td>$res[id]</td>
                                <td>$res[date_start]</td>
                                <td>$res[type_of_car]</td>
                                <td>$res[car_model]</td>
                                <td>$res[problem]</td>
                                <td>$res[descript]</td>
                                <td>$res[full_name]</td>
                                <td>$res[phone_number]</td>
                                <td>$res[id_worker]</td>
                                <td>$res[status]</td>
                            </tr>";
                        }
                    } else{
                        $result = mysqli_query($link, "SELECT * FROM problems ORDER BY id DESC");
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>
                                <td>$row[id]</td>
                                <td>$row[date_start]</td>
                                <td>$row[type_of_car]</td>
                                <td>$row[car_model]</td>
                                <td>$row[problem]</td>
                                <td>$row[descript]</td>
                                <td>$row[full_name]</td>
                                <td>$row[phone_number]</td>
                                <td>$row[id_worker]</td>
                                <td>$row[status]</td>
                            </tr>";
                    } 
                }
                ?>
                </table>
    </main>
</body>
</html>
