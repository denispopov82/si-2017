<?php
// ----- First example
$url = 'http://test.loc:8080/team/my/level2/curl/test.html';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
//$result = curl_exec($ch);
curl_close($ch);

// ----- Use response
$url = 'http://test.loc:8080/team/my/level2/curl/test.html';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);
//echo $result;

// ----- Display header and response
$url = 'http://test.loc:8080/team/my/level2/curl/test.html';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);
//echo '<pre>';
//echo $result;
//echo '</pre>';

// ----- Display header only
$url = 'http://test.loc:8080/team/my/level2/curl/test.html';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);
//echo '<pre>';
//echo $result;
//echo '</pre>';

// ----- Save header to file
$fp = fopen('headers.txt', 'w');
$url = 'http://test.loc:8080/team/my/level2/curl/test.html';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_NOBODY, 1);
curl_setopt($ch, CURLOPT_FILE, $fp);
//curl_exec($ch);
curl_close($ch);

// ----- Save body to file
$fp = fopen('content.txt', 'w');
$url = 'http://test.loc:8080/team/my/level2/curl/test.html';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FILE, $fp);
//curl_exec($ch);
curl_close($ch);

// ----- Save header and body to files
$fpheader = fopen('headers.txt', 'w');
$fpcontent = fopen('content.txt', 'w');
$url = 'http://test.loc:8080/team/my/level2/curl/test.html';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FILE, $fpcontent);
curl_setopt($ch, CURLOPT_WRITEHEADER, $fpheader);
//curl_exec($ch);
curl_close($ch);

// ----- Create post request
$userdata = [
    'username' => 'John',
    'email' => 'john@gmail.com',
    'phone' => 12345,
    'age' => 27
];
$url = 'http://test.loc:8080/team/my/level2/curl/post.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($userdata));
//curl_exec($ch);
curl_close($ch);

$url = 'http://test.loc:8080/team/my/level2/curl/post.php';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_getinfo($ch);
curl_close($ch);
echo "<pre>";
    var_dump($result);
echo "</pre>";
