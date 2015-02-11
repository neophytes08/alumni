<?php 

	class deletemodel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function deleteDept($id)
		{
			$this->db->where('department_id',$id);
			$this->db->delete('tbldepartment');

			$date = date('Y-m-d H:i:s');
			$logs = array(
				'user_id' => $this->session->userdata('user_id'),
				'log_date' => $date,
				'log_name' => 'deleted a department.'
			);

			$this->db->insert('tbllogs', $logs);
		}
		public function deleteCourse($id)
		{
			$this->db->where('course_id',$id);
			$this->db->delete('tblcourse');

			$date = date('Y-m-d H:i:s');
			$logs = array(
				'user_id' => $this->session->userdata('user_id'),
				'log_date' => $date,
				'log_name' => 'deleted a course.'
			);

			$this->db->insert('tbllogs', $logs);
		}
		public function deleteSurvey($id)
		{
			$this->db->where('survey_id',$id);
			$this->db->delete('tblsurvey');

			$date = date('Y-m-d H:i:s');
			$logs = array(
				'user_id' => $this->session->userdata('user_id'),
				'log_date' => $date,
				'log_name' => 'deleted a survey.'
			);

			$this->db->insert('tbllogs', $logs);
		}
		public function deleteUser($id)
		{
			$date = date('Y-m-d H:i:s');

			$this->db->where('user_id',$id);
			$this->db->delete('tbluser_acc');

			$logs = array(
				'user_id' => $this->session->userdata('user_id'),
				'log_date' => $date,
				'log_name' => 'deleted a user.'
			);

			$this->db->insert('tbllogs', $logs);
		}
		public function deleteAdmin($id)
		{
			$data = $this->db->get_where('tbluser_acc', array('user_id' => $this->session->userdata('user_id'), 'level' => 'master', 'position' => 'admin'))->result_object();

			if($data)
			{
				$date = date('Y-m-d H:i:s');

				$this->db->where('user_id',$id);
				$this->db->delete('tbluser_acc');

				$logs = array(
					'user_id' => $this->session->userdata('user_id'),
					'log_date' => $date,
					'log_name' => 'deleted a user admin.'
				);

				$this->db->insert('tbllogs', $logs);
				return 1;
			}
			else
			{
				return 2;
			}
		}
		public function deleteObe($id)
		{
			$date = date('Y-m-d H:i:s');

			$this->db->where('obe_id',$id);
			$this->db->delete('tblspecialization_obe');

			$logs = array(
				'user_id' => $this->session->userdata('user_id'),
				'log_date' => $date,
				'log_name' => 'deleted a data.'
			);

			$this->db->insert('tbllogs', $logs);
		}
		public function deletPending($id)
		{
			$this->db->where('pending_id' , $id);
			return $this->db->delete('tblpending');
		}
		public function deleteEvent($id)
		{
			$this->db->where('event_id' , $id);
			$data = $this->db->delete('tblevent');

			if($data)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function deleteNews($id)
		{
			$this->db->where('news_id' , $id);
			$data = $this->db->delete('tblnews');

			if($data)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function deleteEventComment($id)
		{
			$this->db->where('comment_event_id' , $id);
			$data = $this->db->delete('tblcomments_event');
		}
	}
 ?>