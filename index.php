<?php
session_start();
$numberOfPlayers = 0;
$_SERVER['players'] = array();

require_once 'log.php';
require_once 'classes/Game.class.php';


// чтобы убрать сессию из других проектов
// foreach ($_SESSION as $k) {
//     unset($_SESSION[$k]);
// }


if ($_GET && $_GET['newGame']) {
    if ($_GET['user']) {
        LOG_MESSAGE('get', $_GET);
        $_SESSION['user'] = $_GET['user'];
    } else {
        $_SESSION['user'] = 'guest';
    }
    $state = 'game';
} else {
    $state = 'menu';
}
if ($state='game' && $_SESSION && $_SESSION['user']) {
    $numberOfPlayers++;
    $_SERVER['players'][] = $_SESSION['user'];
    if ($numberOfPlayers % 2 == 0) {
        //start game here
        $_SESSION['games'][] = new Game($_SERVER['players'][$numberOfPlayers - 2], $_SERVER['players'][$numberOfPlayers - 1]);
    }
}
LOG_MESSAGE('session', $_SESSION);
LOG_MESSAGE('players', $_SERVER['players']);
print_r($state);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/style.css" rel="stylesheet">
    <title>Awesome Battleship Battle</title>
</head>
<body>
    <?php
    switch ($state) {
        case 'menu':
            include 'views/mainMenu.php';
            break;
        case 'game':
            include 'views/game.php';
            break;
        default:
            include 'views/mainMenu.php';
    }
    ?>
    <footer>
        <span>Handcrafted by school21 team</span>
    </footer>
</body>
</html>