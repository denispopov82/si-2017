<?php
//$ch = curl_init();
//$url = "http://test.loc:8080/";
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_HEADER, 0); // читать заголовок
//curl_setopt($ch, CURLOPT_NOBODY, 1); // читать ТОЛЬКО заголовок без тела
//$result = curl_exec($ch);
//curl_close($ch);
//echo $result;


function get_web_page($url)
{
    $uagent = "Opera/9.80 (Windows NT 6.1; WOW64) Presto/2.12.388 Version/12.14";
    
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   // возвращает веб-страницу
    curl_setopt($ch, CURLOPT_HEADER, 0);           // не возвращает заголовки
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   // переходит по редиректам
    curl_setopt($ch, CURLOPT_ENCODING, "");        // обрабатывает все кодировки
    curl_setopt($ch, CURLOPT_USERAGENT, $uagent);  // useragent
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120); // таймаут соединения
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);        // таймаут ответа
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);       // останавливаться после 10-ого редиректа
    
    $content = curl_exec($ch);
    $err = curl_errno($ch);
    $errmsg = curl_error($ch);
    $header = curl_getinfo($ch);
    curl_close($ch);
    
    $header['errno'] = $err;
    $header['errmsg'] = $errmsg;
    $header['content'] = $content;
    
    return $header;
}

for ($i = 1; $i <= 10; $i++) {
    $result = get_web_page("http://www.liveinternet.ru/stat/shakin.ru/queries.html?page=" . $i);
    if (($result['errno'] != 0) || ($result['http_code'] != 200)) {
        exit($result['errmsg']); //если нет такой страницы, то выходим
    }
    $page = $result['content']; //забираем контент
    //обрезаем текст ДО:
    $pos = strpos($page, "<tr align=right bgcolor=\"#dddddd\" >");
    $page = substr($page, $pos);
    //Обрезаем ПОСЛЕ
    $pos = strpos($page, "<tr><td bgcolor=#f0f0f0 colspan=10>");
    $page = substr($page, 0, $pos);
    //Вырезаем всё что нам не нужно функцией поиск-замена
    $page = preg_replace('/<input type=checkbox.*?[>^]/i', '', $page);
    $page = preg_replace('/<label.*?[>^]/i', '', $page);
    $page = str_replace('</label>', '', $page);
    //Выводим то, что осталось
    echo htmlspecialchars($page);
}
