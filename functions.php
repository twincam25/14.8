<?php

include 'users.php';

function getUsersList($users3){
    $users = array();
    foreach ($users3 as $key => $value) {
      $users[$key] = $value['pass'];
    }
    return $users;
}

function existsUser($login) {
    return array_key_exists($login, $users3);
}

function getCurrentUser(){
    return $_POST['login'] ?? null;
}

function checkPassword($login, $password, $users3){
    return (getCurrentUser($login) && password_verify($password, getUsersList($users3)[$login]));
 }

 function timeMessage ($time_input) {
    $current_time = time(); 
    $time_deadline = ($time_input + 86400) - $current_time;
    $minutes = floor($time_deadline / 60); 
    $hours = floor($minutes / 60); 
    $minutes = $minutes - ($hours * 60);
    $message = nl2br('До окончания скидки: ' . $hours. ' ч. ' . $minutes . ' мин.');
    return $message;
}

function birthdayMessage($birthday_input, $users3, $login) {
    
    if(!$users3[$login]['b_day'] && !$birthday_input) {
        $message = nl2br('Укажите свою дату рождения и получите дополнительную скидку!');
    }
    else {

        $todayNumber = date('j'); 
        $todayMonth = date('n'); 

        if(!$users3[$login]['b_day']) {
            $birthday = $birthday_input; 
        }
            else {
                $birthday = $users3[$login]['b_day']; 
            }

        $birthdayNumber = date('j', strtotime($birthday)); 
        $birthdayMonth = date('n', strtotime($birthday)); 

        if($todayNumber == $birthdayNumber && $todayMonth == $birthdayMonth) {

            $message = 'Сегодня, в Ваш день рождения, вы получаете дополнительную скидку 5% на все услуги салона!'; 
        }
            else {
                $bd = explode('-', $birthday); 
                $bd = mktime(0, 0, 0, $bd[1], $bd[2], date('Y') + ($bd[1].$bd[2] <= date('md'))); 
                $days_until = ceil(($bd - time()) / 86400); 

                $message = 'До Вашего дня рождения осталось дней: ' . $days_until . '.'; 
            }
        }
    return $message;
}

 ?>