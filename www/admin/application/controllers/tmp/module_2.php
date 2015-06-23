<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//用户名、id互查
class Module_2 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

	public function index() {
        $nickname = $this->session->userdata('nickname');
        $mods = $this->session->userdata('mods');

        if( $nickname == "木谦" || strpos($mods,'module_2') || strpos($mods,'module_2') === 0 ) {
            if($nickname && $mods) {
                $data['nickname'] = $nickname;
                $data['mods'] = $mods;
                $this->load->view('/module/2', $data);
            } else {
                redirect('/no_auth');
            }
        } else {
            redirect('/index');
        }
	}

	public function convertNickname() {
        $nickname = $this->session->userdata('nickname');
        $mods = $this->session->userdata('mods');

        if( $nickname == "木谦" || strpos($mods,'module_2') || strpos($mods,'module_2') === 0 ) {
            if($nickname && $mods) {
                $nicknames = $this ->input->post('nicknames');
                $data['nickname'] = $nickname;
                $data['mods'] = $mods;

                $this->form_validation->set_rules('nicknames', 'Nicknames', 'required');
                if ($this->form_validation->run() == FALSE) {
                    redirect('/module_2/index');
                } else {
                    $results = '';
                    $results_fail = '';
                    $nicknames = explode("\n", $nicknames);
                    $this->load->database("main");
                    foreach ($nicknames as $i => $one) {
                        $name = trim($one);
                        if($name !== "") {
                            $sql = "select a.unit_id from lz_unit_taobao_new as a, lz_shop_info_new as b where nick_name = '{$name}' and a.user_id = b.user_id limit 1";
                            $query_user = $this->db->query($sql);
                            $cnt = 0;
                            $cnt = $query_user->num_rows;
                            if($cnt == 1) {
                                foreach($query_user->result() as $one) {
                                    $results = $results . $one->unit_id . "\n";
                                }
                            } else {
                                $results_fail = $results_fail . $name . "\n";
                            }
                        }
                    }
                    $data['results'] = $results;
                    $data['results_fail'] = $results_fail;
                    $this->load->view('/module/2_1', $data);
                }
            } else {
                redirect('/login');
            }
        } else {
            redirect('/index');
        }
	}

	public function convertUnit_id() {
        $nickname = $this->session->userdata('nickname');
        $mods = $this->session->userdata('mods');

        if( $nickname == "木谦" || strpos($mods,'module_2') || strpos($mods,'module_2') === 0 ) {
            if($nickname && $mods) {
                $unit_ids = $this ->input->post('unit_ids');
                $data['nickname'] = $nickname;
                $data['mods'] = $mods;

                $this->form_validation->set_rules('unit_ids', 'Unit_ids', 'required');
                if ($this->form_validation->run() == FALSE) {
                    redirect('/module_2/index');
                } else {
                    $results = '';
                    $results_fail = '';
                    $unit_ids = explode("\n", $unit_ids);
                    $this->load->database("main");
                    foreach ($unit_ids as $i => $one) {
                        $unit_id = trim($one);
                        if($unit_id !== "") {
                            $sql = "select visitor_id from lz_unit_taobao where unit_id = '{$unit_id}' limit 1";
                            $query_user = $this->db->query($sql);
                            $cnt = 0;
                            $cnt = $query_user->num_rows;
                            if($cnt == 1) {
                                foreach($query_user->result() as $one) {
                                    $results = $results . $one->visitor_id . "\n";
                                }
                            } else {
                                $results_fail = $results_fail . $unit_id . "\n";
                            }
                        }
                    }
                    $data['results'] = $results;
                    $data['results_fail'] = $results_fail;
                    $this->load->view('/module/2_1', $data);
                }
            } else {
                redirect('/login');
            }
        } else {
            redirect('/index');
        }
	}
}
