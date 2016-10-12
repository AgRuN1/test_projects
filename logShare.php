<?php
if(isset($_GET['net'])){
$net=$_GET['net'];
$con=mysqli_connect("localhost","root","hereza") or die("error connect");
mysqli_select_db($con,"my");
$result=mysqli_query($con,"select $net from share");
$row=mysqli_fetch_array($result);
$count=$row[$net];
mysqli_query($con,"update share set $net=".++$count." where $net=".--$count) or die("query error");
mysqli_close($con);
echo $count;
}
 ?>
