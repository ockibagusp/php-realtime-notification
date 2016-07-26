<?php

class Notification_model extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function getAll() {
        $query = $this->db->get('notification');
        return $query->result();
    }

    public function getByUserID($id, $last_notification_id=0, $limit=true) {
        // urutkan dari yang paling baru
        $this->db->order_by('timestamp', 'DESC');
        if ($limit) {
            $this->db->from('notification');
            $this->db->where('user_id', $id);
            $this->db->where('id >', $last_notification_id);
            $this->db->limit(8);
            $query = $this->db->get();
        } else {
            $query = $this->db->get_where('notification', ['user_id' => $id]);
        }
        return $query->result_array();
    }

    public function getByUsername($username) {
    	$this->db->order_by('timestamp', 'DESC');
        $query = $this->db->get_where('notification', ['username' => $username], 10);
        return $query->result();
    }

    public function create() {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'message' => $this->input->post('message')
        );

        $this->db->insert('notification', $data);
    }
}