<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('business');
    }

    public function index() {
        $this->business->isLogin(); 

        $nickname = $this->session->userdata('nickname');
        $mods = $this->session->userdata('mods');
        $title = $this->session->userdata('title');
        $data['nickname'] = $nickname;
        $data['mods'] = $mods;
        $data['title'] = $title;
        $this->load->view('index', $data);
    }
}
