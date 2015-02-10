<?php 
	
	class addCtrl extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('addmodel');
		}
		public function show_login($show_error = false)
		{
			redirect(base_url('index.php/loginctrl/'),"refresh");
		}
		public function addNewGradData()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->addNewGradData($post);
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function addUser()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->addUser($post);
				echo json_encode(array("stat" => $data));
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function addDepartment()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->addDepartment($post);
				echo json_encode(array("stat" => $data));
			}
			else
			{
				$this->show_login(false);
			}
			
		}
		public function addCourse()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->addCourse($post);
				echo json_encode(array("stat" => $data));
			}
			else
			{
				$this->show_login(false);
			}
			
		}
		public function addSurvey()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->addSurvey($post);
				echo json_encode(array("stat" => $data));
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function deactivateSurvey($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->addmodel->deactivateSurvey($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function activateSurvey($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->addmodel->activateSurvey($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function addNewAdmin()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->addNewAdmin($post);
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function addObe()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->addObe($post);
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function addRegister()
		{
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->addmodel->addRegister($post);
			echo json_encode(array('stat' => $data));
		}
		public function grantPending()
		{
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->addmodel->grantPending($post);
			echo json_encode(array('stat' => $data));
		}
		public function addBasic()
		{
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->addmodel->addBasic($post);
			echo json_encode(array('stat' => $data));
		}
		public function addElementary()
		{
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->addmodel->addElementary($post);
			echo json_encode(array('stat' => $data));
		}
		public function addSecondary()
		{
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->addmodel->addSecondary($post);
			echo json_encode(array('stat' => $data));
		}
		public function addTertiary()
		{
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->addmodel->addTertiary($post);
			echo json_encode(array('stat' => $data));
		}
		public function addEvent()
		{
			$post = json_decode(file_get_contents('php://input'));
			$data = $this->addmodel->addEvent($post);
			echo json_encode(array('stat' => $data));
		}
		public function addNews()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->addNews($post);
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}
		}
	}
 ?>