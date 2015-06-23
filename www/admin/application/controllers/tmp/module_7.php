<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//用户产品到期时间查询
class Module_7 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

	public function index() {
        $nickname = $this->session->userdata('nickname');
        $mods = $this->session->userdata('mods');

        if( $nickname == "木谦" || strpos($mods,'module_7') || strpos($mods,'module_7') === 0 ) {
            if($nickname && $mods) {
                $data['nickname'] = $nickname;
                $data['mods'] = $mods;
                $this->load->view('/module/7', $data);
            } else {
                redirect('/no_auth');
            }
        } else {
            redirect('/index');
        }
	}

	public function checkProd() {
        $nickname = $this->session->userdata('nickname');
        $mods = $this->session->userdata('mods');

        if( $nickname == "木谦" || strpos($mods,'module_7') || strpos($mods,'module_7') === 0 ) {
            if($nickname && $mods) {
                $data['nickname'] = $nickname;
                $data['mods'] = $mods;

                $this->form_validation->set_rules('unit_ids', 'Unit_ids', 'required');
                $this->form_validation->set_rules('prod_id', 'Pord_id', 'required');
                if ($this->form_validation->run() == FALSE) {
                    redirect('/module_7/index');
                } else {
                    $unit_ids = $this ->input->post('unit_ids');
                    $prod_id = $this ->input->post('prod_id');

                    $unit_ids = explode("\n", $unit_ids);
                    $data['res'] = array();
                    foreach ($unit_ids as $i => $one) {
                        $unit_id = trim($one);
                        if($unit_id) {
                            $sql = "select unit_id, from_unixtime(p_start_time + current_time_interval*86400) as t from lz_time where unit_id = " . $unit_id . " and prod_id = " . $prod_id;
                            $this->load->database('main');
                            $query_user = $this->db->query($sql);
                            $cnt = 0;
                            $cnt = $query_user->num_rows;
                            if($cnt >= 1) {
                                foreach($query_user->result() as $one) {
                                    $data['res'][] = array(0 => $one->unit_id, 1 => $one->t);
                                }
                            }
                        }
                    }
                    $this->load->view('/module/7_1', $data);
                }
            } else {
                redirect('/login');
            }
        } else {
            redirect('/index');
        }
	}
}
