<html>
<body>
<?php
// 1. 初始化
 $ch = curl_init();
 // 2. 设置选项，包括URL
 curl_setopt($ch,CURLOPT_URL,"http://xjhz.me/mobile/live/anchors?name=jsonmangguopai.txt");
 //设置获取的信息以文件流的形式返回，而不是直接输出。
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 //设置头文件的信息作为数据流输出
 curl_setopt($ch,CURLOPT_HEADER,0);
 
  $headers = array(
    'User-Agent:0.0.3 (iPad; iPhone OS 9.3.2; zh_CN)',
    'Host:xjhz.me',
	'Connection:close',
	'Content-Length:0',
	'Accept-Encoding:gzip'
    );
 
 //设置header头
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 //设置post方式提交
 curl_setopt($ch, CURLOPT_POST, 1);
 //设置post数据
 //curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
 
 // 3. 执行并获取HTML文档内容
 $output = curl_exec($ch);
 if($output === FALSE ){
 echo "CURL Error:".curl_error($ch);
 }
 
 //把http地址中的'\'去除掉
$output=str_replace('\\', '', $output);
 
 //给http地址添加链接
 function text2links($str='') {
  if($str=='' or !preg_match('/(http|www\.|@)/i', $str)) { return $str; }
  $lines = explode("play_url", $str); $new_text = '';
  while (list($k,$l) = each($lines)) {
    $l = preg_replace("/(http:\/\/[^"]+)/i",
      "<a href=\"\\1\">\\1</a>", $l);
	// $l = preg_replace("/(http:\/\/[^ )\r\n!]+)/i",
	 // "<img src=\"\\1\"  alt=\"aaa\" />",$l);
    $new_text .= $l."\n";
  }
  return $new_text;
}
 
 print text2links($output);
 //echo $output;
 
 // 4. 释放curl句柄
 curl_close($ch);
 ?>
 </body>
 <html>