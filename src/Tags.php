<?php

namespace ClickUp;

use ClickUp\CallCurl;

class Tags extends CallCurl
{

	function __construct($token)
	{
		 parent::__construct($token);
	}

	function getBySpace( $space_id ){
		$url = "space/$space_id/tag";
		return $this->call('GET', $url);
	}

	function create( $space_id,$params ){
		$url = "space/$space_id/tag";
		return $this->call('POST', $url, $params); 
	}

	function deleteSpaceTag( $space_id,$name ){
		$url = "space/$space_id/tag/name";
		return $this->call('DELETE', $url); 
	}

	function addToTask( $task_id,$name){
		$url = "task/$task_id/tag/$name";
		return $this->call('POST', $url); 
	}

	function deleteToTask( $task_id,$name){
		$url = "task/$task_id/tag/$name";
		return $this->call('DELETE', $url); 
	}


}
?>
