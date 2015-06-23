<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//用户产品授权
class Module_4 extends CI_Controller {

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
            if( $nickname == "木谦" || strpos($mods,'module_4') || strpos($mods,'module_4') === 0 ) {
                $data['nickname'] = $nickname;
                $data['mods'] = $mods;
                $sql = "select * from give_prod_history order by date desc limit 20";
                $this->load->database('default');
                $query = $this->db->query($sql);
                $cnt = 0;
                $cnt = $query->num_rows;
                if($cnt >= 1) {
                    foreach($query->result() as $one) {
                        $data['res'][] = array(0 => $one->nickname, 1 => $one->prod_id, 2 => $one->days, 3 => $one->date, 4 => $one->unit_ids);
                    }
                }
                $this->load->view('/module/4', $data);
            } else {
                redirect('/no_auth');
            }
        } else {
            redirect('/login');
        }
	}

	public function giveProd() {
        $nickname = $this->session->userdata('nickname');
        $mods = $this->session->userdata('mods');

        if($nickname && $mods) {
            if( $nickname == "木谦" || strpos($mods,'module_4') || strpos($mods,'module_4') === 0 ) {
                $data['nickname'] = $nickname;
                $data['mods'] = $mods;

                $this->form_validation->set_rules('unit_ids', 'Unit_ids', 'required');
                $this->form_validation->set_rules('prod_id', 'Pord_id', 'required');
                $this->form_validation->set_rules('days', 'Days', 'required');
                if ($this->form_validation->run() == FALSE) {
                    redirect('/module_4/index');
                } else {
                    $unit_ids = $this ->input->post('unit_ids');
                    $prod_id = $this ->input->post('prod_id');
                    $days = $this ->input->post('days');

                    $php_dir = "/home/admin/lz-dante/lib/php";
                    $lib_dir = rtrim(dirname($php_dir),"/");
                    $base_dir = rtrim(dirname($lib_dir),"/");
                    $service_dir = "$base_dir/services";
                    $path = $php_dir . "/bin/";
                    ini_set('include_path', $service_dir . PATH_SEPARATOR . $php_dir . PATH_SEPARATOR . ini_get('include_path'));
                    require('core/bootstrap.inc.php');
                    $results = '';
                    $history = '';
                    $results_fail = '';
                    $unit_ids = explode("\n", $unit_ids);
                    foreach ($unit_ids as $i => $one) {
                        $check_flag = '';
                        $ret = '';
                        $unit_id = trim($one);
                        if($unit_id) {
                            $check_flag = _prod_check_presentation($unit_id, $prod_id);
                            if($check_flag !== true) {
                                $results_fail = $results_fail . $unit_id . "\n";
                            } else {
                                $ret = _prod_action_prod($unit_id, $prod_id, 5, $days, 0);
                                if($ret !== true) {
                                    $results_fail = $results_fail . $unit_id . "\n";
                                } else {
                                    $results = $results . $unit_id . "\n";
                                    $history = $history . $unit_id . ",";
                                }
                            }
                        }
                    }
                    $data['results'] = $results;
                    $data['results_fail'] = $results_fail;

                    $sql = "insert into give_prod_history(nickname,prod_id,days,unit_ids,date) values ('" .
                        $nickname . "','" . $prod_id . "','" . $days . "','" . $history . "','" . date('Y-m-d G:i:s') . "');";
                    $this->load->database('default');
                    $this->db->query($sql);

                    $this->load->view('/module/4_1', $data);
                }
            } else {
                redirect('/index');
            }
        } else {
            redirect('/login');
        }
	}
}
