<?php

require_once("config/dbconfig.php");
require_once("config/twconfig.php");
require_once('config/twitter.class.php');
////
$consumerKey = YOUR_CONSUMER_KEY;
$consumerSecret = YOUR_CONSUMER_SECRET;
$date = time();
$tws = 20 ; // ��� �������� �� �� ���
////


///
$tweetsT = mysql_fetch_assoc(mysql_query("SELECT * FROM `tweetsT` WHERE `timestamp` <='".$date."' LIMIT 1"));
$cron = mysql_fetch_assoc(mysql_query("SELECT * FROM `cron` LIMIT 1"));
$users = mysql_query("SELECT * FROM users WHERE `Muslim` != 'n'");
$count = mysql_num_rows($users);
///





if($cron['cron']){ // ��� ���� ����

			$st = $cron['users'] ;
			$en = ($cron['users']+$tws);
			$txtwi = $cron['tweet'];

if($cron['cron'] <= $cron['users'] ){ // ������ �� ��� ������ �������


$rm_cron= mysql_query("DELETE FROM `cron`");

}else{ // �� ���� ������ �� �����
$users1 = mysql_query('SELECT * FROM users LIMIT '.$st.' ,'.$en.'');
						 while($rows = mysql_fetch_assoc($users1)) { // ���� �������

						$accessToken = $rows['accessToken'];
						$accessTokenSecret =$rows['accessTokenSecret'];
			 	  	   $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
					   $oksend = $twitter->send($txtwi);

if($oksend == 0) { // ��� ���� ����� �������
				 	  $twitter = new Twitter($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
					  $oksend = $twitter->send($txtwi);
                 mysql_query("UPDATE `cron` SET `users` = `users`+1");
                 }else { // ���� �������
                 mysql_query("UPDATE `cron` SET `users` = `users`+1");

                 }
}// ����� ������




}

}else{ // ��� ��� ���� �����

if($tweetsT['timestamp']){ // ������ �� ���� ������� ����� �����

	$add_cron = mysql_query("INSERT INTO `cron` (`id`, `cron`, `tweet`, `users`) VALUES (NULL, '".$count."', '".$tweetsT['tweet']."', '0')");
   $rm_tweets = mysql_query("DELETE FROM `tweetsT` WHERE id= '".$tweetsT['id']."'");
}else{



}


}






?>