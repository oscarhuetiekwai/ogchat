<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//This controllar is proceed profile setting
class Profile_setting extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
      	$this->permission->is_logged_in();
		//$this->permission->superadmin_admin_only();
		$this->load->model('user_model');

    }

	function index()
	{
		$id = $this->session->userdata('user_id');

		$data = array();

		if($query = $this->user_model->view_admin($id))
		{
			$data['admin_records'] = $query;
		}
		$data['page'] = 'profile_setting';
		$data['main'] = 'profile/index';
		$this->load->view('template/template',$data);
	}

	function check_admin_exist()
	{
			$id = ($this->input->post('admin_id'));
			$admin_username = trim($this->input->post('admin_username'));

			if(!$this->user_model->check_admin_exist($admin_username,$id))
			{
				$this->form_validation->set_message('check_admin_exist', 'The %s already exist.');
				return false;
			}

			return true;
	}

	## profile Setting
	function update_profile()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');

		if($this->input->post('password'))
		{
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]');
		}
		$id = $this->session->userdata('user_id');
		//$id = "1";
		$hash = md5($id.SECRETTOKEN);
		if ($this->form_validation->run() == FALSE)
		{
			$data = array();
			$data['page'] = 'profile_setting';
			if($query = $this->user_model->view_admin($id))
			{
				$data['admin_records'] = $query;
			}

			//$data['page'] = 'admin_profile';
			$data['main'] = 'profile/index';
			$this->load->view('template/template',$data);

		}
		else
		{

			$upload = $this->input->post('upload');
			$upload_file_name = '';
			$config['upload_path'] = './assets/img/user_profile/';
			$config['allowed_types'] = 'gif|jpg|png|GIF|JPG|PNG';
			$config['max_size']	= 1000000;
			$config['encrypt_name']  = TRUE;

			$this->load->library('upload', $config);

			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$password = $this->encode($password);
			$data = array('password'=>$password,'email_address'=>$email,'username'=>$username);

			if($this->upload->do_upload('upload'))
			{
				$upload_data = $this->upload->data();
				$upload_file_name = $upload_data['file_name'];
				$data = array('photo'=>$upload_file_name) + $data ;
			}

			if ($this->user_model->update($id,$data))
			{
				$this->session->set_flashdata('success', 'Your profile setting have been successfully updated');
				redirect("profile_setting/index/$id/$hash");
			}
			else
			{
				$this->session->set_flashdata('error', 'Error. Please try again.');
				redirect("profile_setting/index/$id/$hash");
			}
		}
	}


	function encode($text)
	{
		$result = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));
		return trim(base64_encode($result));
	}


}//end of class
?>