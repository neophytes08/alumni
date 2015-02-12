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
			$config['upload_path'] = 'assets/events/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2048';
			$config['max_width']  = '0';
			$config['max_height']  = '0';

			$this->load->library('upload', $config);

			if ( $this->upload->do_upload())
			{
				$dateEvent = date("Y-m-d");
				$filename = "";
				$data = array('upload_data' => $this->upload->data());
				foreach ($data as $key => $value) {
					$filename = $value['file_name'];
				}			
				$dataevents = array(
					'event_picture' => $filename,
					'event_title' => $_POST['eventTitle'],
					'event_description' =>  $_POST['eventDescription'],
					'event_date' => $dateEvent
				);
			}

			$response = $this->addmodel->addEvent($dataevents);
			echo json_encode($dataevents);
		}
		public function addNews()
		{
			$config['upload_path'] = 'assets/news/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2048';
			$config['max_width']  = '0';
			$config['max_height']  = '0';

			$this->load->library('upload', $config);

			$date = date("Y-m-d");
			if ( $this->upload->do_upload())
			{
				$filename = "";
				$data = array('upload_data' => $this->upload->data());
				foreach ($data as $key => $value) {
					$filename = $value['file_name'];
				}			
				$datanews = array(
					'news_pic' => $filename,
					'news_title' => $_POST['newsTitle'],
					'news_description' =>  $_POST['newsDescription'],
					'news_date' => $date
				);
			}

			$response = $this->addmodel->addNews($datanews);
			echo json_encode($response);		

		}
		public function addCommentEvent()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->addCommentEvent($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function addMessage()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->addMessage($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function replyData()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->addmodel->replyData($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
	}
 ?>