<?php
$url = 'http://test.loc:8080/team/my/level2/curl/test.html';

// ----- First example
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_exec($ch);
curl_close($ch);

// ----- Use response
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);
echo $content;

// ----- Display header and response
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_exec($ch);
curl_close($ch);

// ----- Save content to file
$fb = fopen('content.txt', 'w');
$fb2 = fopen('header.txt', 'w');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_WRITEHEADER, $fb2);
curl_setopt($ch, CURLOPT_FILE, $fb);
curl_exec($ch);
curl_close($ch);
fclose($fb);
fclose($fb2);


// ----- Create post request
$url = 'http://test.loc:8080/team/my/level2/curl/post.php';
$userdata = [
    'name' => 'John',
    'age' => 25
];
$postdata = http_build_query($userdata);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_exec($ch);
curl_close($ch);

// ----- get info





















