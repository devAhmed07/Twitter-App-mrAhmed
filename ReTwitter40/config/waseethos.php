<?php
#################################################
// ahmed almalki
// 0543347557
// protop96@gmail.com
// http://waseethost.com/
#################################################

function waseethos ($safe) {
$safe = strip_tags($safe);// ��� ����� html
$safe = trim($safe); // ��� ��������
$safe = mysql_real_escape_string($safe); // ����� ��� ���� ��� ���� ������ �������� ��� /'
return $safe;
}


?>

