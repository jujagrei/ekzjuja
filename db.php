<?php
    $link = mysqli_connect('localhost','root','','Ferganski');
    if(!$link) {
        die("Ошибка: " .mysqli_connect_error());
    }
    /*else {echo "Соединение успешно"}*/
?>