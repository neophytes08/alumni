<?php 

	class loginctrl extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('loginmodel');
		}
		public function show_login($show_error = false)
		{
			$this->load->view('login_page');
		}
		public function index()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$this->load->view('login_page');
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function resume()
		{
			$this->load->view('resume_data');
		}
		public function authenticate()
		{
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->loginmodel->auth($post);
			echo json_encode(array("pos" => $data));
		}
		public function logout()
		{
			$this->session->set_userdata( array(
					'user_id' => '',
					'isLoggedIn' => false
				)
			);
			$this->session->sess_destroy();
			redirect(base_url('index.php/loginctrl/'),"refresh");
		}
	}
 ?>