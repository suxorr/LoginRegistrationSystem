<?php
session_start();

$GLOBALS['config']= [
    'mysql' => [
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'login_register_system'
    ],
    'remember'=>[
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ],
    'session'=> [
        'session_name' => 'user',
        'token_name' => 'token'
    ]
];

spl_autoload_register(function($class) {
    require_once 'classes/'.$class.'.php';
});

require_once 'functions/sanitize.php';
	
if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hasCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));
	
	if($hasCheck->count()){
		$user = new User($hasCheck->first()->user_id);
		$user->login();
	}
	
}