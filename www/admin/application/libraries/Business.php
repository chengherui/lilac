<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Business {

    public function test() {
        echo "test";
    }

    public function isLogin() {
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->load->helper('url');

        $name = $CI->session->userdata('name');

        if($name) {
            return;
        } else {
            redirect('/admin/login');
        }
    }

    public function isAuthed($theModule) {
        $CI =& get_instance();
        $CI->load->library('session');

        $role = $CI->session->userdata('roleid');
        $id = $CI->session->userdata('id');

        if( ($role == "4") || ($role == "3" && $theModule == "users") ) {
            redirect('/admin/no_auth');
        }
        $status = 0;
        $flag = false;
        if($role == "3" && ($theModule == "detail" || $theModule == "verify")) {
            $flag = true;
            $CI->load->database('default');
            $sql = "select orders.id,orders.status from orders,statusinfo where orders.pid='" . $id . "' and orders.status>0 and orders.status=statusinfo.status order by last_updated_time desc";
            $query = $CI->db->query($sql);
            $cnt = $query->num_rows;
            if($cnt >= 1 && isset($_GET["id"])) {
                foreach($query->result() as $one) {
                    if($one->id == $_GET["id"]) {
                        $status = $one->status;
                        $flag = false;
                        break;
                    }
                }
            }
            if($flag) {
                redirect('/admin/no_auth');
            }
        } else if($role <= 2 && $theModule == "verify") {
            $CI->load->database('default');
            $sql = "select status from orders where id='" . $_GET["id"] . "'";
            $query = $CI->db->query($sql);
            $cnt = $query->num_rows;
            if($cnt == 1) {
                foreach($query->result() as $one) {
                    $status = $one->status;
                    break;
                }
            }
        }
        if($role == "3" && $theModule == "verify" && $status != 1) {
            redirect('/admin/detail/index?id=' . $_GET["id"]);
        } else if($role <= 2 && $theModule == "verify" && $status != 4) { 
            redirect('/admin/detail/index?id=' . $_GET["id"]);
        }
    }

    function queryOrders($status) {
        $CI =& get_instance();
        $CI->load->library('session');
        $CI->load->database('default');
        $role = $CI->session->userdata('roleid');
        $id = $CI->session->userdata('id');
        
        if($status == "99") {
            $sql2 = " orders.status>0 ";
        } else {
            $sql2 = " orders.status=" . $status;
        }
        if($role <= 2) {
            $sql = "select orders.id,borrowername,borrowerphone,info,loanamount,create_time,last_updated_time from orders,statusinfo where " . $sql2 . " and orders.status=statusinfo.status order by last_updated_time desc";
        } else if ($role == 3) {
            $sql = "select orders.id,borrowername,borrowerphone,info,loanamount,create_time,last_updated_time from orders,statusinfo where orders.pid='" . $id . "' and " . $sql2 . " and orders.status=statusinfo.status order by last_updated_time desc";
        }
        $query = $CI->db->query($sql);
        return $query;
    }
}
