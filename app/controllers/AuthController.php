<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->library('session');
        $this->call->helper('url'); // <--- Idagdag ito para gumana ang site_url()
        $this->call->model('User_model');
    }

    public function login() {
        if ($this->session->has_userdata('logged_in')) {
            redirect('products');
        }
        $this->call->view('auth/login');
    }

    public function process_login() {
        $username = $this->io->post('username');
        $password = $this->io->post('password');

        $user = $this->User_model->get_user_by_username($username);

        if ($user && $password === $user['password']) {
            $this->session->set_userdata([
                'logged_in' => true,
                'username'  => $user['username']
            ]);
            redirect('products');
        } else {
            $data['error'] = 'Invalid Username or Password';
            $this->call->view('auth/login', $data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}