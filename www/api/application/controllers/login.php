<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["token"]) && isset($_POST["name"]) && isset($_POST["passwd"]) && isset($_POST["ts"]) && isset($_POST["tk"])) {
                $loginname = $_POST["name"];
                $passwd = $_POST["passwd"];
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];
                $token = $_POST["token"];

                if(md5($ts."123qwe!@#") == $tk) {
                    $this->load->database('default');
                    $sql = "select user.id as id, passwd, nick, parentid, role.id as roleid, title from user,role where loginname = '{$loginname}' and roleid=4 and roleid=role.id limit 1";
                    $query = $this->db->query($sql);
                    $cnt = 0;
                    $cnt = $query->num_rows;

                    if($cnt == 1) {
                        foreach($query->result() as $one) {
                            $id = $one->id;
                            $passwd_db = $one->passwd;
                            $nick = $one->nick;
                            $parentid = $one->parentid;
                            $roleid = $one->roleid;
                            $title = $one->title;
                            if($passwd == $passwd_db) {
                                $sql = "update user set token='{$token}' where id='{$id}' limit 1";
                                $this->db->query($sql);
                                $one->res = 200;
                                echo json_encode($one);
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
