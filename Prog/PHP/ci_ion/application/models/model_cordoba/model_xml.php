<?php
/**
 * Created by PhpStorm.
 * User: Zachary
 * Date: 2018-04-15
 * Time: 14:49
 */
class model_xml extends CI_Model{
	private $domDoc;
	public function __construct()
	{
		parent::__construct();
		$this->domDoc = new DOMDocument();
		$this->domDoc->load('input_xml/cordoba.xml');
	}

	public function lire_xml(){
		$this->domDoc->getElementsByTagName('');
		//a suiver
	}

}
