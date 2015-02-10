<?php 

	class surveyCtrl extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('surveymodel');
		}
		public function show_login($show_error = false)
		{
			redirect(base_url('index.php/loginctrl/'),"refresh");
		}
		public function submitSurvey()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->surveymodel->submitSurvey($post);
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function yearSurvey()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->surveymodel->yearSurvey();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getGenerate()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->surveymodel->getGenerate($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getAllSurveyYear()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->surveymodel->getAllSurveyYear($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function updateSurvey()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$post = json_decode(file_get_contents('php://input'));
				$data = $this->surveymodel->updateSurvey($post);
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function getSurveyCount()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->surveymodel->getSurveyCount();
				echo json_encode($data);
			}
			else
			{
				$this->show_login(false);
			}
		}
	}
 ?>