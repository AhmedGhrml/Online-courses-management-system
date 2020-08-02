<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','id13574000_root');
define('DB_PASS','Z8@%MP?Fa~H8dMdV');
define('DB_NAME','id13574000_base');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
