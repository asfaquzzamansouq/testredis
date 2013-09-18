<?php
require dirname(__FILE__) ."/predis/autoload.php";
Predis\Autoloader::register();

class SK_REDIS{
	public $redis;
	public $countries=array();
	function __construct(){
		try{
			$this->redis = new Predis\Client();
			$this->countries=array('aaaa','bbbb','cccc');
			//print_r($this->redis->info());
			//exit;
		}
		catch (Exception $e) {
			echo "Couldn't connected to Redis";
			echo $e->getMessage();
		}
	}


	function set_key_value($key,$value){
		if($this->redis)
			$this->redis->set($key,$value);
	}

	function get_value($key){
		if($this->redis)
			if($this->redis->exists($key)){
			return $this->redis->get($key);

		}


	}
	
	function set_hash_value(){
		$hKey='countries';
		if(!$this->redis->hExists('h',$hKey)){
			foreach($countries as $country){
				$this->redis->hSet('h', $hKey, $country);
			
			
			}
			
			
			
		}
		
		
	}
}

$redisObj=new SK_REDIS();
$redisObj->set_hash_value();




?>

