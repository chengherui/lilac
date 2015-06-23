<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Queryinfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["ts"]) && isset($_POST["tk"]) && isset($_POST["id"]) && isset($_POST["type"])) {
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];
                $id = $_POST["id"];
                $type = $_POST["type"];

                if(md5($ts."123qwe!@#") == $tk) {
                    $sql = "select * from " . $type . " where id='" . $id . "'";
                    $this->load->database('default');
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
