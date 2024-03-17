<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $this->load->view('login_view');
    }

    public function process() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->user_model->login($email, $password);

        if($user) {
            // Set session data
            $this->session->set_userdata('user_id', $user->id);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('login');
    }
}
