<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('business');
    }

    public function index() {
        $this->business->isLogin(); 

        $nickname = $this->session->userdata('nickname');
        $name = $this->session->userdata('name');
        $mods = $this->session->userdata('mods');
        $title = $this->session->userdata('title');
        $data['nickname'] = $nickname;
        $data['name'] = $nickname;
        $data['mods'] = $mods;
        $data['title'] = $title;

        $this->load->view('/account.php', $data);
    }

    public function userMod() {
        $this->business->isLogin(); 

        $name = $this->session->userdata('name');
        $password = $this ->input->post('n_password');
        //$r_password = $this ->input->post('rn_password');
        $sql = "update user set passwd = '" . md5($password) . "' where loginname = '" . $name . "';";
        $this->load->database('default');
        $this->db->query($sql);
        redirect('/admin/login');
    }
}
