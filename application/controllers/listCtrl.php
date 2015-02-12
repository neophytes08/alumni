<?php 

	
	class listCtrl extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('listmodel');
		}
		public function show_login($show_error = false)
		{
			redirect(base_url('index.php/loginctrl/'),"refresh");
		}
		public function getGraduateList()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getGraduateList();
				echo json_encode($data);
				
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getGraduateInfo($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getGraduateInfo($id);
				echo json_encode($data);
				
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getGradPersonal($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getGradPersonal($id);
				echo json_encode($data);
				
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getEducationInfo($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getEducationInfo($id);
				echo json_encode($data);
				
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getGraduateWholeInfo($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getGraduateWholeInfo($id);
				echo json_encode($data);
				
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getGraduateWholeSpecificInfo()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getGraduateWholeSpecificInfo();
				echo json_encode($data);
				
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getAcademicLevel($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getAcademicLevel($id);
				echo json_encode($data);
				
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getDepartmentList()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getDepartmentList();
				echo json_encode($data);
				
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getCourse($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getCourse($id);
				echo json_encode($data);
				
			}
			else
			{
				$this->show_login(false);
			}
			
		}
		public function getCourseList()
		{	
			$data = $this->listmodel->getCourseList();
			echo json_encode($data);
		}
		public function getCourseWithDepartment()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getCourseWithDepartment();
				echo json_encode($data);
				
			}
			else
			{
				$this->show_login(false);
			}
			
		}
		public function getSpecificCourseDepartment($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getSpecificCourseDepartment($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getUser($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getUser($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getYear()
		{
			$data = $this->listmodel->getYear();
			echo json_encode($data);
		}
		public function getSurvey()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getSurvey();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getYearGraduated()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getYearGraduated();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getUsers()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getUsers();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getPokeSurvey()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getPokeSurvey();
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getSpecificUserCourse($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getSpecificUserCourse($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getLogs()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getLogs();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateProfileTrigger()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->updateProfileTrigger();
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getAdmin()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getAdmin();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getAdminList()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getAdminList();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function adminInfo()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->adminInfo();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function searchUser()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->listmodel->searchUser($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getUserEmails()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getUserEmails();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getEmails()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getEmails();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getSurveyForNotication()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getSurveyForNotication();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getEmailsForSurveyNotification($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getEmailsForSurveyNotification($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getObe($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getObe($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getSpecialization()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getSpecialization();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getEmployment()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$id = $this->session->userdata('user_id');
				$data = $this->listmodel->getEmployment($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getEmploymentRecord($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{	
				$data = $this->listmodel->getEmployment($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getElementary($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getElementary($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getSecondary($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getSecondary($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getTertiary($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getTertiary($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getUserAccount()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getUserAccount();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getPending()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getPending();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function checkPending()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->listmodel->checkPending($post);
				echo json_encode(array("stat" => $data));
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function listOthers()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->listmodel->listOthers($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function listPending()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->listPending();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function statusOptBlock($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->statusOptBlock($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function statusOptActivate($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->statusOptActivate($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function statusOptDeactivate($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->statusOptDeactivate($id);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function eventList()
		{
			$data = $this->listmodel->eventList();
			echo json_encode($data);
		}
		public function newsList()
		{
			$data = $this->listmodel->newsList();
			echo json_encode($data);
		}
		public function listEventComment($id)
		{
			$data = $this->listmodel->listEventComment($id);
			echo json_encode($data);
		}
		public function messageList()
		{
			$data = $this->listmodel->messageList();
			echo json_encode($data);
		}
		public function messageSpecificList($id)
		{
			$data = $this->listmodel->messageSpecificList($id);
			echo json_encode($data);
		}
		public function getAccount($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->listmodel->getAccount();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
	}
 ?>