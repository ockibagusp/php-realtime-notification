<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('Notification_model');
    }

    public function index() {
        $notif = $this->Notification_model->getByUserID(1);
        $this->load->view('index', ['notif' => $notif]);
    }

    public function notif_all() {
        $notif_all = $this->Notification_model->getByUserID(1, false);
        echo json_encode($notif_all);
    }
    
}