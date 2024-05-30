<?php
    session_start();
    if(empty($_SESSION['auth'])) {
        header("Location: index.php");
    }
    require_once("db.php");
    $counter = mysqli_query($link, "SELECT COUNT(*) as count FROM problems WHERE status = 'завершена'");
    $res = mysqli_fetch_assoc($counter);
    $count = $res['count'];
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
        <a href="admin.php">Главная</a>
        <a href="">Добавить исполнителя</a>
        <a href="update.php">Изменить статус</a>
        <a href="update_problem.php">Изменить описание</a>
        <a href="logout.php">Выйти</a>
    </nav>
    <main>
        <h2>Добавить исполнителя</h2>
        <form class="form1" action="" method="POST">
        <table>
            <tr>
                <td>Номер заявки</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>Назначить исполнителя</td>
                <td><input type="text" name="id_worker"></td>
            </tr>
            <tr>
                <td></td>
                <td><button>Изменить</button></td>
            </tr>
        </table>
        </form>
                <?php
                if(!empty($_POST['id'])&& !empty($_POST['id_worker'])) {
                    $id = $_POST['id'];
                    $id_worker = $_POST['id_worker'];
                    $result = mysqli_query($link, "UPDATE problems SET id_worker='$id_worker' WHERE id='$id'");
                    if($result == 'true') {
                        header("Location: admin.php");
                    } else{
                        echo "Ошибка!";
                    }
                }
                ?>
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