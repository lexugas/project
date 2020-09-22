<?php
define("BACKUP_PATH", "C:\xampp\mysql\backup");

$server_name   = "localhost";
$username      = "root";
$password      = "";
$database_name = "testing";
$date_string   = date("Ymd");

$cmd = "mysqldump --routines -h {$server_name} -u {$username} -p{$password} {$database_name} > C:\Users\Walad Muctar\Downloads {$date_string}_{$database_name}.sql";

exec($cmd);
echo "Backup complete!";

?>