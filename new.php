<?php
$first = '' . htmlentities($_GET['first']) . '';
$last = '' . htmlentities($_GET['last']) . '';
$ch = curl_init();

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.findpeoplesearch.com/search_ajax.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "formData=%26full_name%3D".$first."+".$last."%26age%3Dnull%26state%3Dnull%26email%3Dnull%26address%3Dnull%26city%3Dnull%26zip%3Dnull%26akas%3Dnull%26phone%3Dnull%26month%3Dnull%26day%3Dnull%26year%3Dnull%26ssn1%3Dnull%26ssn2%3Dnull%26ssn3%3Dnull%26page%3D1%26tahoe%3Dnull%26url_timestamp%3D15149126854636");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = "Cookie: X-Mapping-fjhppofk=D96113346E76553BC683D44C0C254530; PHPSESSID=m5idgp6p1n6efopn150n4v8607; __utmc=37810740; __utmz=37810740.1514907174.2.2.utmcsr=google^|utmccn=(organic)^|utmcmd=organic^|utmctr=(not^%^20provided); __stripe_mid=b63eb46b-b780-4c81-9b93-9d7ca5c44b20; trc_cookie_storage=taboola^%^2520global^%^253Auser-id^%^3D19b7dccc-c270-4263-bece-956ba872da64-tucta30a0b; __utma=37810740.1481394561.1514907118.1514907174.1514910732.3; __stripe_sid=9a530092-0fea-44b1-b4d4-36fbd6221d1f; __utmt=1; __utmb=37810740.27.10.1514910732";
$headers[] = "Origin: https://www.findpeoplesearch.com";
$headers[] = "Accept-Encoding: gzip, deflate, br";
$headers[] = "Accept-Language: en-US,en;q=0.9";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.84 Safari/537.36";
$headers[] = "Content-Type: application/x-www-form-urlencoded; charset=UTF-8";
$headers[] = "Accept: */*";
$headers[] = "Referer: https://www.findpeoplesearch.com/Justin+Dewolf/null/null/null/null/null/null/null/null/null/null/null/null/null/null/1/null/15149126854636";
$headers[] = "X-Requested-With: XMLHttpRequest";
$headers[] = "Connection: keep-alive";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
echo $result;
?>