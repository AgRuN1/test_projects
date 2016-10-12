<?php
$con=mysqli_connect("localhost","root","hereza");
mysqli_select_db($con,"my");
$result=mysqli_query($con,"select * from share");
$row=mysqli_fetch_array($result);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
#share{
position:absolute;
top:50%;left:50%;
transform:translate(-50%,-50%);
}
  </style>
  <script>
  Share = {
  	vkontakte: function(purl, ptitle, pimg, text) {
  		url  = 'http://vk.com/share.php?';
  		url += 'url='          + encodeURIComponent(purl);
  		url += '&title='       + encodeURIComponent(ptitle);
  		url += '&description=' + encodeURIComponent(text);
  		url += '&image='       + encodeURIComponent(pimg);
  		url += '&noparse=true';
      Share.log("vk");
  		Share.popup(url);
  	},
  	odnoklassniki: function(purl, text) {
  		url  = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
  		url += '&st.comments=' + encodeURIComponent(text);
  		url += '&st._surl='    + encodeURIComponent(purl);
      Share.log("odnoklassniki");
  		Share.popup(url);
  	},
  	facebook: function(purl, ptitle, pimg, text) {
  		url  = 'http://www.facebook.com/sharer.php?s=100';
  		url += '&ptitle='     + encodeURIComponent(ptitle);
  		url += '&p[summary]='   + encodeURIComponent(text);
  		url += '&p[url]='       + encodeURIComponent(purl);
  		url += '&p[images][0]=' + encodeURIComponent(pimg);
      Share.log("facebook");
  		Share.popup(url);
  	},
  	twitter: function(purl, ptitle) {
  		url  = 'http://twitter.com/share?';
  		url += 'text='      + encodeURIComponent(ptitle);
  		url += '&url='      + encodeURIComponent(purl);
  		url += '&counturl=' + encodeURIComponent(purl);
      Share.log("twitter");
  		Share.popup(url);
  	},
  	mailru: function(purl, ptitle, pimg, text) {
  		url  = 'http://connect.mail.ru/share?';
  		url += 'url='          + encodeURIComponent(purl);
  		url += '&title='       + encodeURIComponent(ptitle);
  		url += '&description=' + encodeURIComponent(text);
  		url += '&imageurl='    + encodeURIComponent(pimg);
      Share.log("mailru");
  		Share.popup(url)
  	},

  	popup: function(url) {
  		window.open(url,'','toolbar=0,status=0,width=626,height=436');
  	},
    log: function(net){
      var request=new XMLHttpRequest();
      request.open("post","logShare.php?net="+net);
      request.send(null);
      var num=document.getElementById(net);
      var count=num.firstChild.nodeValue;
      console.log(count);
      count++;
      num.replaceChild(document.createTextNode(count),num.firstChild);
    }
  };
  </script>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <link href="tipTip.css" rel="stylesheet" type="text/css">
  <link href="footer.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery.tipTip.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Share</title>
</head>
<body>
  <div id="share">
<div>
<a class="share"title="Поделиться в Вконтакте"href="javascript:Share.vkontakte('https://yandex.ru','Лучшая поисковая система','http://japonskie.ru/puzzle/source/zolotaya_osen_1.jpg','Наш сайт')"><img width="35" height="35"src="vk_share.jpg" alt=""></a>
<a class="share"title="Поделиться в Фейсбук"href="javascript:Share.facebook('https://yandex.ru','Лучшая поисковая система','http://japonskie.ru/puzzle/source/zolotaya_osen_1.jpg','Наш сайт')"><img width="35" height="35"src="fb_share.jpg" alt=""></a>
<a class="share"title="Сделать твит"href="javascript:Share.twitter('https://yandex.ru','Лучшая поисковая система','http://japonskie.ru/puzzle/source/zolotaya_osen_1.jpg','Наш сайт')"><img width="35" height="35"src="tw_share.png" alt=""></a>
<a class="share"title="Поделиться в Одноклассники"href="javascript:Share.odnoklassniki('https://yandex.ru','Лучшая поисковая система','http://japonskie.ru/puzzle/source/zolotaya_osen_1.jpg','Наш сайт')"><img width="35" height="35"src="ok_share.jpg" alt=""></a>
<a class="share"title="Поделиться в Мой мир"href="javascript:Share.mailru('https://yandex.ru','Лучшая поисковая система','http://japonskie.ru/puzzle/source/zolotaya_osen_1.jpg','Наш сайт')"><img width="35" height="35"src="mw_share.jpg" alt=""></a>
</div>
<div id="num">
  <span id="vk"style="padding-left:15px;font-size:12px;color:#507299;"><?=$row['vk']?></span>
  <span id="facebook"style="padding-left:25px;font-size:12px;color:#3B5998;"><?=$row['facebook']?></span>
  <span id="twitter"style="padding-left:23px;font-size:12px;color:#1B95E0"><?=$row['twitter']?></span>
  <span id="odniklassniki"style="padding-left:23px;font-size:12px;color:#F2720C"><?=$row['odnoklassniki']?></span>
  <span id="mailru"style="padding-left:23px;font-size:12px;color:#168DE2"><?=$row['mailru']?></span>
</div>
</div>
<script>
 $(".share").tipTip();
</script>
</body>
</html>
