<?php 

	class listmodel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function getGraduateList()
		{
			$query = "select a.user_id,a.picture,a.fname,a.mname,a.lname,b.course_name,c.year_graduated_tertiary from tblgrad_profile a inner join tblcourse b inner join tbltertiary c where c.user_id = a.user_id && c.degree_tertiary = b.course_id group by a.user_id";
			return $this->db->query($query)->result_object();
		}
		public function getGraduateInfo($id)
		{
			$query = "select f.user_id,f.username,f.password,d.profile_id,d.picture,d.fname,d.mname,d.lname,d.extention_name from tbluser_acc f inner join tblgrad_profile d where d.user_id = f.user_id && f.user_id = ".$id."";
			return $this->db->query($query)->result_object()[0];
		}
		public function getGradPersonal($id)
		{
			return $this->db->get_where('tblgrad_profile', array('user_id' => $id))->result_object()[0];
		}
		public function getEducationInfo($id)
		{

			$queryElementary = "select * from tblelementary where user_id = ".$id."";
			$getElementary = $this->db->query($queryElementary)->result_object()[0];

			$querySecondary = "select * from tblsecondary where user_id = ".$id."";
			$getSecondary = $this->db->query($querySecondary)->result_object()[0];

			$queryTertiary = "select a.user_id,b.tertiary_id,b.academic_level_tertiary,b.school_name_tertiary,b.school_address_tertiary,b.degree_tertiary,b.year_from_tertiary,b.year_to_tertiary,b.year_graduated_tertiary,b.awards_received_tertiary,b.thesis_project_tertiary,c.course_name from tbluser_acc a inner join tbltertiary b inner join tblcourse c where b.user_id = a.user_id && c.course_id = b.degree_tertiary && a.user_id = ".$id."";
			$getTertiary = $this->db->query($queryTertiary)->result_object()[0];

			$data = array(
				'elementary' => $getElementary,
				'secondary' => $getSecondary,
				'tertiary' => $getTertiary
			);

			return $data;
		}
		public function getEmploymentRecord($id)
		{
			return $this->db->get_where('tblemployment_record', array('user_id' => $id))->result_object()[0];
		}
		public function getGraduateWholeInfo($id)
		{
			$query = "select f.user_id,f.username,f.password,d.profile_id,d.picture,d.fname,d.mname,d.lname,d.extention_name,d.gender,d.birthdate,d.email,d.mobile_no,d.tele_no,d.citizenship,d.house_no,d.street,d.barangay,d.city,d.province,a.user_id,a.secondary_id,a.school_name_secondary,a.school_address_secondary,a.year_graduated_secondary,a.awards_received_secondary,b.tertiary_id,b.academic_level_tertiary,b.school_name_tertiary,b.school_address_tertiary,b.degree_tertiary,b.year_from_tertiary,b.year_to_tertiary,b.year_graduated_tertiary,b.awards_received_tertiary,b.thesis_project_tertiary,c.course_name,g.year_name,e.elementary_id,e.school_name_elementary,e.school_address_elementary,e.awards_received_elementary,e.year_graduated_elementary from tblsecondary a inner join tbltertiary b inner join tblcourse c inner join tbluser_acc f inner join tblgrad_profile d inner join tblyear g inner join tblelementary e where e.user_id = a.user_id && a.year_graduated_secondary = g.year_id && d.user_id = f.user_id && b.user_id = a.user_id && b.user_id = f.user_id && c.course_id = b.degree_tertiary && a.user_id = ".$id."";
			return $this->db->query($query)->result_object()[0];
		}
		public function getGraduateWholeSpecificInfo()
		{
			$query = "select f.username,a.user_id,a.picture,a.fname,a.mname,a.lname,a.extention_name,a.birthdate,a.gender,a.email,a.mobile_no,a.tele_no,a.citizenship,a.street,a.barangay,a.city,a.province,c.course_name from tblgrad_profile a inner join tbluser_acc f inner join tbltertiary d inner join tblcourse c where f.user_id = a.user_id && d.user_id = a.user_id && c.course_id = d.degree_tertiary && f.user_id = ".$this->session->userdata('user_id')."";
			return $this->db->query($query)->result_object()[0];
		}
		public function getAcademicLevel($id)
		{
			return $this->db->get_where('tbltertiary', array('user_id' => $id))->result_object()[0];
		}
		public function getDepartmentList()
		{
			return $this->db->get('tbldepartment')->result_object();
		}
		public function getCourse($id)
		{
			// return $this->db->get_where('tblcourse', array('department_id' => $id))->result_object();
			$query = "select a.department_id, a.department_name, b.course_id, b.course_name from tbldepartment a inner join tblcourse b where b.department_id = a.department_id && a.department_id = ".$id."";
			return $this->db->query($query)->result_object();
		}
		public function getCourseList()
		{
			return $this->db->get('tblcourse')->result_object();
		}
		public function getCourseWithDepartment()
		{
			$query = "select a.course_id,a.course_name,b.department_id,b.department_name from tblcourse a inner join tbldepartment b where b.department_id = a.department_id";
			return $this->db->query($query)->result_object();
		}
		public function getSpecificCourseDepartment($id)
		{
			return $this->db->get_where('tblcourse', array('course_id' => $id))->result_object()[0];
		} 
		public function getUser($id)
		{
			$query = "select a.user_id,a.username,a.position,b.email,b.profile_id,b.fname,b.mname,b.lname,b.extention_name,b.birthdate,b.gender,b.mobile_no,b.tele_no,b.citizenship,b.house_no,b.street,b.barangay,b.city,b.province,b.picture from tbluser_acc a inner join tblgrad_profile b where b.user_id = a.user_id && a.user_id = ".$id."";
			return $this->db->query($query)->result_object()[0];
		}
		public function getYear()
		{
			$query = "select * from tblyear order by year_id desc";
			return $this->db->query($query)->result_object();
		}
		public function getSurvey()
		{
			$query = "select a.survey_id,a.survey_status,a.course_id,a.survey_year,b.course_name,c.year_name from tblsurvey a inner join tblcourse b inner join tblyear c where b.course_id = a.course_id && c.year_id = a.survey_year order by a.survey_year asc";
			return $this->db->query($query)->result_object();
		}
		public function getUsers()
		{
			
			$query = "select a.user_id,a.username,a.password,a.email,d.picture,d.fname,d.mname,d.lname,d.extention_name,b.degree_tertiary, c.course_name from tbluser_acc a inner join tbltertiary b inner join tblcourse c inner join tblgrad_profile d where b.user_id = a.user_id && c.course_id = b.degree_tertiary && d.user_id = a.user_id && a.position = 'user'";
			return $this->db->query($query)->result_object();
		}
		public function getPokeSurvey()
		{
			
			$queryCourse = "select degree_tertiary from tbltertiary where user_id = ".$this->session->userdata('user_id')."";
			$getCourse =  $this->db->query($queryCourse)->result_object()[0];

			$querySurvey = "select * from tblsurvey where course_id = ".$getCourse->degree_tertiary." && survey_status = 'activate'";
			$getSurvey = $this->db->query($querySurvey)->result_object();

			if($getSurvey)
			{	
				$survey = $getSurvey[0];
				
				$queryCheck = "select a.survey_id,b.status from tblsurvey a inner join tblsurvey_status b where b.survey_id = a.survey_id && b.user_id = ".$this->session->userdata('user_id')." && b.survey_id = ".$survey->survey_id." && b.status = 'done'";
				$getCheck = $this->db->query($queryCheck)->result_object();

				if($getCheck)
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 1;
			}
			
		}
		public function getSpecificUserCourse($id)
		{
			return $this->db->get_where('tbltertiary', array('degree_tertiary' => $id))->result_object()[0];
		}
		public function getLogs()
		{
			$query = "select a.user_id,a.position,b.picture,b.fname,mname,lname,c.log_date,c.log_name from tbluser_acc a inner join tbladmin_profile b inner join tbllogs c where b.user_id = a.user_id && c.user_id = b.user_id order by c.log_date desc";
			return $this->db->query($query)->result_object();
		}
		public function updateProfileTrigger()
		{
			$data = $this->db->get_where('tblgrad_profile', array('user_id' => $this->session->userdata('user_id'), 'status' => 'pending'))->result_object();
			
			if($data)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		public function getAdminList()
		{
			$query = "select a.user_id,a.username,a.password,a.position,a.level,b.fname,b.mname,b.lname from tbluser_acc a inner join tbladmin_profile b where b.user_id = a.user_id";
			return $this->db->query($query)->result_object();
		}
		public function adminInfo()
		{
			$query = "select a.user_id,a.username,a.password,a.position,a.level,b.picture,b.fname,b.mname,b.lname,b.birthdate,b.address,b.email,b.contact from tbluser_acc a inner join tbladmin_profile b where b.user_id = a.user_id && a.user_id = ".$this->session->userdata('user_id')."";
			return $this->db->query($query)->result_object()[0];
		}
		public function searchUser($post)
		{
	
		}
		public function getUserEmails()
		{
			$query = "select email from tbluser_acc where position = 'user'";
			return $this->db->query($query)->result_object();
		}
		public function getEmails()
		{
			$query_1 = "select a.user_id,a.email,a.username,a.password from tbluser_acc a inner join tblstatus b where b.user_id = a.user_id && b.email_status = 'undone'";
			$unsent_mails = $this->db->query($query_1)->result_object();

			$query_2 = "select user_id from tblstatus where email_status = 'done'";
			$sent_mails = $this->db->query($query_2)->result_object();

			$query_3 = "select COUNT(user_id) as emailCounted from tbluser_acc where position = 'user'";
			$countedEmails = $this->db->query($query_3)->result_object()[0];

			$status = array(
				'unsent' => $unsent_mails,
				'sent' => $sent_mails,
				'allMails' => $countedEmails
			);
			return $status;
		}
		public function getSurveyForNotication()
		{
			$date = date('Y');

			$query = "select a.survey_id,a.survey_year,a.survey_status,a.course_id,b.course_id,b.course_name,b.department_id,c.year_id,c.year_name from tblsurvey a inner join tblcourse b inner join tblyear c where c.year_id = a.survey_year && b.course_id = a.course_id && a.survey_status = 'activate'";
			return $this->db->query($query)->result_object();

			
		}
		public function getEmailsForSurveyNotification($id)
		{
			$query = "select a.email from tbluser_acc a inner join tbltertiary b inner join tblcourse c where b.user_id = a.user_id && b.degree_tertiary = c.course_id && c.course_id = ".$id."";
			return $this->db->query($query)->result_object();
		}
		public function getObe($id)
		{
			$query = "select a.obe_id,a.obe_name,a.course_id,b.course_name from tblspecialization_obe a inner join tblcourse b where b.course_id = a.course_id && a.course_id = ".$id."";
			return $this->db->query($query)->result_object();
		}
		public function getSpecialization()
		{
			$get = "select degree_tertiary from tbltertiary where user_id = ".$this->session->userdata('user_id')."";
			$course = $this->db->query($get)->result_object()[0];

			$query = "select * from tblspecialization_obe where course_id = '".$course->degree_tertiary."'";
			$special = $this->db->query($query)->result_object();


			$getSurvey = "select survey_id from tblsurvey where course_id = ".$course->degree_tertiary." && survey_status = 'activate'";
			$survey_id = $this->db->query($getSurvey)->result_object()[0];

			$spec = array(
				'survey' => $survey_id->survey_id,
				'special' => $special
			);

			return $spec;
		}
		public function getEmployment($id)
		{
			$employment = $this->db->get_where('tblemployment_record', array('user_id' => $id))->result_object()[0];
			
			if($employment)
			{
				return $employment;
			}
			else
			{
				return 0;
			}
		}
		public function getAddress()
		{
			$query = "select street, barangay, city, province from tblgrad_profile where user_id = ".$this->session->userdata('user_id')."";
			$data = $this->db->query($query)->result_object()[0];

			return $address = $data->street.', '.$data->barangay.', '.$data->city.', '.$data->province;
		}
		public function getUserAccount()
		{
			return $this->db->get_where('tbluser_acc', array('user_id' => $this->session->userdata('user_id')))->result_object()[0];
		}
		public function listPending()
		{	
			$query = "select l.user_id,a.user_id,a.fname,a.mname,a.lname,a.extention_name,d.degree_tertiary,d.year_graduated_tertiary,f.course_name,l.status from tblgrad_profile a inner join tbltertiary d inner join tblcourse f inner join tbluser_acc l where d.user_id = a.user_id && d.degree_tertiary = f.course_id && l.user_id = a.user_id";
			return $this->db->query($query)->result_object();

		}
		public function checkPending($post)
		{
			$query = "select * from tblgradList where fname = '".$post->fname."' && mname = '".$post->mname."' && lname = '".$post->lname."' && extention_name = '".$post->extention_name."' && course = '".$post->course."'";
			$data = $this->db->query($query)->result_object();

			if($data)
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		public function getElementary($id)
		{
			return $this->db->get_where('tblelementary', array('user_id' => $id))->result_object()[0];
		}
		public function getSecondary($id)
		{
			return $this->db->get_where('tblsecondary', array('user_id' => $id))->result_object()[0];
		}
		public function getTertiary($id)
		{
			// return $this->db->get_where('tbltertiary', array('user_id' => $id))->result_object();
			$query = "select a.tertiary_id,a.academic_level_tertiary,a.school_name_tertiary,a.school_address_tertiary,a.degree_tertiary,a.year_from_tertiary,a.year_to_tertiary,a.year_graduated_tertiary,a.awards_received_tertiary,a.thesis_project_tertiary,b.course_name from tbltertiary a inner join tblcourse b where b.course_id = a.degree_tertiary && a.user_id = ".$id."";
			return $this->db->query($query)->result_object();
		}
		public function listOthers($post)
		{	
			$queryDegreeId = "select degree_tertiary from tbltertiary where user_id = ".$this->session->userdata('user_id')."";
			$getDegreeId = $this->db->query($queryDegreeId)->result_object()[0];

			$this->db->like('obe_name', $post->employment_position);
			$this->db->like('course_id', $getDegreeId->degree_tertiary);
			$this->db->where('others', 'true');
			return $this->db->get('tblspecialization_obe')->result_object();
		}
		public function statusOptBlock($id)
		{
			$block = array(
				'status' => 'block'
			);

			$this->db->where('user_id', $id);
			$data = $this->db->update('tbluser_acc', $block);

			if($data)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function statusOptActivate($id)
		{
			$active = array(
				'status' => 'active'
			);

			$this->db->where('user_id', $id);
			$data = $this->db->update('tbluser_acc', $active);

			if($data)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function statusOptDeactivate($id)
		{
			$deactivate = array(
				'status' => 'deactivate'
			);

			$this->db->where('user_id', $id);
			$data = $this->db->update('tbluser_acc', $deactivate);

			if($data)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function eventList()
		{
			return $this->db->get('tblevent')->result_object();
		}
		public function newsList()
		{
			return $this->db->get('tblnews')->result_object();
		}
		public function listEventComment($id)
		{
			$query = " select a.picture,a.fname,a.mname,a.lname,a.extention_name,b.comment_event_id,b.event_id,a.user_id,b.comment_event_details,comment_event_date,c.event_id from tblgrad_profile a inner join tblcomments_event b inner join tblevent c where b.user_id = a.user_id && c.event_id = b.event_id && b.event_id = ".$id." order by b.comment_event_id asc";
			return $this->db->query($query)->result_object();
		}
		public function messageList()
		{
			$query = "SELECT U.user_id,C.conversation_id,U.fname,U.mname,U.extention_name,U.picture FROM tblgrad_profile U, tblconversation C, tblconversation_reply R WHERE CASE WHEN C.user_one = ".$this->session->userdata('user_id')." THEN C.user_two = U.user_id WHEN C.user_two = ".$this->session->userdata('user_id')." THEN C.user_one = U.user_id END AND C.conversation_id = R.conversation_id AND (C.user_one = ".$this->session->userdata('user_id')." OR C.user_two = ".$this->session->userdata('user_id').") group by U
			.user_id DESC ";
			return $this->db->query($query)->result_object();
		}
		public function messageSpecificList($id)
		{
			$query = "SELECT R.conversation_id,R.time,R.reply,U.user_id,U.fname,U.mname,U.lname,U.picture,R.cr_id FROM tblgrad_profile U, tblconversation_reply R WHERE R.user_id = U.user_id AND R.conversation_id = ".$id." ORDER BY R.conversation_id DESC";
			return $this->db->query($query)->result_object();
		}
		public function getYearGraduated()
		{
			$query = "select year_graduated_tertiary from tbltertiary group by year_graduated_tertiary";
			return $this->db->query($query)->result_object();
		}
		public function getAccount()
		{
			$query = "select username, password, email from tbluser_acc where user_id = ".$this->session->userdata('user_id')."";
			return $this->db->query($query)->result_object()[0];
		}
	}
 ?>