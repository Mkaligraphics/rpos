<?php
	spl_autoload_register('myAutoloader');
		function myAutoloader($className){
			$path = "classes/";
			$extenstion = ".class.php";
			$fullpath = $path . $className . $extenstion;
			if (!file_exists($fullpath)){
				return false;
			}
			include $fullpath;
		}
?>