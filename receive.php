<?php

ini_set('display_errors', "On");
// https://qiita.com/hidepy/items/42220523cb2b3eb2c451 【PHP】JSONでPOSTされた値の取り出し方。file_get_contents("php://input") するようだ。

// JSON用
$json = file_get_contents("php://input"); // POSTされたJSON文字列を取り出し
$contents = json_decode($json, true); // JSON文字列をobjectに変換（第2引数をtrueにしないとハマるので注意）
var_dump($contents);