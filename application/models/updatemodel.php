<?php 

	class updatemodel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function updateUserInfo($post)
		{

			$personal = array(
				'username' => $post->username,
				'password' => $post->password,
				'email' => $post->email
			);

			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('tbluser_acc', $personal);

			return true;
		}
		public function updatePersonalInfo($post)
		{
			$birthdate = strtok($post->birthdate, "T");

			if($post->extention_name = ' ')
			{
				$extention_name = ' ';
			}
			else
			{
				$extention_name = $post->extention_name;
			}
			$personal = array(
				'fname' => $post->fname,
				'mname' => $post->mname,
				'lname' => $post->lname,
				'extention_name' => $extention_name,
				'gender' => $post->gender,
				'citizenship' => $post->citizenship,
				'birthdate' => $birthdate,
				'street' => $post->street,
				'barangay' => $post->barangay,
				'city' => $post->city,
				'province' => $post->province,
				'email' => $post->email,
				'mobile_no' => $post->mobile_no,
				'tele_no' => $post->tele_no
			);

			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('tblgrad_profile', $personal);

			return true;
		}
		public function updateProfileInfo($post)
		{
			$birthdate = strtok($post->birthdate, "T");
			$year_graduated_elementary = strtok($post->year_graduated_elementary, "T");
			$year_graduated_secondary = strtok($post->year_graduated_secondary, "T");
			$year_graduated_tertiary = strtok($post->year_graduated_tertiary, "T");
			$year_from_tertiary = strtok($post->year_from_tertiary, "T");
			$year_to_tertiary = strtok($post->year_to_tertiary, "T");


			if($post->extention_name = ' ')
			{
				$extention_name = ' ';
			}
			else
			{
				$extention_name = $post->extention_name;
			}
			$personal = array(
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
				'citizenship' => $post->citizenship,
				'province' => $post->province
				);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('tblgrad_profile',$personal);
		
			$elementary = array(
				'school_name_elementary' => $post->school_name_elementary,
				'school_address_elementary' => $post->school_address_elementary,
				'year_graduated_elementary' => $year_graduated_elementary,
				'awards_received_elementary' => $post->awards_received_elementary
			);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('tblelementary', $elementary);
		
			$secondary = array(
				'school_name_secondary' => $post->school_name_secondary,
				'user_id' => $this->session->userdata('user_id'),
				'school_address_secondary' => $post->school_address_secondary,
				'year_graduated_secondary' => $post->year_graduated_secondary,
				'awards_received_secondary' => $post->awards_received_secondary
			);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('tblsecondary', $secondary);
		
			$tertiary = array(
			'academic_level_tertiary' => $post->academic_level_tertiary,
			'school_name_tertiary' => 'Mindanao University of Science and Technology',
			'school_address_tertiary' => 'CM Recto Lapasan, Cagayan de Oro City',
			'degree_tertiary' => $post->degree_tertiary,
			'year_from_tertiary' => $year_from_tertiary,
			'year_to_tertiary' => $year_to_tertiary,
			'year_graduated_tertiary' => $year_graduated_tertiary,
			'awards_received_tertiary' => $post->awards_received_tertiary,
			'thesis_project_tertiary' => $post->thesis_project_tertiary,
			'user_id' => $this->session->userdata('user_id')
			);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('tbltertiary', $tertiary);
			
			$update = array(
				'account_status' => 'done'
			);

			$this->db->where('user_id', $this->session->userdata('user_id'));
			return $this->db->update('tblstatus', $update);
			
			return true;
		}
		public function updateElementary($post)
		{
			$year_graduated_elementary = strtok($post->year_graduated_elementary, "T");

			$elementary = array(
				'school_name_elementary' => $post->school_name_elementary,
				'school_address_elementary' => $post->school_address_elementary,
				'year_graduated_elementary' => $year_graduated_elementary,
				'awards_received_elementary' => $post->awards_received_elementary
			);
			$this->db->where('elementary_id', $post->elementary_id);
			$this->db->update('tblelementary', $elementary);
			
			return $post;
		}
		public function updateSecondary($post)
		{
			$year_graduated_secondary = strtok($post->year_graduated_secondary, "T");

			$secondary = array(
				'school_name_secondary' => $post->school_name_secondary,
				'user_id' => $post->user_id,
				'school_address_secondary' => $post->school_address_secondary,
				'year_graduated_secondary' => $year_graduated_secondary,
				'awards_received_secondary' => $post->awards_received_secondary
			);
			$this->db->where('secondary_id', $post->secondary_id);
			$this->db->update('tblsecondary', $secondary);
			return true;
		}
		public function updateTertiary($post)
		{

			$year_from_tertiary = strtok($post->year_from_tertiary, "T");
			$year_to_tertiary = strtok($post->year_to_tertiary, "T");
			$year_graduated_tertiary = strtok($post->year_graduated_tertiary, "T");

			$tertiary = array(
			'academic_level_tertiary' => $post->academic_level_tertiary,
			'school_name_tertiary' => $post->school_name_tertiary,
			'school_address_tertiary' => $post->school_address_tertiary,
			'degree_tertiary' => $post->degree_tertiary,
			'year_from_tertiary' => $year_from_tertiary,
			'year_to_tertiary' => $year_to_tertiary,
			'year_graduated_tertiary' => $year_graduated_tertiary,
			'awards_received_tertiary' => $post->awards_received_tertiary,
			'thesis_project_tertiary' => $post->thesis_project_tertiary,
			'user_id' => $this->session->userdata('user_id')
			);
			$this->db->where('tertiary_id', $post->tertiary_id);
			$this->db->update('tbltertiary', $tertiary);
			
			return true;
		}
		public function updateAccountEmail($id)
		{
			$update = array(
				'email_status' => 'done'
			);

			$this->db->where('user_id', $id);
			return $this->db->update('tblstatus', $update);
		}
		public function updatePicture($data)
		{
			$pic = array(
				'picture' =>  $data['userfile']['file_name']
			);
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$data = $this->db->update('tblgrad_profile', $pic);
		}
		public function updateEmployment($post)
		{

			$queryDegreeId = "select degree_tertiary from tbltertiary where user_id = ".$this->session->userdata('user_id')."";
			$getDegreeId = $this->db->query($queryDegreeId)->result_object()[0];

			$obe = strtolower($post->employment_position);
			$queryObe = "select * from tblspecialization_obe where obe_name = '".$obe."' && course_id = ".$getDegreeId->degree_tertiary."";
			$getObe = $this->db->query($queryObe)->result_object();

			if(!$getObe == true)
			{
				$obe = array(
					'obe_name' => strtolower($post->employment_position),
					'course_id' => $getDegreeId->degree_tertiary,
					'others' => 'true'
				);

				$this->db->insert('tblspecialization_obe', $obe);
				$id = $this->db->insert_id();

				$queryRecent = "select obe_name from tblspecialization_obe where obe_id = ".$id."";
				$obeNAME = $this->db->query($queryRecent)->result_object()[0];
			}
			else
			{
				$queryOBEID = "select obe_name from tblspecialization_obe where obe_id = '".$post->employment_position."' || obe_name = '".$post->employment_position."' && course_id = ".$getDegreeId->degree_tertiary."";
				$obeNAME = $this->db->query($queryOBEID)->result_object()[0];
			}

			// $queryObeName = "select obe_name from tblspecialization_obe where obe_id = '".$post->obe_id."'";
			// $getObeName = $this->db->query($queryObeName)->result_object()[0];
			$empFrom = strtok($post->employment_duration_from, "T");
			$empTo= strtok($post->employment_duration_to, "T");

			$updateEmp = array(
				'company_name' => $post->company_name,
				'company_address' => $post->company_address,
				'company_country' => $post->company_country,
				'company_city' => $post->company_city,
				'company_business_type' => $post->company_business_type,
				'employment_sector' => $post->employment_sector,
				'employment_type' => $post->employment_type,
				'employment_position' => $obeNAME->obe_name,
				'employment_status' => $post->employment_status,
				'employment_salary' => $post->employment_salary,
				'employment_status' => $post->employment_status,
				'employment_duration_from' => $empFrom,
				'employment_duration_to' => $empTo,
				'user_id' => $this->session->userdata('user_id')
			);

				$this->db->where('employment_id', $post->employment_id);
				$this->db->update('tblemployment_record', $updateEmp);

				return true;
		}
		public function updateEvent($post)
		{
			$date = strtok($post->event_date, "T");

			$update = array(
				'event_title' => $post->event_title,
				'event_description' => $post->event_title,
				'event_date' => $date
			);

			$this->db->where('event_id', $post->event_id);
			$data = $this->db->update('tblevent', $update);

			if($data)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function updateNews($post)
		{
			$date = date("Y-m-d");

			$update = array(
				'news_title' => $post->news_title,
				'news_description' => $post->news_description,
				'news_date' => $date
			);

			$this->db->where('news_id', $post->news_id);
			$data = $this->db->update('tblnews', $update);

			if($data)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
 ?>