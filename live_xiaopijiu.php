<html>
<body>
<?php
// 1. ��ʼ��
 $ch = curl_init();
 // 2. ����ѡ�����URL
 curl_setopt($ch,CURLOPT_URL,"http://xjhz.me/mobile/live/anchors?name=jsonmangguopai.txt");
 //���û�ȡ����Ϣ���ļ�������ʽ���أ�������ֱ�������
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 //����ͷ�ļ�����Ϣ��Ϊ���������
 curl_setopt($ch,CURLOPT_HEADER,0);
 
  $headers = array(
    'User-Agent:0.0.3 (iPad; iPhone OS 9.3.2; zh_CN)',
    'Host:xjhz.me',
	'Connection:close',
	'Content-Length:0',
	'Accept-Encoding:gzip'
    );
 
 //����headerͷ
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 //����post��ʽ�ύ
 curl_setopt($ch, CURLOPT_POST, 1);
 //����post����
 //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
 
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