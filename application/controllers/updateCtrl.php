<?php 

	class updateCtrl extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('updatemodel');
		}
		public function show_login($show_error = false)
		{
			redirect(base_url('index.php/loginctrl/'),"refresh");
		}
		public function updateProfileInfo()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateProfileInfo($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateAccountEmail($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->updatemodel->updateAccountEmail($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateGraduateInfo()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateProfileInfo($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updatePersonalInfo()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updatePersonalInfo($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateElementary()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateElementary($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateSecondary()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateSecondary($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateTertiary()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateTertiary($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateUserInfo()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateUserInfo($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateEmployment()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateEmployment($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateEvent()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateEvent($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateNews()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateNews($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateEventComment()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateEventComment($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateAccount()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateAccount($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateAdmin()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->updatemodel->updateAdmin($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
	}
 ?>