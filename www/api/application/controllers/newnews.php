<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newnews extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["lts"]) && isset($_POST["id"]) && isset($_POST["ts"]) && isset($_POST["tk"])) {
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];
                $lts = $_POST["lts"] / 1000;

                if(md5($ts."123qwe!@#") == $tk) {
                    $this->load->database('default');
                    $sql = "select count(*) as cnt from news where oid in (select id from orders where sid='" . $_POST["id"] . "') and UNIX_TIMESTAMP(create_time) > '" . $lts . "' order by create_time desc";
                    $query = $this->db->query($sql);
                    $cnt = $query->num_rows;
                    if($cnt == 1) {
                        foreach($query->result() as $one) {
                            $res = array('res'=>200, 'msgcnt'=>$one->cnt);
                            echo json_encode($res);
                            return;
                        }
                    }
                }
            }
        }

        $res = array('res'=>500, 'reason'=>'Wrong param!');
        echo json_encode($res);
    }

}
