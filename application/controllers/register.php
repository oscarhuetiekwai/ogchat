<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->permission->is_logged_in();
		//load model
		$this->load->model('user_model');
		$this->load->helper('url');
	}

	//load to view
	function index()
	{
		$data = array();
		$data['page'] = 'register';
	//	$data['main'] = 'register/index';
		$this->load->view('register/index',$data);
	}

	function add_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
		

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = preg_replace('/\s\s+/','', $password);

		if ($this->form_validation->run() == TRUE)
		{
			$email = $this->input->post('email');
			$password = $this->encode($password);
			$datetime = date('Y-m-d h:i:s');

			$data = array (
				'user_id'=>'',
				'username'=>$username,
				'password'=>$password,
				'email_address'=>$email,
				'online_status'=>0,
				'date_created'=>$datetime
			);

			if ($this->user_model->insert($data))
			{
				$this->session->set_flashdata('success', 'Your register have been successfully added');
				redirect("register/index");
			}
			else
			{
				$this->session->set_flashdata('error', 'Error. Please try again.');
				redirect("register/index");
			}
		}else{
			$data = array();
			$data['page'] = 'register';
			$this->load->view('register/index',$data);
		}
	}

	function encode($text)
	{
		$result = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));
		return trim(base64_encode($result));
	}


}//end of class
?>