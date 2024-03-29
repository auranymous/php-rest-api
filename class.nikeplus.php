<?php
	require_once('class.restapi.php');

	class NikePlus extends RestApi
	{
		protected $cache_ext = 'nike';
		protected $format = 'xml';
		protected $cache_life = -1;
		
		function getRunList($user_id, $bypass_cache = false)
		{
			$url = "http://nikerunning.nike.com/nikeplus/v2/services/app/run_list.jsp?userID=" . $user_id;
			if ($bypass_cache)
				return $this->request($url, array('cache_life'=>1));
			else
				return $this->request($url);
		}
		
		function getRun($user_id, $run_id)
		{
			$url = "http://nikeplus.nike.com/nikeplus/v1/services/widget/get_public_run.jsp?id=$run_id&userID=$user_id";
			return $this->request($url);
		}
	}