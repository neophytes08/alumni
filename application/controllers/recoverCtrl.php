<?php 

	class recoverCtrl extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('recovermodel');
		}
		public function show_login($show_error = false)
		{
			redirect(base_url('index.php/loginctrl/'),"refresh");
		}
		public function getRecover()
		{
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->recovermodel->getRecover($post);
			echo json_encode($data);
		}
	}
 ?>