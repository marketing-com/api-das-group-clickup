<?php

namespace ClickUp;

use ClickUp\CallCurl;

class Tasks extends CallCurl
{

	function __construct($token)
	{
		 parent::__construct($token);
	}

	function create($list,$params){
		$url = "list/$list/task";
		return $this->call('POST', $url, $params); 
	}

	function update( $id,$params ){
		$url = "task/$id";
		return $this->call('PUT', $url, $params); 
	}

	function getTask( $id,$params = false ){
		$url = "task/$id";
		return $this->call('GET', $url, $params);
	}
}
?>
