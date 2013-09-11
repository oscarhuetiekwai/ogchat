<?php

class User_model extends MY_Model {

	protected $_table = 'ogchat.tb_user';
	protected $primary_key = 'user_id';

	function validate_admin($username,$password)
	{
		$enc_password = $this->encode($password);
		$this->db->select('*');
		$this->db->from('ogchat.tb_user');
		$this->db->where('username', $username);
		$this->db->where('password', $enc_password);

		$query = $this->db->get();
		if($query->num_rows == 1)
		{
			return $query->row();
		}
		return false;
	}

	function encode($text)
	{
		$result = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));
		return trim(base64_encode($result));
	}
	
	function view_admin($id)
	{
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('user_id', $id);

		$query = $this->db->get();

		return $query->row();
	}
	
	function search_list($user_id, $searchData=array(), $per_page=null, $current_page=null)
	{
		if (isset($per_page) && isset($current_page) ){
			$this->db->limit($per_page, $current_page);
		}

		if(isset($searchData['search_username'])){
			$this->db->like('username', $searchData['search_username']);
		}

		//$this->db->join('tb_friend', 'tb_user.user_id = tb_friend.friend_id');	
		$this->db->where('tb_user.user_id !=', $user_id);
		

		$this->db->order_by('username', 'asc');
		//var_dump($this->db->last_query());
		return $this;
	}

}
?>