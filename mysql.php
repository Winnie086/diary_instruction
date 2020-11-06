<?php
$dsn="mysql:host=localhost;dbname=students_step3;charset=utf8";
$pdo=new PDO($dsn, 'root','');

$sql="select * from conduct";










$rows=$pdo->query($sql)
$row=$rows->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($rows);
echo "</pre>";
$row=$rows->fetch(PDO::FETCH_NUM);
echo "<br>";
echo $rows['id'];
echo "<br>";
echo $rows[0];

$rows=$pdo->query($sql)->fetchAll();
echo "<pre>";
print_r($rows);
echo "</pre>";

?>