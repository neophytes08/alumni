<?php 

	class loginmodel extends CI_Model
	{

		function __construct()
		{
			parent::__construct();
		}
		public function auth($post)
		{
		

			$user = (string)$post->username;
			$pass = (string)$post->password;

			$query = "select user_id, username, password, position from tbluser_acc where username = '".$user."' && password = '".$pass."'";
			$data = $this->db->query($query)->result_object();

			if($data)
			{
				if($data[0]->username == $user && $data[0]->password == $pass && $data[0]->position == 'admin')
				{
				
					$this->session->set_userdata( array(
						'user_id' => $data[0]->user_id,
						'username' => $data[0]->username,
						'isLoggedIn' => true
						)
					);
					return 1;
				}
				else if($data[0]->username == $user && $data[0]->password == $pass && $data[0]->position == 'user')
				{
					$this->session->set_userdata( array(
						'user_id' => $data[0]->user_id,
						'username' => $data[0]->username,
						'isLoggedIn' => true
						)
					);
					return 2;
				}
			}
			else
			{
				return 0;
			}
		}
	}
?>