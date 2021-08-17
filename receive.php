<?php

// JSON用
$json = file_get_contents("php://input"); // POSTされたJSON文字列を取り出し
$contents = json_decode($json, true); // JSON文字列をobjectに変換（第2引数をtrueにしないとハマるので注意）
var_dump($contents);