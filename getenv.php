<?
$db = getenv('DB', true) ?: getenv('DB');
$user =  getenv('USER', true) ?: getenv('USER');
$password=   getenv('PASSWORD', true) ?: getenv('PASSWORD');
$connect = new PDO("mysql:host=localhost;dbname=$db;", $user, $password, array(
PDO::MYSQL_ATTR_LOCAL_INFILE => true,
));
?>