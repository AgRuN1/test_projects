<?php
include("../curl.php");
$bu=curl("https://api.vk.com/method/wall.get?count=10&domain=id1&v=5.53");
echo $bu;
?>