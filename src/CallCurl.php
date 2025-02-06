<?php
namespace ClickUp;

class CallCurl
{

	private $token;
	private $url = 'https://api.clickup.com/api';
	private $version;

	function __construct($token,$version = 'v2')
	{
		$this->token = $token;
		$this->version = $version;
	}

	public function getByName($obj,$name,$key = 'name'){
		foreach ($obj as $value) {
			if ($name === $value[$key]) {
				return $value;
			}
		}

		return false;
	}
	

	function call($verb, $endpoint, $params = false){
		$url = $this->url.'/'.$this->version.'/'.$endpoint; 
		
		if( $params && ($verb == 'GET' || $verb == 'PUT' ) ){
			$url .= '?' . http_build_query($params);
		}

		$ch = curl_init($url);
		$httpheader = ['Content-Type: application/json',sprintf('Authorization: %s', $this->token)];
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 50);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verb);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		if($params && $verb != 'GET'){
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
		}else{
			$httpheader[] = 'Content-Length: 0';
		}	
		curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);

		$result = curl_exec($ch);

		curl_close($ch);
		$result = json_decode($result, true);
		
		if(is_array($result)){
			return $this->is_error($result);
		}
		return $result;		
	}

	private function is_error($data){

		if(isset($data['code']) && $data['code'] >= 400){
			$data['is_error'] = true;
		}else{
			$data['is_error'] = false;
		}
		return $data;
	}


}
?>
