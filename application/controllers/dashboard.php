<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//this controllar is proceed all the view and pagination
class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->model('friend_model');		
	}

	function index()
	{
		$data = array();
		$data['page'] = 'friend';
		$user_id = $this->session->userdata('user_id'); 
		if($query = $this->friend_model->sort_friend($user_id)->get_all())
		{
			$data['data_record'] = $query;
		} 
		$data['main'] = 'dashboard/index';
		$data['js_function'] = array('friend');
		$this->load->view('template/template',$data);
	}

	function load_status()
	{
		$data = array();
		$data['page'] = 'friend';
		$user_id = $this->session->userdata('user_id'); 
		if($query = $this->friend_model->sort_friend($user_id)->get_all())
		{
			$data['data_record'] = $query;
		} 
		$data['js_function'] = array('friend');
		$this->load->view('dashboard/load_status',$data);
	}
	
}//end of class
?>