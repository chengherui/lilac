<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Querylist extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["id"]) && isset($_POST["ts"]) && isset($_POST["tk"]) && isset($_POST["status"])) {
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];
                $status = $_POST["status"];

                if(md5($ts."123qwe!@#") == $tk) {
                    $this->load->database('default');
                    if($status == 99) {
                        $sql2 = " and status>0 ";
                    } else if($status == 98)  {
                        $sql2 = " and (status=1 or status=4) ";
                    } else if($status == 97)  {
                        $sql2 = " and (status=3 or status=6) ";
                    } else if($status == 96)  {
                        $sql2 = " and (status=2 or status=5) ";
                    } else {
                        $sql2 = " and (status=7) ";
                    }
                    $sql = "select id,borrowername,borrowerphone,status,loanamount,create_time from orders where sid = '" . $_POST['id'] . "' " . $sql2 . " order by last_updated_time desc";
                    $query = $this->db->query($sql);
                    $cnt = 0;
                    $cnt = $query->num_rows;

                    echo json_encode($query->result());
                    return;
                }
            }
        }


        $res = array('res'=>500, 'reason'=>'Wrong param!');
        echo json_encode($res);
    }

}
