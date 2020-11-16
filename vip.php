<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIP</title>
</head>
<body>
<h1>VIP</h1>
<?php
 if(isset($_COOKIE['login'])){
    echo "尊爵的".$_COOKIE['login']."歡迎您";
}
?>
</body>
</html>