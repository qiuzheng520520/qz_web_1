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
 
 //��http��ַ�е�'\'ȥ����
$output=str_replace('\\', '', $output);
 
 //��http��ַ�������
 function text2links($str='') {
  if($str=='' or !preg_match('/(http|www\.|@)/i', $str)) { return $str; }
  $lines = explode("}", $str); $new_text = '';
  while (list($k,$l) = each($lines)) {
    // replace links:
    $l = preg_replace("/([ \t]|^)www\./i", "\\1http://www.", $l);
    $l = preg_replace("/([ \t]|^)ftp\./i", "\\1ftp://ftp.", $l);
    $l = preg_replace("/(http:\/\/[^ )\r\n!]+)/i",
      "<a href=\"\\1\">\\1</a>", $l);
    $l = preg_replace("/(https:\/\/[^ )\r\n!]+)/i",
      "<a href=\"\\1\">\\1</a>", $l);
    $l = preg_replace("/(ftp:\/\/[^ )\r\n!]+)/i",
      "<a href=\"\\1\">\\1</a>", $l);
    $l = preg_replace(
      "/([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))/i",
      "<a href=\"mailto:\\1\">\\1</a>", $l);
    $new_text .= $l."\n";
  }
  return $new_text;
}
 
 print text2links($output);
 //echo $output;
 
 // 4. �ͷ�curl���
 curl_close($ch);
 ?>
 </body>
 <html>