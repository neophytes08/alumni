<?php 

	class addmodel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function addNewGradData($post)
		{
			
			$temp = $post->fname;
			$tempBday = $post->date;
			$tempBday = $post->date;
			$user = strtok($temp, " ");
			$username = $user.'123';
			$birthdate = strtok($tempBday, "T");
			$year_graduated_elementary = strtok($post->year_graduated_elementary, "T");
			$year_graduated_secondary = strtok($post->year_graduated_secondary, "T");
			$year_graduated_tertiary = strtok($post->year_graduated_tertiary, "T");
			$year_from_tertiary = strtok($post->year_from_tertiary, "T");
			$year_to_tertiary = strtok($post->year_to_tertiary, "T");
			
			$query = "select * from tbluser_acc where username = '".$username."'";
			$data = $this->db->query($query)->result_object();
			if($data)
			{
				return 1;
			}
			else
			{
				$post_one = array(
				'username' => $username,
				'password' => 'user123',
				'email' => $post->email,
				'position' => 'user'
				);
				$this->db->insert('tbluser_acc', $post_one);
				$user_id = $this->db->insert_id();

				$survey_status = array(
					'survey_status' => 'undone',
					'account_status' => 'undone',
					'email_status' => 'undone',
					'user_id' => $user_id
				);
				$this->db->insert('tblstatus', $survey_status);

				$pic = 'default.jpg';
				$post_userInfo = array(
					'user_id' => $user_id,
					'fname' => $post->fname,
					'mname' => $post->mname,
					'lname' => $post->lname,
					'birthdate' => $birthdate,
					'email' => $post->email,
					'extention_name' => $post->extention_name,
					'gender' => $post->gender,
					'mobile_no' => $post->mobile_no,
					'tele_no' => $post->tele_no,
					'street' => $post->street,
					'barangay' => $post->barangay,
					'city' => $post->city,
					'province' => $post->province,
					'status' =>  'edited',
					'picture' => $pic,
					'status' => 'pending'
				);
				$this->db->insert('tblgrad_profile', $post_userInfo);

				$status = array(
					'user_id' => $user_id,
					'account_status' => 'undone',
					'survey_status' => 'undone'
					);
				$this->db->insert('tblstatus', $status);

				$post_four = array(
					'school_name_elementary' => $post->school_name_elementary,
					'user_id' => $user_id,
					'school_address_elementary' => $post->school_address_elementary,
					'year_graduated_elementary' => $year_graduated_elementary,
					'awards_received_elementary' => $post->awards_received_elementary,
					'status' => 'pending'
				);
				$this->db->insert('tblelementary', $post_four);

				$post_two = array(
					'school_name_secondary' => $post->school_name_secondary,
					'user_id' => $user_id,
					'school_address_secondary' => $post->school_address_secondary,
					'year_graduated_secondary' => $year_graduated_secondary,
					'awards_received_secondary' => $post->awards_received_secondary,
					'status' => 'pending'
				);
				$this->db->insert('tblsecondary', $post_two);
				$secondary_id = $this->db->insert_id();

				$post_three = array(
					'academic_level_tertiary' => $post->academic_level_tertiary,
					'school_name_tertiary' => 'Mindanao University of Science and Technology',
					'school_address_tertiary' => 'CM Recto Lapasan Cagayan De Oro City',
					'degree_tertiary' => $post->degree_tertiary,
					'academic_specific' => $post->academic_specific,
					'year_from_tertiary' => $year_from_tertiary,
					'year_to_tertiary' => $year_to_tertiary,
					'year_graduated_tertiary' => $year_graduated_tertiary,
					'awards_received_tertiary' => $post->awards_received_tertiary,
					'thesis_project_tertiary' => $post->thesis_project_tertiary,
					'user_id' => $user_id,
					'status' => 'pending'
				);
				$this->db->insert('tbltertiary', $post_three);
				$tertiary_id = $this->db->insert_id();

				return 0;
			}
			 
		}
		public function addUser($post)
		{
			
			$date = date('Y-m-d H:i:s');
			if($post->user_id > 0)
			{
				$user = array(
					'username' => $post->username,
					'password' => $post->password,
					'email' => $post->email,
				);
				$this->db->where('user_id',$post->user_id);
				$this->db->update('tbluser_acc', $user);

				$profile = array(
					'fname' => $post->fname,
					'lname' =>	$post->lname,
					'mname' => $post->mname,
					'extention_name' => $post->extention_name
				);
				$this->db->where('user_id',$post->user_id);
				$this->db->update('tblgrad_profile', $profile);

				$ter = array(
					'degree_tertiary' => $post->degree_tertiary,
				);
				$this->db->where('user_id',$post->user_id);
				$this->db->update('tbltertiary', $ter);

				$logs = array(
					'user_id' => $this->session->userdata('user_id'),
					'log_date' => $date,
					'log_name' => 'updated a user.'
				);

				$this->db->insert('tbllogs', $logs);
				return 2;
			}
			else
			{
				$query = "select * from tbluser_acc where username = '".$post->username."'";
				$data = $this->db->query($query)->result_object();

				if($data)
				{
					return 1;
				}
				else
				{
					$pic = 'default.jpg';

					$user = array(
					'username' => $post->username,
					'password' => $post->password,
					'email' => $post->email,
					'position' => 'user'
					);
					$this->db->insert('tbluser_acc', $user);
					$id = $this->db->insert_id();

					$status = array(
					'user_id' => $id,
					'account_status' => 'undone',
					'survey_status' => 'undone'
					);
					$this->db->insert('tblstatus', $status);

					$profile = array(
						'user_id' => $id,
						'fname' => $post->fname,
						'mname' => $post->mname,
						'lname' => $post->lname,
						'extention_name' => $post->extention_name,
						'picture' => $pic,
					);
					$this->db->insert('tblgrad_profile', $profile);

					$first = array(
						'user_id' => $id
					);
					$this->db->insert('tblelementary', $first);

					$second = array(
						'user_id' => $id,
					);
					$this->db->insert('tblsecondary', $second);

					$ter = array(
						'user_id' => $id,
						'degree_tertiary' => $post->degree_tertiary,
					);
					$this->db->insert('tbltertiary', $ter);

					$logs = array(
						'user_id' => $this->session->userdata('user_id'),
						'log_date' => $date,
						'log_name' => 'added a user.'
					);

					$this->db->insert('tbllogs', $logs);
					return 3;
					}
			}
		}
		public function addDepartment($post)
		{

			$query = "select * from tbldepartment where department_name = '".$post->department_name."'";
			$data = $this->db->query($query)->result_object();



			if($data)
			{
				return 1;
			}
			else
			{
				if($post->department_id > 0)
				{
					$this->db->where('department_id', $post->department_id);

					$this->db->update('tbldepartment', $post);
					$date = date('Y-m-d H:i:s');
					$logs = array(
						'user_id' => $this->session->userdata('user_id'),
						'log_date' => $date,
						'log_name' => 'updated a department.'
					);
					$this->db->insert('tbllogs', $logs);
					return 2;
				}	
				else
				{

					$department_lower = strtolower($post->department_name);
					$department_new_name = 'department of '.$department_lower;
					$department = array(
						'department_name' => $department_new_name
					);

					$this->db->insert('tbldepartment', $department);
					$date = date('Y-m-d H:i:s');

					$logs = array(
						'user_id' => $this->session->userdata('user_id'),
						'log_date' => $date,
						'log_name' => 'added a department.'
					);
					$this->db->insert('tbllogs', $logs);
					return 3;	
				}
			}
		}
		public function addCourse($post)
		{

			if($post->course_id > 0)
			{
				$course = array(
				'course_name' => $post->course_name,
				'department_id' => $post->department_id
				);
				$this->db->where('course_id', $post->course_id);
				$this->db->update('tblcourse', $course);

				$date = date('Y-m-d H:i:s');
				$logs = array(
					'user_id' => $this->session->userdata('user_id'),
					'log_date' => $date,
					'log_name' => 'updated a course.'
				);
				$this->db->insert('tbllogs', $logs);
				return 1;
			}
			else
			{

				$course_lower = strtolower($post->course_name);
				$course_new_name = 'bs in '.$course_lower;

				$query = "select * from tblcourse where course_name = '".$course_new_name."' && department_id = ".$post->department_id."";
				$data = $this->db->query($query)->result_object();


				if($data)
				{
					return 0;
				}
				else
				{
					$course = array(
					'course_name' => $course_new_name,
					'department_id' => $post->department_id
					);
					$this->db->insert('tblcourse', $course);
					$date = date('Y-m-d H:i:s');
					$logs = array(
						'user_id' => $this->session->userdata('user_id'),
						'log_date' => $date,
						'log_name' => 'added a course.'
					);
					$this->db->insert('tbllogs', $logs);

					$queryReturn = "select * from tblcourse where department_id = ".$post->department_id."";
					return $this->db->query($queryReturn)->result_object();
				}
				
			}
			
		}
		public function addSurvey($post)
		{
			if($post->survey_id > 0 ){

				$update = array(
					'survey_year' => $post->survey_year,
					'survey_status' => $post->survey_status,
					'course_id' => $post->course_id
				);

				$this->db->where('survey_id', $post->survey_id);
				$this->db->update('tblsurvey', $update);

			}
			else
			{
				$query = "select * from tblsurvey where survey_year = ".$post->survey_year." && course_id = ".$post->course_id."";
				$data = $this->db->query($query)->result_object();

				if($data)
				{
					return 0;
				}
				else
				{
					$survey = array(
						'survey_year' => $post->survey_year,
						'survey_status' => 'deactivate',
						'course_id' => $post->course_id
						);
					$data = $this->db->insert('tblsurvey', $survey);

					$date = date('Y-m-d H:i:s');
					$logs = array(
						'user_id' => $this->session->userdata('user_id'),
						'log_date' => $date,
						'log_name' => 'added a survey.'
						);
					}
			}
				return 1;
			
		}
		public function deactivateSurvey($id)
		{
			 $deact = array(
			 	'survey_status' => 'deactivate'
			 );
			 $this->db->where('survey_id', $id);
			 return $this->db->update('tblsurvey', $deact);
		}
		public function ActivateSurvey($id)
		{
			 $deact = array(
			 	'survey_status' => 'activate'
			 );
			 $this->db->where('survey_id', $id);
			 return $this->db->update('tblsurvey', $deact);
		}
		public function addNewAdmin($post)
		{
			$data = $this->db->get_where('tbluser_acc', array('username' => $post->username, 'level' => $post->level))->result_object();

			if($data)
			{
				return 1;
			}
			else
			{
				$user = array(
					'username' => $post->username,
					'password' => $post->password,
					'level' => $post->level,
					'email' => $post->email,
					'position' => 'admin'
				);

				$this->db->insert('tbluser_acc', $user);
				$id = $this->db->insert_id();

				$profile = array(
					'user_id' => $id,
					'fname' => $post->fname,
					'mname' => $post->mname,
					'lname' => $post->lname,
					'birthdate' => $post->birthdate,
					'address' => $post->address,
					'email' => $post->email,
					'contact' => $post->contact,
					'picture' => 'default.jpg'
				);

				$this->db->insert('tbladmin_profile', $profile);
				return 2;
			}
		}
		public function addObe($post)
		{
			if($post->obe_id > 0)
			{
				$obe = array(
					'obe_name' => $post->obe_name,
					'course_id' => $post->course_id
				);

				$this->db->where('obe_id', $post->obe_id);
				$this->db->update('tblspecialization_obe', $obe);

				return 0;
			}
			else
			{
				$obeSubName = strtolower($post->obe_name);

				$queryTrap = "select * from tblspecialization_obe where obe_name = '".$obeSubName."' && course_id = ".$post->course_id."";
				$dataObe = $this->db->query($queryTrap)->result_object();

				if($dataObe)
				{
					return 1;
				}
				else
				{
					$obe = array(
						'course_id' => $post->course_id,
						'obe_name' => $post->obe_name
					);

					$this->db->insert('tblspecialization_obe', $obe);

					$queryObe = "select * from tblspecialization_obe where course_id = ".$post->course_id."";
					return $this->db->query($queryObe)->result_object()[0];
				}
				
			}
			
		}
		public function addRegister($post)
		{
			$user = strtok($post->fname, " ");
			$username = $user.'123';
			$password = 'user123';
			$pic = 'default.jpg';

			if($post->extention_name = ' ')
			{
				$extention_name = ' ';
			}
			else
			{
				$extention_name = $post->extention_name;
			}
			$query = "select * from tbluser_acc where username = '".$username."' && password = '".$password."'";
			$data = $this->db->query($query)->result_object();

			if($data)
			{
				return 1;
			}
			else
			{
				$user = array(
					'username' => $user,
					'password' => $password,
					'email' => $post->email,
					'position' => 'user'
				);

				$this->db->insert('tbluser_acc', $user);
				$id = $this->db->insert_id();

				$profile = array(
					'user_id' => $id,
					'picture' => $pic,
					'fname' => $post->fname,
					'mname' => $post->mname,
					'lname' => $post->lname,
					'extention_name' => $extention_name,
					'status' => 'pending'
				);

				$this->db->insert('tblgrad_profile', $profile);

				$elementary = array(
					'user_id' => $id,
					'status' => 'pending'
				);

				$this->db->insert('tblelementary', $elementary);

				$secondary = array(
					'user_id' => $id,
					'status' => 'pending'
				);
				$this->db->insert('tblsecondary', $secondary);

				$tertiary = array(
					'user_id' => $id,
					'status' => 'pending'
				);

				$this->db->insert('tbltertiary', $tertiary);

				$this->session->set_userdata( array(
					'user_id' => $id,
					'username' => $username,
					'isLoggedIn' => true
					)
				);

				$employment = array(
					'user_id' => $id,
					'status' => 'pending'
				);

				$this->db->insert('tblemployment_record', $employment);
				
				return 0;
			}
		}
		public function grantPending($post)
		{

			$accepted = array(
				'status' => 'accepted'
			);

			$this->db->where('user_id',$post->user_id);
			$this->db->update('tblgrad_profile', $accepted);
			$this->db->update('tblelementary', $accepted);
			$this->db->update('tblsecondary', $accepted);
			$this->db->update('tbltertiary', $accepted);
			$this->db->update('tblemployment_record', $accepted);
			
			$query = "select * from tbluser_acc where user_id = ".$post->user_id."";
			$get = $this->db->query($query)->result_object()[0];

			$email = array(
				'username' => $get->username,
				'password' => $get->password,
				'email' => $get->email
			);

			return $email;
		}
		public function addBasic($post)
		{
			$user = strtok($post->fname, " ");

			$username = $user.'123';
			$password = 'user123';
			$pic = 'default.jpg';
			$birthdate = strtok($post->birthdate, "T");
			
			$query = "select * from tbluser_acc where username = '".$username."' && password = '".$password."'";
			$data = $this->db->query($query)->result_object();

			if($data)
			{
				return 1;
			}
			else
			{
				$basic = array(
					'username' => $username,
					'password' => $password,
					'email' => $post->email,
					'position' => 'user'

				);

				$this->db->insert('tbluser_acc', $basic);
				$id = $this->db->insert_id();

				if($post->extention_name = ' ')
				{
					$extention_name = ' ';
				}
				else
				{
					$extention_name = $post->extention_name;
				}
				$profile = array(
					'user_id' => $id,
					'fname' => $post->fname,
					'mname' => $post->mname,
					'lname' => $post->lname,
					'birthdate' => $birthdate,
					'email' => $post->email,
					'extention_name' => $extention_name,
					'gender' => $post->gender,
					'mobile_no' => $post->mobile_no,
					'tele_no' => $post->tele_no,
					'street' => $post->street,
					'barangay' => $post->barangay,
					'city' => $post->city,
					'province' => $post->province,
					'status' =>  'pending',
					'picture' => $pic
				);
				$this->db->insert('tblgrad_profile', $profile);

				return $id;
			}
			
		}
		public function addElementary($post)
		{	
			$year_graduated_elementary = strtok($post->year_graduated_elementary, "T");

			$elementary = array(
				'user_id' => $post->id,
				'school_name_elementary' => $post->school_name_elementary,
				'school_address_elementary' => $post->school_address_elementary,
				'year_graduated_elementary' => $year_graduated_elementary,
				'awards_received_elementary' => $post->awards_received_elementary,
				'status' => 'pending'
			);

			$this->db->insert('tblelementary', $elementary);

			return true;
		}
		public function addSecondary($post)
		{
			$year_graduated_secondary = strtok($post->year_graduated_secondary, "T");

			$secondary = array(
				'user_id' => $post->id,
				'school_name_secondary' => $post->school_name_secondary,
				'school_address_secondary' => $post->school_address_secondary,
				'year_graduated_secondary' => $year_graduated_secondary,
				'awards_received_secondary' => $post->awards_received_secondary,
				'status' => 'pending'
			);

			$this->db->insert('tblsecondary', $secondary);
			return true;
		}
		public function addTertiary($post)
		{
			$year_from_tertiary = strtok($post->year_from_tertiary, "T");
			$year_to_tertiary = strtok($post->year_to_tertiary, "T");
			$year_graduated_tertiary = strtok($post->year_graduated_tertiary, "T");

			$tertiary = array(
					'academic_level_tertiary' => $post->academic_level_tertiary,
					'school_name_tertiary' => 'Mindanao University of Science and Technology',
					'school_address_tertiary' => 'CM Recto Lapasan Cagayan De Oro City',
					'degree_tertiary' => $post->degree_tertiary,
					'year_from_tertiary' => $year_from_tertiary,
					'year_to_tertiary' => $year_to_tertiary,
					'year_graduated_tertiary' => $year_graduated_tertiary,
					'awards_received_tertiary' => $post->awards_received_tertiary,
					'thesis_project_tertiary' => $post->thesis_project_tertiary,
					'user_id' => $post->id,
					'status' => 'pending'
				);
			$this->db->insert('tbltertiary', $tertiary);
			
			$query = "select * from tbluser_acc where user_id = ".$post->id."";
			$data = $this->db->query($query)->result_object()[0];

			if($data)
			{
				$this->session->set_userdata( array(
					'user_id' => $data->user_id,
					'username' => $data->username,
					'isLoggedIn' => true
					)
				);

				return 1;
			}
			else
			{
				return 0;
			}
			

		}
	}
	
 ?>