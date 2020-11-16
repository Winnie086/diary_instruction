<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一般會員中心</title>
</head>
<body>
<h1>一般會員中心</h1> 
<?php
    if(isset($_COOKIE['login'])){
    echo "親愛的".$_COOKIE['login']."歡迎您";
    }
?>

</body>
</html>