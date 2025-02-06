<?php

namespace ClickUp;

use ClickUp\CallCurl;

class Teams extends CallCurl
{

	function __construct($token)
	{
		 parent::__construct($token);
	}

	public function getTeam(){
		$url = "team";
		return $this->call('GET', $url); 
	}
}
?>
