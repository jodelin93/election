<?php

class autoloader
{

	static function autoload($Class_NAme)
	{
		require 'php/'.$Class_NAme.'.php';
	}

}
spl_autoload_register(array('autoloader','autoload'));
?>
