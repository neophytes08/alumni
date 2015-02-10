<?php 
	

	class deleteCtrl extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('deletemodel');
		}
		public function show_login($show_error = false)
		{
			redirect(base_url('index.php/loginctrl/'),"refresh");
		}
		public function deleteDept($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$this->deletemodel->deleteDept($id);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function deleteCourse($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$this->deletemodel->deleteCourse($id);
			}
			else
			{
				$this->show_login(false);
			}
			
		}
		public function deleteSurvey($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$this->deletemodel->deleteSurvey($id);
			}
			else
			{
				$this->show_login(false);
			}
		}
		public function deleteUser($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$this->deletemodel->deleteUser($id);
			}
			else
			{
				$this->show_login(false);
			}	
		}
		public function deleteAdmin($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->deletemodel->deleteAdmin($id);
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}	
		}
		public function deleteObe($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->deletemodel->deleteObe($id);
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}	
		}
		public function deletPending($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->deletemodel->deletPending($id);
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}	
		}
		public function deleteEvent($id)
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$data = $this->deletemodel->deleteEvent($id);
				echo json_encode(array('stat' => $data));
			}
			else
			{
				$this->show_login(false);
			}	
		}
	}
 ?>