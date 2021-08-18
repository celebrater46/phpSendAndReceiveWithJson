<?php

// https://qiita.com/tokutoku393/items/3c3ba3ca581bc0381e35 PHPでHTTPリクエスト（cURL&PUTでパラメータを渡す際の注意）

ini_set('display_errors', "On");

$url = 'http://localhost/myapps/phpSendAndReceiveWithJson/receive.php';
//$url = 'receive.php';
//$url = 'myapps/phpSendAndReceiveWithJson/receive.php';

$data = array(
    'Name' => 'Sally',
    'Age' => '34',
    'HireDate' => '2018-06-28T00:00:00',
);

$json = json_encode($data); // JSONに変換

//$context = array(
//    'http' => array(
//        'method'  => 'POST',
//        'header'  => implode("\r\n", array('Content-Type: application/json',)),
//        'content' => $json,
//    )
//);
//
//$html = file_get_contents($url, false, stream_context_create($context));
//echo $html;

// CURL
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($curl, CURLOPT_HTTPHEADER, 'Content-Type: application/json');
//curl_setopt($curl, CURLOPT_POST, TRUE);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_POSTFIELDS, $json); // パラメータをセット
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

var_dump($response);
//echo $response;
//echo "Hello World";