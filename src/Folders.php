<?php

namespace ClickUp;

use ClickUp\CallCurl;

class Folders extends CallCurl
{

	function __construct($token)
	{
		 parent::__construct($token);
	}

	public function getFolders($spaceId){
		$url = "space/$spaceId/folder";
		return $this->call('GET', $url); 
	}

	public function getFolder($id){
		$url = "folder/$id";
		return $this->call('GET', $url); 
	}

	public function delete($id){
		$url = "folder/$id";
		return $this->call('DELETE', $url); 
	}
}
?>
