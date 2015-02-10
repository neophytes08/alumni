<?php 

	
	class recovermodel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function getRecover($post)
		{
			return $this->db->get_where('tbluser_acc', array('email' => $post->email))->result_object()[0];
		}
	}
 ?>