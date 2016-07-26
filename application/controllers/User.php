<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function update_last_notif() {
        $this->User_model->update_last_notif(
            $this->input->get('notif_id')
        );
        echo json_encode([
            'status' => 200,
            'message' => 'ok'
        ]);
    }
    
}