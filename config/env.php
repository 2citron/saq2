<?php
define("MODE","prod");

switch (MODE)
{
	case "dev":
		$_ENV['host'] = 'localhost';
		$_ENV['username'] = 'root';
		$_ENV['database'] = 'saq2';
		$_ENV['password'] = 'mysql';
		break;
	case "prod":
		$_ENV['host'] = 'us-cdbr-east-03.cleardb.com';
		$_ENV['username'] = 'bfa7289d6406e9';
		$_ENV['database'] = 'heroku_26ae2c922f962a4';
		$_ENV['password'] = '4d754500';
		break;
};
