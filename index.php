<html>
<body>
<?php
// 1. ��ʼ��
 $ch = curl_init();
 // 2. ����ѡ�����URL
 curl_setopt($ch,CURLOPT_URL,"https://www.debian.org/index.en.html");
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 curl_setopt($ch,CURLOPT_HEADER,0);
 // 3. ִ�в���ȡHTML�ĵ�����
 $output = curl_exec($ch);
 if($output === FALSE ){
 echo "CURL Error:".curl_error($ch);
 }
 
 echo $output;
 // 4. �ͷ�curl���
 curl_close($ch);
 ?>
 </body>
 <html>