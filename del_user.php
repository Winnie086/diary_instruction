<?php
include "header.php";
// $title="刪除使用者";
$dsn="mysql:host=localhost;dbname=member;charset=utf8";
$pdo=new PDO($dsn,'root','')


$user_id=$_GET['id'];
$sqll="delete from `login` where `id`='$user_id'";
$sql2="delete from `member` where `login_id`='$user_id'";


echo "確定要刪除id=".$user_id."的資料嗎?";
?>

<a href="?id=<?=$user_id;?>&ask=true"><button class="btn btn-danger btn-sm">確定</button></a>
<a href="?id=<?=$user_id;?>&ask=false"><button class="btn btn-warning btn-sm">取消</button></a>


<?php

if(isset($_GET['ask'])){
    switch($_GET['ask']){
        case 'true':
        $pdo->exec($sqll);
        $pdo->exec($sql2);
        header("location:admin.php");
        break;
      
        case 'false':
        header("location:admin.php");
        break;
    }
  }
  

include_once("footer.php");

?>