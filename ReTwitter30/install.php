<!DOCTYPE html>
<html>
<head>
<title>تنصيب سكربت جدولة التغريدات - الوسيط هوست</title>
<meta name="generator" content="Bluefish 2.2.4" >
<meta name="author" content="ahmed" >
<meta name="date" content="2013-08-02T14:25:57+0300" >
<meta name="copyright" content="">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="expires" content="0">
<style type="text/css">
body {
	background: #B1D4E5;

}
h1{
	color: #4D4D4D;
	font-size: 40px;
	margin-top: 50px;
	padding-top: 20px;
	margin-left: 300px;
   padding-left: 150px;
	width: 450px;
	height: 120px;
   border: 5px solid white;
   -webkit-border-radius: 60px;
-webkit-border-top-left-radius: 20px;
-moz-border-radius: 60px;
-moz-border-radius-topleft: 20px;
border-radius: 60px;
border-top-left-radius: 20px;
}
</style>
</head>
<body>


<h1>
<?php
#################################################
// ahmed almalki
// 0543347557
// protop96@gmail.com
// http://waseethost.com/
#################################################
#####################################################################
//S بيانات الادمن

$admin = "admin" ; // الاسم
$Password = "123456" ;  // الرقم السري
$adminmail = "protop96@gmail.com"; // بريد الادمن
#####################################################################
require_once('config/dbconfig.php');


if (!mysql_ping($connection)) {
    echo ' dbconfig.php ما في شبكة! أقصد تأكد من معلومات قاعدة البيانات المجودة في الملف ';
    echo 'يمكن طلب المساعدة  بفتح تذكرة في الوسيط هوست إدا عجزت عن  التنصيب<br />';
    echo '<br /><a href="http://waseethost.com/" >الوسيط هوست</a>';
    exit;
}else {




$result = mysql_query("SELECT * FROM AdminCp");
if(!$result){
$sql1 = "
CREATE TABLE IF NOT EXISTS `AdminCp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Mail` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2" ;
$sql2 = "INSERT INTO `AdminCp` (`id`, `Username`, `Password`, `Mail`) VALUES
(1, '".$admin."', '".$Password."', '".$adminmail."')" ;
$sql3 = "
CREATE TABLE IF NOT EXISTS `all` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `website` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Tags` varchar(200) NOT NULL,
  `Twitter` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
" ;
$sql4 = "INSERT INTO `all` (`id`, `website`, `Description`, `Tags`, `Twitter`) VALUES
(1, 'الرد التلقائي', ',وصف الموقع', 'الكلمات الدليلة', 'مأ ذا سوف تغرد');
" ;
$sql5 = "
CREATE TABLE IF NOT EXISTS `cronR` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(300) NOT NULL,
  `accessToken` varchar(300) NOT NULL,
  `accessTokenSecret` varchar(300) NOT NULL,
  `reply_id` bigint(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$sql6 = "
CREATE TABLE IF NOT EXISTS `cronS` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_all` int(11) NOT NULL,
  `user_her` int(11) NOT NULL,
  `user_end` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
" ;
$sql7 = "
CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reply` text NOT NULL,
  `accessToken` varchar(300) NOT NULL,
  `accessTokenSecret` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

" ;
$sql8 = "CREATE TABLE IF NOT EXISTS `reply_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(300) NOT NULL,
  `reply_id` bigint(90) NOT NULL,
  `accessToken` varchar(300) NOT NULL,
  `accessTokenSecret` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


" ;
$sql9 = "
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) DEFAULT NULL,
  `oauth_uid` varchar(300) DEFAULT NULL,
  `oauth_provider` varchar(300) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `twitter_oauth_token` varchar(300) DEFAULT NULL,
  `twitter_oauth_token_secret` varchar(300) DEFAULT NULL,
  `accessToken` varchar(300) DEFAULT NULL,
  `accessTokenSecret` varchar(300) DEFAULT NULL,
  `screen_name` varchar(300) DEFAULT NULL,
  `Muslim` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
" ;
//$sql10 = "" ;

$sql1 = mysql_query($sql1);
$sql2 = mysql_query($sql2);
$sql3 = mysql_query($sql3);
$sql4 = mysql_query($sql4);
$sql5 = mysql_query($sql5);
$sql6 = mysql_query($sql6);
$sql7 = mysql_query($sql7);
$sql8 = mysql_query($sql8);
$sql9 = mysql_query($sql9);
//$sql10 = mysql_query($sql10);

if($sql1 && $sql2 && $sql3 && $sql4 && $sql5 && $sql6 && $sql7 && $sql8 && $sql9){
echo "تم التنصيب بنجاح";
echo "<br /> Ok install";

}else {
echo "فشل التنصيب";
echo "<br /> No install !";

}

}else{

echo "تم التركيب سابقاً";
echo "<br /> yes install advance !";

}
}
?>
</h1>
<h1><a href="http://waseethost.com/" >الوسيط هوست</a></h1>
</body>
</html>