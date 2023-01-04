<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Banya</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
if (!empty($_POST)) {
    include 'functions.php';

    $login = $_POST['login'] ?? null; 
    $password = $_POST['password'] ?? null; 
    $time_input = $_POST['time_input'] ?? null;
    $birthday_input = $_POST['date'] ?? null; 

    if (checkPassword($login, $password, $users3)) {
        session_start();      
        $_SESSION['message'] = 'Приятного времяпрепровождения, ' . $login . '!';
    }
        else {
            header('Location: login.php');
        }
}
?>

<header>
    <div class="header">
    <h1>Dream Banya and Spa</h1>
        <div class = "msg">
        <?php
            if (!empty($_POST)) {
                echo $_SESSION['message'] . '<br/>';
                echo "Сегодня, Вам скидка! <br/>";
                echo timeMessage($time_input) . '<br/>';
                echo birthdayMessage($birthday_input, $users3, $login) . '<br/>';
                echo '<button onClick="window.location.href=window.location.href">Выход</button>';
            }
            else {
                echo '<form action="login.php" method="get"><button type="submit" width = "100px">Вход на сайт</button></form>';
            }    
        ?> 
        </div>
    </div>   
</header>


    <section class="services">
        <article class="news-news">
            <a href="#">
                <h2 class="new">Баня</h2>
            </a>
            <div class="article-meta">
                Банщик <a href="#">Пааво</a>
                Стоимость - 50 евро/час
            </div>
            <img src="https://images.unsplash.com/photo-1568729937315-2ef5ee9cf4f2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1583&q=80">
            <p>Профессионал мирового класса из Финляндии. Гарантируем, что после этого сеанса вы заново родитесь!</p>
            <button type="button" class="btn btn-secondary btn-sm">Заказать услугу</button>
        </article>

        <article class="news-news">
            <a href="#">
                <h2 class="new">СПА</h2>
            </a>
            <div class="article-meta">
            Магистр СПА процедур <a href="#">Лан Данг</a>
            Стоимость - 70 евро/процедура
            </div>
            <img src="https://images.unsplash.com/photo-1600334129128-685c5582fd35?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80">
            <p>Сбросьте груз с себя вместе с камнями!</p>
            <button type="button" class="btn btn-secondary btn-sm">Заказать услугу</button>
        </article>

        <article class="news-news">
            <a href="#">
                <h2>Массаж</h2>
            </a>
            <div class="article-meta">
            Виртуоз рук <a href="#">Лаван</a>
            Стоимость - 150евро
            </div>
            <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80">
            <p>Пересчитает Ваши позвонки!</p>
            <button type="button" class="btn btn-secondary btn-sm">Заказать услугу</button>
        </article>

        <article class="news-news">
            <a href="#">
                <h2>Стрижка</h2>
            </a>
            <div class="article-meta">
            Брадобрей <a href="#">Армен</a>
            Стоимость - 70евро
            </div>
            <img src="https://images.unsplash.com/photo-1635273051937-a0ddef9573b6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80">
            <p>Расслабьтесь и получайте удовольствие.</p>
            <button type="button" class="btn btn-secondary btn-sm">Заказать услугу</button>
        </article>

    </section>


    <footer>
    <div class="links">
        <a href="#">О нас</a>
        <a href="#">Наши достижения</a>
        <a href="#">Наши мастера</a>
        <a href="#">Контакты</a>
    </div>

    <div class="copyright">Copyright © Dream Banya 2022</div>
</body>
</html>