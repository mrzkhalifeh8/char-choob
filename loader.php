<?
//start session
session_start();
//set default time zone to have correct time when converting time stamp
date_default_timezone_set('timezone code');require_once(getcwd() .'/common.php');
date_default_timezone_set('timezone code');
require_once(getcwd() .'/config.php');
require_once(getcwd() .'/locale/' . $config['lang'] .'.php');