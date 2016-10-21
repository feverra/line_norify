<?php

require_once './class.php';

$key = '<access token>';
$text = 'hello';
$line = new notify($key);
$line->sent($text);

$line->status();

$line->revoke(1);
