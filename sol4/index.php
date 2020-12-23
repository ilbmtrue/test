<?php

/**
 * параметры подключения к БД следует вынести в отдельный конфиг файл
 * для гибкости использовать PDO 
 * подготовленные выражения в PDO обеспечивают зашиту от SQL инъекций
 * нет проверки на валидность входящей строки
 * подключение к БД происходит в цикле
 * 
 */


// db_config
$host = "localhost";
$db = "database";
$db_user = "root";
$db_pass = "123123";


/**
 * @param string $str
 * @return array
 */
function getValid($str) : ?array
{

    $params = explode(',', $str);
    if($params > 0){
        return array_unique(array_diff($params, array('')));
    }

    return false;
}

/**
 * @param string $user_ids
 * @return array
 */
function load_users_data($user_ids, $pdo) : ?array
{
    $data = [];
    if(!$ids = getValid($user_ids)){
        return $data;
    }
    
    $in = implode(",", $ids);
    $query = $pdo->prepare("SELECT * FROM users WHERE id IN ($in)");
    $query->execute();

    while ($user = $query->fetchObject()) {
        $data[$user->id] = $user->name;
    }

    return $data;
}



$dsn = "mysql:dbname=$db;host=$host";

try {
    $dbh = new PDO($dsn, $db_user, $db_pass);
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $data = load_users_data($_GET['user_ids'], $dbh);

    foreach ($data as $user_id => $name) {
        echo "<a href=\"/show_user.php?id=$user_id\">$name</a>";
    }

} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage();
}
