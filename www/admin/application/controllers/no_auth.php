<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class No_auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $nickname = $this->session->userdata('nickname');
        $mods = $this->session->userdata('mods');

        if($nickname) {
            $data['nickname'] = $nickname;
            $this->load->view('no_auth', $data);
        } else {
            redirect('/admin/login');
        }
    }
}
