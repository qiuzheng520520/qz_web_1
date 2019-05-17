<!DOCTYPE html>
<html>
<body>

<?php
echo "我的第一段 PHP 脚本！";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "www.qq.com");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$html = curl_exec($ch);
curl_close($ch);
var_dump($html);

?>

</body>
</html>