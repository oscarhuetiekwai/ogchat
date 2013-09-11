<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//this controllar is proceed all the view and pagination
class Block extends CI_Controller {

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
		$data['page'] = 'block';
		$user_id = $this->session->userdata('user_id'); 
		if($query = $this->friend_model->sort_friend($user_id)->get_all())
		{
			$data['data_record'] = $query;
		} 
		$data['main'] = 'block/index';
		$data['js_function'] = array('friend');
		$this->load->view('template/template',$data);
	}

	## Delete notification ##
	function ajax_delete_row()
	{
		$user_id = $this->input->post('user_id');
		$friend_id = $this->input->post('friend_id');

		if($this->friend_model->delete_by( array('user_id'=>$user_id,'friend_id'=>$friend_id))){
			$msg = "success";
			echo json_encode($msg);
		}
		else
		{
			$msg = "error";
			echo json_encode($msg);
		}
	}
}//end of class
?>