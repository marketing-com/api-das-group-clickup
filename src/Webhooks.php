<?php

namespace ClickUp;

use ClickUp\CallCurl;

class Webhooks extends CallCurl
{

	function __construct($token)
	{
		 parent::__construct($token);
	}

	public function create( $team_id,$params ){
		$url = "team/$team_id/webhook";
		return $this->call('POST', $url,$params); 
	}

	public function list( $team_id ){
		$url = "team/$team_id/webhook";
		return $this->call('GET', $url); 
	}

	public function delete( $id ){
		$url = "webhook/$id";
		return $this->call('DELETE', $url);
	}

	public function update( $id,$params ){
		$url = "webhook/$id";
		return $this->call('PUT', $url,$params);
	}
}
?>
