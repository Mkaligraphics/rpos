<?php
//error_reporting(0);
date_default_timezone_set('Africa/Nairobi');

class dbase{
///*DB connection */
public $con;
	public function __construct(){$this->con = new mysqli('localhost','root','','rpos');
		if (!$this->con){
			die('We could not connect to database') ;
		}
	}

}//#dbase class

?>