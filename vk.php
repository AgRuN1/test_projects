<?
$mail = "89157333342"; //e-mail или логин от контакта
$pass = "Horeck1"; //пароль от контакта
 
$otvet=connect("http://login.vk.com/?act=login&email=$mail&pass=$pass");
If(!preg_match("/hash=([a-z0-9]{1,32})/",$otvet,$hash)){
die("Login incorrect");
}
$otvet=connect("http://vk.com/login.php?act=slogin&hash=".$hash[1]);
preg_match("/remixsid=(.*?);/",$otvet,$sid);
$cookie = "remixchk=5; remixsid=$sid[1]";
 
 
function connect($link,$cookie=null,$post=null){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$link);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 0);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
if($cookie !== null)
curl_setopt($ch, CURLOPT_COOKIE, $cookie);
if($post !== null)
{
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
}
$otvet = curl_exec($ch);
curl_close($ch);
return $otvet;
}?>