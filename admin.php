<html>
<head>
    <title>管理中心</title>
</head>

<?php
include_once('header.php');
?>

<body>
<h1 class="text-center">管理中心</h1>

<?php
    if(isset($_COOKIE['login'])){
        echo "<div class='container-fluid'>".$_COOKIE['login']."管理員誠摯歡迎您</div>";
    }

    $dsn="mysql:host=localhost;dbname=member;charset=utf8";
    $pdo=new PDO($dsn,'root','');
    
    $sql="select `login`.`id`,`acc`,`name`,`role`,`birthday`,`email`,`addr`,`creat_time` from `login`,`member` where `login`.`id`=`member`.`login_id`";
    $users=$pdo->query($sql)->fetchALL();

    echo "<table class='table container text-center'>";
    echo "<tr>";
    echo "<td>流水號</td>";
    echo "<td>帳號</td>";
    echo "<td>姓名</td>";
    echo "<td>角色</td>";
    echo "<td>生日</td>";
    echo "<td>信箱</td>";
    echo "<td>地址</td>";
    echo "<td>註冊日</td>";
    echo "<td>操作</td>";
    echo "</tr>";

    foreach($users as $user){
        echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['acc']}</td>";
            echo "<td>{$user['name']}</td>";
            echo "<td>{$user['role']}</td>";
            echo "<td>{$user['birthday']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>{$user['addr']}</td>";
            echo "<td>{$user['creat_time']}</td>";
            
            echo "
            <td>
            <a href='edit_user.php?id={$user['id']}'><button class='btn btn-sm btn-sucess'>編輯</button></a>
            <a href='del_user.php?id={$user['id']}'><button class='btn btn-sm btn-danger'>刪除</button></a>
            </td>";

            echo "</tr>";
    }

    echo "</table>"
    
?>
</body>

<?php
include_once("footer.php");
?>
</html>