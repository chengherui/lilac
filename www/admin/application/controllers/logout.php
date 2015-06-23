<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        $unset_items = array('name' => '', 'nickname' => '','mods'=>'');
        $this->session->unset_userdata($unset_items);
        redirect('/admin');
    }
}

