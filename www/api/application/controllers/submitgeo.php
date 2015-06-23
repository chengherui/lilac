<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submitgeo extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["ts"]) && isset($_POST["tk"]) && isset($_POST["id"]) && isset($_POST["geoinfo"])) {
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];

                if(md5($ts."123qwe!@#") == $tk) {
                    $sql = "update orders set geoinfo='"  . $_POST['geoinfo'] . "' where id=" . $_POST['id'];
                    $this->load->database('default');
                    $query = $this->db->query($sql);

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
