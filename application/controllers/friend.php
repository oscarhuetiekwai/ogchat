<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//this controllar is proceed all the view and pagination
class Friend extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->permission->is_logged_in();
		//load model
		$this->load->helper('url');
		$this->load->model('friend_model');
		$this->load->model('user_model');
	}

	function index()
	{
		$data = array();
		$data['page'] = 'add_friend';
		$data['main'] = 'friend/index';
		$data['js_function'] = array('friend');
		$this->load->view('template/template',$data);
	}

	function request()
	{
		$data = array();
		$data['page'] = 'request';
		$user_id = $this->session->userdata('user_id'); 
		if($query = $this->friend_model->sort_pending_friend($user_id)->get_all())
		{
			$data['data_records'] = $query;
		} 
		$data['main'] = 'friend/request';
		$data['js_function'] = array('friend');
		$this->load->view('template/template',$data);
	}

	function ajax_add_friend()
	{
		$user_id = $this->input->post('user_id');
		$friend_id = $this->input->post('friend_id');
		$data = array (
			'user_id'=>$user_id,
			'friend_id'=>$friend_id,
			'friend_status'=>1
		);
		if($this->friend_model->insert($data)){
			$msg = "success";
			echo json_encode($msg);
		}
		else
		{
			$msg = "error";
			echo json_encode($msg);
		}
	}
	
	function ajax_accept_friend()
	{
		$user_id = $this->input->post('user_id');
		$friend_id = $this->input->post('friend_id');

		if($this->friend_model->update_by(array('user_id'=>$user_id,'friend_id'=>$friend_id),array('friend_status'=>2))){
			$msg = "success";
			echo json_encode($msg);
		}
		else
		{
			$msg = "error";
			echo json_encode($msg);
		}
	}

	function search_friend()
	{
		$user_id = $this->session->userdata('user_id');
		//set the search data
		$this->load->library('searchdata');

		$this->searchdata->_set();

		$content_data = array();

		//Pagination

		$config = $this->pagination_config();

		$config['base_url'] = site_url().'/friend/search_friend';

		$search_param = array();

		foreach($this->session->userdata('search') as $key => $value)
		{
			$search_param = $search_param + array($key=>$value);
		}

		$config['total_rows'] = count($this->user_model->search_list($user_id, $search_param, null, null)->get_all());
		$content_data['total_rows'] = count($this->user_model->search_list($user_id, $search_param, null, null)->get_all());

		$this->pagination->initialize($config);
		// end Pagination

		if($query = $this->user_model->search_list($user_id, $search_param, $config['per_page'], $this->uri->segment(3))->get_all())
		{
			$content_data['data_records'] = $query;
		}

		if($query = $this->friend_model->sort_user($user_id)->get_all())
		{
			$content_data['friend_records'] = $query;
		}

		if(isset( $search_param['search_username'])){
			$content_data['search_username'] = $search_param['search_username'];
		}

		$content_data['page'] = 'add_friend';
		$content_data['main'] = 'friend/index';
		$content_data['js_function'] = array('friend');
		$this->load->view('template/template', $content_data);
	}

	function pagination_config()
	{
		$this->load->library('pagination');
		$config['per_page'] =10;
		$config['num_links'] = 5;
		$config['first_link'] = false;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['last_link'] = false;
		$config['full_tag_open'] = '<div class="pagination pagination-centered"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		return $config;
	}


}//end of class
?>