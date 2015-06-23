<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//魔镜埋点表格维护功能
class Mojing_1 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

	public function index() {
        $nickname = $this->session->userdata('nickname');
        $mods = $this->session->userdata('mods');

        if($nickname && $mods) {
            if( $nickname == "木谦" || strpos($mods,'mojing_1') || strpos($mods,'mojing_1') === 0 ) {
                $data['nickname'] = $nickname;
                $data['mods'] = $mods;

                $sql = "select * from lz_event_pinfo order by id desc";
                $this->load->database('mojing');
                $query_res = $this->db->query($sql);
                $cnt = 0;
                $cnt = $query_res->num_rows;
                if($cnt >= 1) {
                    foreach($query_res->result() as $one) {
                        $data['res'][] = array(0 => $one->id, 1 => $one->pname, 2 => $one->pid);
                    }
                }
                $sql = "select * from lz_event_info order by id desc";
                $query_res = $this->db->query($sql);
                $cnt = 0;
                $cnt = $query_res->num_rows;
                if($cnt >= 1) {
                    foreach($query_res->result() as $one) {
                        $data['res2'][] = array(0 => $one->id, 1 => $one->aid, 2 => $one->pid, 3 => $one->eid, 4 => $one->xid, 5 => $one->name, 6 => $one->info);
                    }
                }
                $this->load->view('mojing/1.php', $data);
            } else {
                redirect('/index');
            }
        } else {
            redirect('/no_auth');
        }
	}

	public function modTable() {
        $nickname = $this->session->userdata('nickname');
        $mods = $this->session->userdata('mods');

        if( $nickname == "木谦" || strpos($mods,'mojing_1') || strpos($mods,'mojing_1') === 0 ) {
            if($nickname && $mods) {
                $data['nickname'] = $nickname;
                $data['mods'] = $mods;

                $modSql = $this ->input->post('modSql');
                $this->load->database('mojing');
                $sqls = explode("\n", $modSql);

                foreach ($sqls as $i => $one) {
                    $sql = trim($one);
                    if($sql) {
                        $this->db->query($sql);
                    }
                }
                redirect('/mojing_1');
            } else {
                redirect('/login');
            }
        } else {
            redirect('/index');
        }
	}
}
