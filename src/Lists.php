<?php

namespace ClickUp;

use ClickUp\CallCurl;

class Lists extends CallCurl
{

	function __construct($token)
	{
		 parent::__construct($token);
	}

	public function getLists($folderId){
		$url = "folder/$folderId/space";
		return $this->call('GET', $url); 
	}

	public function getList($id){
		$url = "list/$id";
		return $this->call('GET', $url); 
	}

	public function delete($id){
		$url = "list/$id";
		return $this->call('DELETE', $url); 
	}
}
?>
