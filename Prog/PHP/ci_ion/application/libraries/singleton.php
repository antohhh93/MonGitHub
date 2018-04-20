<?php
/**
 * Created by PhpStorm.
 * User: Zachary
 * Date: 2018-04-08
 * Time: 14:49
 */
class Singleton {
		public function test(){
			$singleton =& get_instance();
			$singleton->load->helper('date');
			$str = $singleton->time();
			return $str;
		}
}
