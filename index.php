<?php
require_once 'core/init.php';

$user = DB::getInstance()->query('SELECT username FROM users');

if($user->error()){
    echo 'no user';
}else{
    echo 'ok';
}