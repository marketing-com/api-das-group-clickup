<?php

namespace ClickUp;

use ClickUp\CallCurl;

class Spaces extends CallCurl
{

	function __construct($token)
	{
		 parent::__construct($token);
	}

	public function getSpaces($teamId){
		$url = "team/$teamId/space";
		return $this->call('GET', $url); 
	}

	public function getSpace($id){
		$url = "space/$id";
		return $this->call('GET', $url); 
	}

	public function delete($id){
		$url = "space/$id";
		return $this->call('DELETE', $url); 
	}
}
?>
