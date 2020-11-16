<?php
/******登入檢查******
 * 1. 連線資料庫
 * 2. 取得表單傳遞的帳密資料
 * 3. 比對會員資料表中是否有相符的資料
 * 4. 取得會員資料
 * 5. 檢查會員身份及權限
 * 6. 依據會員身份導向不同的頁面
 */

$dsn="mysql:host=localhost;dbname=member;charset=utf8";
$pdo=new PDO($dsn,'root', '');

$acc=$_POST['acc'];
$pw=$_POST['pw'];

// 執行SQL語法並取得資料
$sql="select * from `login` where `acc`='$acc' && `pw`='$pw'";
echo $sql;
$check=$pdo->query($sql)->fetch();

// 上方的$sql已經在資料庫比對過，不需要再寫程式比對，畫蛇添足
// print_r($check);
// $db_acc=$check['acc'];
// $db_acc=$check['pw'];

// if($acc=$db_acc && $pw==$db_pw){
//   echo "帳密正確";
// }else{
//   echo "帳密錯誤";
// }

// 判斷回傳值是否為空
if(!empty($check)){
  echo "登入成功";
  $sendtcookies;
  
  // 取得會員個人資料
  $member_sql="select * from member where login_id='{$check['id']}'";
  $member=$pdo->query($member_sql)->fetch();
  $role=$member['role'];
  setcookie("login",$acc,time()+3600);

  switch($role){
    case '一般會員':
    header('location:mem.php');
    break;
  
    case 'VIP':
    header('location:vip.php');
    break;

    case '管理員':
    header('location:admin.php');
    break;
  }

}else{
  
  header("location:index.php?meg=帳號密碼不正確，請重新登入或註冊新帳號");

}


?>