<?php
session_start();
$numberOfPlayers = 0;
$_SERVER['players'] = array();

require_once 'log.php';
require_once 'classes/Game.class.php';

// вообще это все до разметки можно засунуть в класс игры
// а она сама будет рулить сессиями
// сделал так, потому что класса игры нет

function get_stored_accounts() {
    $file = "./private/passwd";
    if (file_exists($file)) {
        $file_content = file_get_contents($file);
        $accounts = unserialize($file_content);
    } else {
        $accounts = false;
    }
    return $accounts;
}

function save_accounts($accounts) {
    $file = "./private/passwd";
    if (!file_exists('./private'))
        mkdir('./private');
    file_put_contents($file, serialize($accounts));
}

function login($account, $accounts) {
    if (!$accounts) {
        $accounts[] = $account;
        return $accounts;
    }
    foreach($accounts as $s) {
        if ($s['login'] === $account['login']) {
            LOG_MESSAGE("we have this account", $account);
            return $accounts;
        }
    }
    $accounts[] = $account;
    LOG_MESSAGE("accounts after login",$accounts);
    return $accounts;
}

function logout($account) {
    $accounts = get_stored_accounts();
    if (!$accounts) {
        return true;
    }
    LOG_MESSAGE("accounts before logout", $accounts);
    array_values($accounts);
    foreach($accounts as $i => $s) {
        LOG_MESSAGE("check acc", $s);
        if ($s['login'] === $account) {
            unset($accounts[$i]);
            array_values($accounts);
            LOG_MESSAGE("logged out account", $account);
            LOG_MESSAGE("accounts after logout", $accounts);
            save_accounts($accounts);
            return true;
        }
    }
    return true;
}

function get_logged_users($user) {

    $account = array('login' => $user);
    $accounts = get_stored_accounts();
    LOG_MESSAGE("accounts", $accounts);
    $numberOfPlayers = $accounts ? count($accounts) : 0;
    if (!($updated_accounts = login($account, $accounts))) {
        $_SESSION['message'] = "welcome back, {$user}";
    } else {
        $accounts = $updated_accounts;
        LOG_MESSAGE("accounts", $accounts);
        save_accounts($accounts);
        $_SESSION['message'] = "added new account";
    }
    return $accounts;
}


// чтобы убрать информацию лишнюю сессии из других проектов
// foreach ($_SESSION as $k) {
//     unset($_SESSION[$k]);
// }

$state = 'menu';
unset($_SESSION['message']);

if ($_GET && isset($_GET['login'])) {
    // логин, запрос на присоединение к игре
    if ($_GET['user']) {
        LOG_MESSAGE('get', $_GET);
        $_SESSION['user'] = $_GET['user'];
    } else {
        $_SESSION['message'] = 'no user to login, username required';
    }
} else if ($_GET && isset($_GET['logout'])) {
    // выход из игры. кнопку надо сделать не только в меню, но и на странице игры
    if ($_GET['user'] && isset($_SESSION['user'])) {
        LOG_MESSAGE('get', $_GET);
        unset($_SESSION['user']);
        logout($_GET['user']);
    } else {
        $_SESSION['message'] = 'no user to logout';
    }
}

// 
if ($state='game' && $_SESSION && isset($_SESSION['user'])) {

    $accounts = get_logged_users($_SESSION['user']);

    // если присоединились 2 игрока - создаем новую сессию игры и подключаем туда игроков
    if (count($accounts) % 2 == 0) {
        $state = 'game';
        //start game here
        // $_SESSION['games'][] = new Game($_SERVER['players'][$numberOfPlayers - 2], $_SERVER['players'][$numberOfPlayers - 1]);
    } else {
        $state = 'menu';
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

?>
