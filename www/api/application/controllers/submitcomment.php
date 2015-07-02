<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submitcomment extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["ts"]) && isset($_POST["tk"]) && isset($_POST["id"]) && isset($_POST["description"])) {
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];
                $id = $_POST["id"];
                $description = $_POST["description"];

                if(md5($ts."123qwe!@#") == $tk) {
                    $sql = "insert into comments (`id`,`description`) values ('" . $id . "','" . $description . "') ON DUPLICATE KEY UPDATE `description`='" . $description . "'";
                    $this->load->database('default');
                    $query = $this->db->query($sql);

                    $sql = "update orders set status=1 where id='" . $id . "' and status=0"; 
                    $this->db->query($sql);

                    $res = array('res'=>200);
                    echo json_encode($res);
                    return;
                }
            }
        }

        $res = array('res'=>500, 'reason'=>'Wrong param!');
        echo json_encode($res);
    }
}
