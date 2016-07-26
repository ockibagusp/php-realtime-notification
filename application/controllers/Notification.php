<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Notification_model');
    }

    /**
     * Menyediakan informasi notifikasi baru untuk user yang login.
     * User_model->get_last_notif() mengembalikan id notifikasi lama, sehingga notifikasi baru
     * di dapat jika ada id yang lebih besar dari last_notif.
     *
     * Fungsi ini dipanggil secara berkala via AJAX.
     * @return json [array notifikasi]
     */
    public function index() {
        $last_notification_id = $this->User_model->get_last_notif()->last;
        $data = $this->Notification_model->getByUserID(
            $this->input->get('user_id'), # di dapat dari HTTP GET
            $last_notification_id
        );
        echo json_encode($data);
    } 

    public function create() {
        if ("POST" === $this->input->server('REQUEST_METHOD')) {
            $this->Notification_model->create();
        }
    }
}