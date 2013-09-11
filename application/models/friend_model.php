<?php

class Friend_model extends MY_Model {

	protected $_table = 'tb_friend';
	//protected $primary_key = 'user_id';

	function sort_friend($user_id){
		$this->db->join('tb_user', 'tb_friend.friend_id = tb_user.user_id');
		$this->db->where('tb_friend.user_id', $user_id);
		## only get already become friend ##
		$this->db->where('tb_friend.friend_status', 2);
		$this->db->order_by('tb_user.online_status',"desc");
		return $this;
	}
	
	## get pending ##
	function sort_pending_friend($user_id){
		$this->db->join('tb_user', 'tb_friend.user_id = tb_user.user_id');
		$this->db->where('tb_friend.friend_id', $user_id);
		## only get already become friend ##
		$this->db->where('tb_friend.friend_status', 1);
		$this->db->order_by('tb_user.username',"asc");
		return $this;
	}

	function sort_user($user_id){
		$this->db->where('tb_friend.user_id', $user_id);
		return $this;
	}
	
	function sort_pending_user($user_id){
		$this->db->where('tb_friend.user_id', $user_id);
		$this->db->where('tb_friend.friend_status', 1);
		return $this;
	}

}
?>