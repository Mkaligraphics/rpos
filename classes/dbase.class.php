<?php
//error_reporting(0);

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