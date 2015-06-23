<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newlist extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["id"]) && isset($_POST["ts"]) && isset($_POST["tk"])) {
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];

                if(md5($ts."123qwe!@#") == $tk) {
                    $this->load->database('default');
                    $sql = "select * from news where oid='" . $_POST["id"] . "' order by create_time desc";
                    $query = $this->db->query($sql);
                    echo json_encode($query->result());
                    return;
                }
            }
        }

        $res = array('res'=>500, 'reason'=>'Wrong param!');
        echo json_encode($res);
    }

}
