<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Updateorder extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["opasswd"]) && isset($_POST["npasswd"]) && isset($_POST["id"]) && isset($_POST["ts"]) && isset($_POST["tk"])) {
                $id = $_POST["id"];
                $passwd = $_POST["opasswd"];
                $npasswd = $_POST["npasswd"];
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];

                if(md5($ts."123qwe!@#") == $tk) {
                    $this->load->database('default');
                    $sql = "select passwd from user where id='{$id}' limit 1";
                    $query = $this->db->query($sql);
                    $cnt = 0;
                    $cnt = $query->num_rows;

                    if($cnt == 1) {
                        foreach($query->result() as $one) {
                            $passwd_db = $one->passwd;
                            if($passwd == $passwd_db) {
                                $sql = "update user set passwd='{$npasswd}' where id='{$id}' limit 1";
                                $this->db->query($sql);
                                $res = array('res'=>200);
                                echo json_encode($res);
                                return;
                            }
                        }
                    }
                }
            }
        }

        $res = array('res'=>500, 'reason'=>'Wrong param!');
        echo json_encode($res);
    }
}
