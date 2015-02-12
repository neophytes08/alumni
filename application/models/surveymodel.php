<?php 

	
	class surveymodel extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		public function submitSurvey($post)
		{
			// getting the survey_year
			$querySurveyYearId = "select survey_year from tblsurvey where survey_id = '".$post->survey_id."' && survey_status = 'activate'";
			$getSurveyYearId = $this->db->query($querySurveyYearId)->result_object()[0];

			$queryYearName = "select year_name from tblyear where year_id = '".$getSurveyYearId->survey_year."'";
			$getYearName = $this->db->query($queryYearName)->result_object()[0];

			// getting the course id
			$queryCourseId = "select degree_tertiary from tbltertiary where user_id = ".$this->session->userdata('user_id')."";
			$getCourseId = $this->db->query($queryCourseId)->result_object()[0];

			// getting the year id
			$queryYearId = "select year_id from tblyear where year_name = '".$getYearName->year_name."'";
			$getYearId = $this->db->query($queryYearId)->result_object()[0];

			if($post->employed_status == 'no')
			{
				

				// update survey status

				$querySurveyStatus = "select * from tblsurvey_status where user_id = ".$this->session->userdata('user_id')." && survey_id = ".$post->survey_id."";
				$getSurveyStatus = $this->db->query($querySurveyStatus)->result_object();

				if($getSurveyStatus)
				{
					$survey_status = array(
						'user_id' => $this->session->userdata('user_id'),
						'status' => 'done',
						'year_id' => $getYearId->year_id,
						'survey_id' => $post->survey_id,
						'course_id' => $getCourseId->degree_tertiary
					);

					$this->db->where('user_id', $this->session->userdata('user_id'));
					$this->db->update('tblsurvey_status', $survey_status);
				}
				else
				{
					$survey_status = array(
						'user_id' => $this->session->userdata('user_id'),
						'status' => 'done',
						'year_id' => $getYearId->year_id,
						'survey_id' => $post->survey_id,
						'course_id' => $getCourseId->degree_tertiary
					);

					$this->db->insert('tblsurvey_status', $survey_status);
				}


				$bar = array(
					'employment_status' => 'unemployed',
					'survey_year' => $getYearName->year_name,
					'course_id' => $getCourseId->degree_tertiary
				);

				$this->db->insert('tblbargraph', $bar);

				$queryEmploymentRecord = "select * from tblemployment_record where user_id = ".$this->session->userdata('user_id')."";
				$getEmploymentRecord = $this->db->query($queryEmploymentRecord)->result_object();

				if($getEmploymentRecord)
				{	
					$employmentRecord = array(
						'employment_status' => 'unemployed'
					);

					$this->db->where('user_id', $this->session->userdata('user_id'));
					$this->db->update('tblemployment_record', $employmentRecord);
				}
				else
				{
					$employmentRecord = array(
						'employment_status' => 'unemployed',
						'user_id' => $this->session->userdata('user_id')
					);

					$this->db->insert('tblemployment_record', $employmentRecord);
				}
				// insert to table chart
					$queryEmployed = "select COUNT(bar_id) as employed from tblbargraph where employment_status = 'employed' && survey_year = ".$getYearName->year_name." && course_id = ".$getCourseId->degree_tertiary."";
					$getEmployed = $this->db->query($queryEmployed)->result_object()[0];

					$queryUnemployed = "select COUNT(bar_id) as unemployed from tblbargraph where employment_status = 'unemployed' && survey_year = ".$getYearName->year_name." && course_id = ".$getCourseId->degree_tertiary."";
					$getUnemployed = $this->db->query($queryUnemployed)->result_object()[0];

					$queryCoursename = " select course_name from tblcourse where course_id = ".$getCourseId->degree_tertiary."";
					$getCoursename = $this->db->query($queryCoursename)->result_object()[0];

					$querytableChart = "select * from tbltablechart where year = '".$getYearName->year_name."' && course = '".$getCoursename->course_name."'";
					$gettableChart = $this->db->query($querytableChart)->result_object();

					if($gettableChart)
					{
						// update
						$tableChart = array(
							'employed' => $getEmployed->employed,
							'unemployed' => $getUnemployed->unemployed
						);

						$updateTableChart = array(
							'year' => $getYearName->year_name,
							'course' => $getCoursename->course_name
						);

						$this->db->where($updateTableChart);
						$this->db->update('tbltablechart', $tableChart);
					}
					else
					{
						// insert
						$table = array(
							'year' => $getYearName->year_name,
							'course' => $getCoursename->course_name,
							'employed' => $getEmployed->employed,
							'unemployed' => $getUnemployed->unemployed
						);

						$this->db->insert('tbltablechart', $table);
					}
				return 1;
			}
			else if($post->employed_status == 'yes')
			{
				// update survey status

				$querySurveyStatus = "select * from tblsurvey_status where user_id = ".$this->session->userdata('user_id')." && survey_id = ".$post->survey_id."";
				$getSurveyStatus = $this->db->query($querySurveyStatus)->result_object();

				

				if($getSurveyStatus)
				{
					$survey_status = array(
						'user_id' => $this->session->userdata('user_id'),
						'status' => 'done',
						'year_id' => $getYearId->year_id,
						'survey_id' => $post->survey_id,
						'course_id' => $getCourseId->degree_tertiary
					);

					$this->db->where('user_id', $this->session->userdata('user_id'));
					$this->db->update('tblsurvey_status', $survey_status);
				}
				else
				{
					$survey_status = array(
						'user_id' => $this->session->userdata('user_id'),
						'status' => 'done',
						'year_id' => $getYearId->year_id,
						'survey_id' => $post->survey_id,
						'course_id' => $getCourseId->degree_tertiary
					);
					$this->db->insert('tblsurvey_status', $survey_status);
				}

				// insert to tblemployed_status
				$survey = array(
					'user_id' => $this->session->userdata('user_id'),
					'emp_status' => 'employed',
					'year_name' => $getYearName->year_name
				);

				$this->db->insert('tblemployed_status', $survey);

				// insert or update to employment records
				$queryEmploymentRecord = "select * from tblemployment_record where user_id = ".$this->session->userdata('user_id')."";
				$getEmploymentRecord = $this->db->query($queryEmploymentRecord)->result_object();

				$employmentRecord = array(
					'employment_status' => 'employed',
					'company_name' => $post->company_name,
					'company_address' => $post->company_address,
					'company_country' => $post->company_country,
					'company_city' => $post->company_city,
					'company_business_type' => $post->company_business_type,
					'employment_sector' => $post->employment_sector,
					'employment_type' => $post->employment_type,
					'employment_position' => $post->obe_id,
					'employment_salary' => $post->employment_salary,
					'employment_duration_from' => $post->employment_duration_from,
					'employment_duration_to' => $post->employment_duration_to,
					'user_id' => $this->session->userdata('user_id')
				);

				if($getEmploymentRecord)
				{	
					$this->db->where('user_id', $this->session->userdata('user_id'));
					$this->db->update('tblemployment_record', $employmentRecord);
				}
				else
				{
					$this->db->insert('tblemployment_record', $employmentRecord);
				}

				// insert to bargraph
				$bar = array(
					'employment_status' => 'employed',
					'survey_year' => $getYearName->year_name,
					'course_id' => $getCourseId->degree_tertiary
				);
				$this->db->insert('tblbargraph', $bar);

				// insert to pie graph
				$queryObe = "select * from tblpiegraph where obe_id = ".$post->obe_id." && survey_year = ".$getYearName->year_name."";
				$data_obe = $this->db->query($queryObe)->result_object();

				if($data_obe)
				{
					$getObeCount = "select obe_count from tblpiegraph where obe_id = ".$post->obe_id." && survey_year = ".$getYearName->year_name."";
					$getQueryObe = $this->db->query($getObeCount)->result_object()[0];

					$dataObe = $getQueryObe->obe_count + 1;

					$updatedObe = array(
						'obe_count' => $dataObe
					);

					$where = array(
						'obe_id' => $post->obe_id,
						'survey_year' => $getYearName->year_name,
						'course_id' => $getCourseId->degree_tertiary
					);

					$this->db->where($where);
					$this->db->update('tblpiegraph', $updatedObe);

					
				}
				else
				{
					// insert pie graph
					$query = "select obe_name from tblspecialization_obe where obe_id = ".$post->obe_id."";
					$obe = $this->db->query($query)->result_object()[0];

					$pie = array(
						'obe_id' => $post->obe_id,
						'obe_answer' => $obe->obe_name,
						'obe_count' => 1,
						'survey_year' => $getYearName->year_name,
						'course_id' => $getCourseId->degree_tertiary
					);

					$this->db->insert('tblpiegraph', $pie);
				}
					// insert to table chart
					$queryEmployed = "select COUNT(bar_id) as employed from tblbargraph where employment_status = 'employed' && survey_year = ".$getYearName->year_name." && course_id = ".$getCourseId->degree_tertiary."";
					$getEmployed = $this->db->query($queryEmployed)->result_object()[0];

					$queryUnemployed = "select COUNT(bar_id) as unemployed from tblbargraph where employment_status = 'unemployed' && survey_year = ".$getYearName->year_name." && course_id = ".$getCourseId->degree_tertiary."";
					$getUnemployed = $this->db->query($queryUnemployed)->result_object()[0];

					$queryCoursename = " select course_name from tblcourse where course_id = ".$getCourseId->degree_tertiary."";
					$getCoursename = $this->db->query($queryCoursename)->result_object()[0];

					$querytableChart = "select * from tbltablechart where year = '".$getYearName->year_name."' && course = '".$getCoursename->course_name."'";
					$gettableChart = $this->db->query($querytableChart)->result_object();

					if($gettableChart)
					{
						// update
						$tableChart = array(
							'employed' => $getEmployed->employed,
							'unemployed' => $getUnemployed->unemployed
						);

						$updateTableChart = array(
							'year' => $getYearName->year_name,
							'course' => $getCoursename->course_name
						);

						$this->db->where($updateTableChart);
						$this->db->update('tbltablechart', $tableChart);
					}
					else
					{
						// insert
						$table = array(
							'year' => $getYearName->year_name,
							'course' => $getCoursename->course_name,
							'employed' => $getEmployed->employed,
							'unemployed' => $getUnemployed->unemployed
						);

						$this->db->insert('tbltablechart', $table);
					}
				return 1;
				
			}
			
		}
		public function yearSurvey()
		{
			$query_1 = "select a.survey_year,b.year_name from tblsurvey a inner join tblyear b where b.year_id = a.survey_year";
			$data_1 = $this->db->query($query_1)->result_object()[0];

			$query_2 = "select COUNT(bar_id) as unemployedCount from tblbargraph where employment_status = 'unemployed'";
			$data_2 = $this->db->query($query_2)->result_object()[0];

			$query_3 = "select COUNT(bar_id) as employedCount from tblbargraph where employment_status = 'employed'";
			$data_3 = $this->db->query($query_3)->result_object()[0];

			$stat = array(
				'unemployed' => $data_2,
				'employed' => $data_3,
				'year' => $data_1
			);
			return $stat;
		}
		public function getGenerate($post)
		{

			// $queryCourse = "select course_name from tblcourse where course_id = ".$post->course."";
			// $getCourse = $this->db->query($queryCourse)->result_object()[0];

			// $queryBar = "select * from tbltablechart where year = ".$post->year." && course = '".$getCourse->course_name."'";
			// $getBar = $this->db->query($queryBar)->result_object();

			// $queryPie = " select a.obe_id,a.obe_answer,a.obe_count,b.obe_name from tblpiegraph a inner join tblspecialization_obe b where b.obe_id = a.obe_id && a.survey_year = ".$post->year." && a.course_id = ".$post->course."";
			// $getPie = $this->db->query($queryPie)->result_object();
			

			// $queryLine = "select * from tbltablechart where course = '".$getCourse->course_name."'";
			// $getLine = $this->db->query($queryLine)->result_object();

			// if($getBar)
			// {
			// 	$stat = array(
			// 	'barResult' => $getBar[0],
			// 	'pieResult' => $getPie,
			// 	'lineResult' => $getLine
			// 	);
			// 	return $stat;
			// }
			// else
			// {
			// 	return 0;
			// }

			$queryBatchMale = "select b.year_graduated_tertiary, COUNT(b.user_id) as batchCount from tblgrad_profile a inner join tbltertiary b where b.user_id = a.user_id && a.gender = 'Male' && b.year_graduated_tertiary = ".$post->year."";
			$getBatchMale = $this->db->query($queryBatchMale)->result_object()[0];

			$queryBatchFemale = "select COUNT(b.user_id) as batchCount from tblgrad_profile a inner join tbltertiary b where b.user_id = a.user_id && a.gender = 'Female' && b.year_graduated_tertiary = ".$post->year."";
			$getBatchFemale = $this->db->query($queryBatchFemale)->result_object()[0];

			$batch = array(
				'male' => $getBatchMale->batchCount[0],
				'female' => $getBatchFemale->batchCount[0],
				'year' => $getBatchMale->year_graduated_tertiary
			);

			return $batch;
		}
		public function gettableChart()
		{
			$result = array();
			$queryYear = "select year_graduated_tertiary from tbltertiary group by year_graduated_tertiary";
			$year = $this->db->query($queryYear)->result_object();

 			$size = sizeof($year);

			for($x = 0; $x < $size; $x++) {
				$queryBatchMale = "select b.year_graduated_tertiary, COUNT(*) as batchCount from tblgrad_profile a inner join tbltertiary b where b.user_id = a.user_id && a.gender = 'Male' && b.year_graduated_tertiary = '".$year[$x]->year_graduated_tertiary."'";
				$getBatchMale = $this->db->query($queryBatchMale)->result_object()[0];

				$queryBatchFemale = "select COUNT(*) as batchCount from tblgrad_profile a inner join tbltertiary b where b.user_id = a.user_id && a.gender = 'Female' && b.year_graduated_tertiary = '".$year[$x]->year_graduated_tertiary."'";
				$getBatchFemale = $this->db->query($queryBatchFemale)->result_object()[0];

				$batchData = array(
					'year' => $getBatchMale->year_graduated_tertiary,
					'male' => $getBatchMale->batchCount,
					'female' => $getBatchFemale->batchCount
				);

				array_push($result, $batchData);
			}

			return $result;
			
			
		}
		public function getAllSurveyYear($post)
		{
			// return var_dump($post);

			$queryBar = "select * from tbltablechart where course = '".$post->course."'";
			$getBar = $this->db->query($queryBar)->result_object();

			if($getBar)
			{
				return $getBar;
			}
			else
			{
				return 0;
			}
		}
		public function getSurveyCount()
		{

			$queryCourse = "select degree_tertiary from tbltertiary where user_id = ".$this->session->userdata('user_id')."";
			$getCourse = $this->db->query($queryCourse)->result_object()[0];
			
			$querySurveyCount = "select COUNT(course_id) as countSurvey from tblsurvey where course_id = ".$getCourse->degree_tertiary."";
			$getSurveyCount = $this->db->query($querySurveyCount)->result_object()[0];

			$queryMySuryvey = "select COUNT(user_id) as countMySurvey from tblsurvey_status where user_id = ".$this->session->userdata('user_id')."";
			$getMySurvey = $this->db->query($queryMySuryvey)->result_object()[0];

			$count = array(
				'countedSurvey' => $getSurveyCount,
				'countedMySurvey' => $getMySurvey
			);

			return $count;
		}
	}
 ?>