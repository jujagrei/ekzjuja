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
        <a href="">Главная</a>
        <a href="">Подать заявку</a>
        <a href="">Все заявки</a>
        <a href="logout.php">Выйти</a>
    </nav>
    <main>
        <h2>Подать заявку</h2>
            <form class="form1" accept="" method="POST">
                <table>
                    <tr>
                        <td>Тип авто</td>
                        <td><input type="text" name="type_of_car"></td>
                    </tr>
                    <tr>
                        <td>Модель авто</td>
                        <td><input type="text" name="car_model"></td>
                    </tr>
                    <tr>
                        <td>Проблема</td>
                        <td><input type="text" name="problem"></td>
                    </tr>
                    <tr>
                        <td>Описание</td>
                        <td><textarea name="descript"></textarea></td>
                    </tr>
                    <tr>
                        <td>ФИО</td>
                        <td><input type="text" name="full_name"></td>
                    </tr>
                    <tr>
                        <td>Номер телефона</td>
                        <td><input type="text" name="phone_number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button>Отправить</button></td>
                    </tr>
                </table>
            </form>
    </main>

    <?php
        require_once("db.php");
            if(!empty($_POST['type_of_car'])&& !empty($_POST['car_model'])&& !empty($_POST['problem'])&& !empty($_POST['descript'])&& !empty($_POST['full_name'])&& !empty($_POST['phone_number'])){
                $type_of_car = $_POST['type_of_car'];
                $car_model = $_POST['car_model'];
                $problem = $_POST['problem'];
                $descript = $_POST['descript'];
                $full_name = $_POST['full_name'];
                $phone_number = $_POST['phone_number'];
                $id = $_SESSION['id'];
                $result = mysqli_query($link, "INSERT INTO problems(type_of_car,car_model,problem,descript,full_name,phone_number,id_user) VALUES('$type_of_car','$car_model','$problem','$descript','$full_name','$phone_number','$id') ");
                    if($result == 'true'){
                        header("Location: problems_all.php");
                    }
                    else{
                        echo "Информация не добавленна";
                    }
            }
    ?>
</body>
</html>