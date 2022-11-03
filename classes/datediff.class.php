<?php

class timeStamp
{

	function getDateTimeDiff($date){
			 $now_timestamp = strtotime(date('Y-m-d H:i:s'));
			 $diff_timestamp = $now_timestamp - strtotime($date);
			 
			 if($diff_timestamp < 60){
			  return 'few seconds';
			 }
			 else if($diff_timestamp >=60 && $diff_timestamp <3600){
			  return round($diff_timestamp/60).' mins ';
			 }
			 else if($diff_timestamp >=3600 && $diff_timestamp<86400){
			  return round($diff_timestamp/3600).' hours ';
			 }
			 else if($diff_timestamp >=86400 && $diff_timestamp<(86400*30)){
			  return round($diff_timestamp/(86400)).' days ';
			 }
			 else if($diff_timestamp >=(86400*30) && $diff_timestamp<(86400*365)){
			  return round($diff_timestamp/(86400*30)).' months';
			 }
			 else{
			  return round($diff_timestamp/(86400*365)).' years ';
			 }
}
	
	
}

?>