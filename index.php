<?php
    session_start();
    $auth = $_SESSION['auth'] ?? null;
    include('functions.php');
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>SPA Main page</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<header>
    <div class="headerDiv">
        <span>
            <img src="assets/user-logo.png">
            <?php 
                if(!$auth){echo '<a href="login.php">войти на сайт</a>';}
                else {
                    echo $_SESSION['currentUser'];
                    echo '<a href="logout.php"><img src="assets/exit-logo-white_bckgr.png"></a>';
                };
            ?>
        </span>
    </div>
</header>
    <div class="personalInfo">
    <?php
            $secsTillBirthDay = $_SESSION['dob'] - time();   

            if($auth && $secsTillBirthDay > 0 && $secsTillBirthDay < 2*24*60*60){
                echo '</br>До вашего дня рождения <strong>['.date("d.m.Y", $_SESSION['dob']).']</strong>: '.seconds2human($secsTillBirthDay, 1);
            }elseif($auth && date("md", time()) === date("md", $_SESSION['dob']) ){
                $deadline = $_SESSION['firstTime']+3600*24;
                
                $secs = $deadline - time();
                $h = (int)($secs/3600)%24;
                $m = (int)($secs/60) % 60;
                $s = $secs % 60;

                echo '<h3>Персональная скидка на все услуги 5%</h3>';
                echo '<p>До истечения персональной скидки осталось: <strong>'.$h.'</strong> часов, <strong>'.$m.'</strong> минут, <strong>'.$s.'</strong> секунд.</p>';
            }
        ?>
    </div>
    <div>
        <article>
            <h3>1. Детский массаж</h2>
            <img src="assets/article1_.png">
            <p>Нежное восстановление — профилактический массаж для детей от 4 до 12 лет. 
            Он укрепляет нервную и иммунную систему. Преднaзначен для общего развития опорно-двигательного аппарата. 
            Предотвращает заболевания позвоночника и улучшает физическую активность ребенка.</p>
            <span> 15 мин. - 15,00 $</span>
        </article>
        </div>         
        <div>
            <article>
                <h3>2.Полный классический массаж всего тела</h2>
                <img src="assets/article2.jpg">
                <p>Классический массаж-это один из самых древних и любимых видов массажа. 
                    Этот массаж действует главным образом на тело-мышцы, суставы, сухожилия и другие ткани.
                    Этот массаж подходит для людей, которым нравится сильный, глубоко разминающий и растирающий массаж, 
                    а также людям, которые занимаются спортом.</p>
                <span> 60 мин. - 33,00 $</span>
            </article>
        </div>
        <div>
            <article>
                <h3>3.Общий релаксирующий массаж всего тела</h2>
                <img src="assets/article3_.png">
                <p>Релаксирующий массаж  нужен для расслабления внутренних мышц и поднятия общего тонуса всего организма.  Массаж — релакс хорошо подходит для тех, кто загружен физической и умственной работой и незаменим при длительном мышечном и нервном перенапряжении, переутомлении, бессоннице, синдроме хронической усталости и астенических состояниях. </p>
                <span> 60 мин. — 32,00 $</span>
            </article>
        </div>

    </body>
</html>