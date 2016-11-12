<?php
require_once 'core/init.php';

$user = DB::getInstance()->delete('users', array('id', '=', 3));

var_dump($user);