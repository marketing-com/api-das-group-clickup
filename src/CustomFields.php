<?php

namespace ClickUp;

use ClickUp\CallCurl;

class CustomFields extends CallCurl
{

	function __construct($token)
	{
		 parent::__construct($token);
	}

	public function getCustomFields( $list_id ){
		$url = "list/list_id/field";
		return $this->call('GET', $url); 
	}

	public function setCustomFields( $task_id,$field_id,$params ){
		$url = "task/$task_id/field/$field_id";
		return $this->call( 'POST', $url,$params ); 
	}

	public function delete( $task_id,$field_id){
		$url = "task/$task_id/field/$field_id";
		return $this->call( 'DELETE', $url ); 
	}
}
?>
