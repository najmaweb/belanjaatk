<?php
class Gallery extends DataMapper{
	function __construct(){
		parent::__construct();
	}

	function populate($segment=0,$offset=3){
		$obj = new Gallery();
		$obj->get($offset,$segment);
		return $obj;
	}
}