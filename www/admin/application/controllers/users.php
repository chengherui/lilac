<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('business');
    }

    public function index() {
        $this->business->isLogin(); 
        $this->business->isAuthed("users"); 

        $results = array();

        $sql = "select user.id,loginname,nick,title,parentid,phone,last_updated_time,status from user,role where roleid=role.id order by last_updated_time desc";
        $this->load->database('default');
        $query_user = $this->db->query($sql);
        $cnt = 0;
        $cnt = $query_user->num_rows;
        if($cnt >= 1) {
            foreach($query_user->result() as $one) {
                $data['users'][] = array(0 => $one->id, 1 => $one->loginname, 2 => $one->nick, 3 => $one->title, 4 => $one->parentid, 5 => $one->phone, 6 => $one->last_updated_time, 7 => $one->status);
            }
        } else {
            $data = array();
        }
        $this->load->view('admin/users.php', $data);
    }

    public function userAdd() {
        $this->business->isLogin(); 
        $this->business->isAuthed("users"); 

        $name = $this ->input->post('loginname');
        $nick = $this ->input->post('nick');
        $passwd = $this ->input->post('passwd');
        $roleid = $this ->input->post('roleid');
        $phone = $this ->input->post('phone');
        $parentid = 0; 
        if($roleid == 4) {
            $parentid = $this ->input->post('parentid');
        }

        $sql = "insert into user(loginname, nick, passwd, roleid, phone, parentid) " .
                    "values('" . $name . "','" . $nick . "','" . md5($passwd) . "','" . $roleid . "','" . $phone . "','" . $parentid . "')";
        $this->load->database('default');
        $this->db->query($sql);
        redirect('/admin/users');
    }

	public function userUpdatePass() {
        $this->business->isLogin(); 
        $this->business->isAuthed("users"); 

        $name = $this ->input->post('loginname');
        $passwd = md5($this ->input->post('password'));

        $sql = "update user set passwd='" . $passwd . "' where loginname='" . $name . "' limit 1";
        $this->load->database('default');
        $this->db->query($sql);
        redirect('/admin/users');
	}

	public function userDelete() {
        $this->business->isLogin(); 
        $this->business->isAuthed("users"); 

        $name = $this ->input->post('name');

        $sql = "update user set status=0 where loginname='" . $name . "' limit 1";
        $this->load->database('default');
        $this->db->query($sql);
        redirect('/admin/users');
	}

	public function updateOrder() {
        $this->business->isLogin(); 
        $this->business->isAuthed("users"); 

        $id = $this ->input->post('id');
        $status = $this ->input->post('newstatus');
        $sql = "update orders set status='" . $status ."' where id='" . $id . "' limit 1";
        $this->load->database('default');
        $this->db->query($sql);
        redirect('/admin/orders');
	}
}
