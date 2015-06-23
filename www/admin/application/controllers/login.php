<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $nick = $this->session->userdata('loginname');
        $mods = $this->session->userdata('mods');

        if($nick && $mods) {
            redirect('/admin/index');
        } else {
            $this->load->view('login/login');
        }
    }

    public function check_login() {
        $loginname = $this ->input->post('login_name');
        $passwd = $this ->input->post('login_password');

        $this->form_validation->set_rules('login_name', 'login_name', 'required');
        $this->form_validation->set_rules('login_password', 'login_password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/login');
        } else {
            $sql = "select user.id,nick,parentid,roleid,title,passwd from user,role where loginname = '{$loginname}' and roleid=role.id and status=1 limit 1";
            $this->load->database('default');

            $query = $this->db->query($sql);
            $cnt = 0;
            $cnt = $query->num_rows;
            if($cnt == 1) {
                foreach($query->result() as $one) {
                    $passwd_db = $one->passwd;
                    $nick = $one->nick;
                    $parentid = $one->parentid;
                    $roleid = $one->roleid;
                    $title = $one->title;
                    $id = $one->id;
                }
                if(md5($passwd) == $passwd_db) {
                    $userInfo = array(
                        'name' => $loginname,
                        'passwd' => $passwd_db,
                        'nickname' => $nick,
                        'parentid' => $parentid,
                        'roleid' => $roleid,
                        'id' => $id,
                        'title' => $title,
                    );
                    $this->session->set_userdata($userInfo);
                    redirect('/admin/index');
                } else {
                    redirect('/admin/login');
                }
            } else {
                redirect('/admin/login');
            }
            redirect('/admin/index');
        }
    }
}
