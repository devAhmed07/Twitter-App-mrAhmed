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

function getHashtags($string) {
    $hashtags= FALSE;
    preg_match_all("/(#\w+)/u", $string, $matches);
    if ($matches) {
        $hashtagsArray = array_count_values($matches[0]);
        $hashtags = array_keys($hashtagsArray);
    }
    return $hashtags;
}

?>

