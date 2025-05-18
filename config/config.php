<?php
try{
// host
$host = 'mysql:host=localhost;dbname=cleanblog';
// dbnaname
$password = '';
// $user
$user = 'root';
$conn = new PDO($host,$user,$password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo 'working';

} catch(PDOException $e){
echo $e->getMessage();

echo 'connection failed';
}



