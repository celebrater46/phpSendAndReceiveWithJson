<?php

ini_set('display_errors', "On");

//$url = 'http://localhost/receive.php';
$url = 'http://localhost/myapps/phpSendAndReceiveWithJson/receive.php';
//$url = 'http://localhost:44395/api/members';

$data = array(
    'Name' => 'Sally',
    'Age' => '34',
    'HireDate' => '2018-06-28T00:00:00',
);

$json = json_encode($data); // JSONに変換

$context = array(
    'http' => array(
        'method'  => 'POST',
        'header'  => implode("\r\n", array('Content-Type: application/json',)),
        'content' => $json,
    )
);

$html = file_get_contents($url, false, stream_context_create($context));
//file_get_contents($url, false, stream_context_create($context));

//var_dump($http_response_header);
echo $html;
