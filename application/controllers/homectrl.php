<?php 

	
	class homectrl extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('googlemaps');
			$this->load->model('listmodel');
			$this->load->model('updatemodel');
		}
		public function show_login($show_error = false)
		{
			redirect(base_url('index.php/loginctrl/'),"refresh");
		}
		public function admin()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				$this->load->view('admin.php');
				
			}
			else
			{
				$this->show_login(false);
			}
			
		}
		public function graduate()
		{
			if($this->session->userdata('isLoggedIn'))
			{
				// $address = $this->listmodel->getAddress();
				// $config['center'] = $address;
				// $config['zoom'] = 16;
				// $this->googlemaps->initialize($config);

				// $marker = array();
				// $marker['position'] = $address;
				// $this->googlemaps->add_marker($marker);
				// $data['map'] = $this->googlemaps->create_map();

				// $this->load->view('graduate', $data);
				$this->load->view('graduate');
				
			}
			else
			{
				$this->show_login(false);
			}
			
		}
		public function update_picture()
		{
		  	$config['upload_path'] = './assets/pictures/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '50000';
			$config['max_width']  = '2080';
			$config['max_height']  = '2080';

		    $this->load->library('upload', $config);
		    $data = array('userfile' => $this->upload->do_upload());

		    $name = $data['userfile']['name'];
		    $type = $data['userfile']['type'];
		    $size = $data['userfile']['size'];
		    $user_id = $this->session->userdata('id');

		     if( ! $this->upload->do_upload())
		    {
		        $data['error'] = array('error' => $this->upload->display_errors());
				redirect(base_url('/index.php/homectrl/graduate'),"refresh");
		    }   
		    else
		    {
		    	$data = array('userfile' => $this->upload->data());
		       	$this->updatemodel->updatePicture($data);
		       	echo 'Redirecting to Graduate Page....';
		       	redirect(base_url('/index.php/homectrl/graduate'),"refresh");
    		}
		}
	}
 ?>