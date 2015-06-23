<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myinfo extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["id"]) && isset($_POST["pid"]) && isset($_POST["ts"]) && isset($_POST["tk"])) {
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];

                if(md5($ts . "123qwe!@#") == $tk) {
                    $this->load->database('default');
                    $sql = "select nick from user where id='" . $_POST["pid"] . "' limit 1";
                    $query = $this->db->query($sql);
                    $cnt = $query->num_rows;
                    $nick = ""; 
                    if($cnt == 1) {
                        foreach($query->result() as $one) {
                            $nick = $one->nick;
                        }
                    }

                    $res = array('nick'=>$nick, 'all'=>'0', 'firstfail'=>'0', 'lastfail'=>'0', 'suc'=>'0');
                    $sql = "select count(*) as count,status from orders where sid=" . $_POST["id"] . " and status>0 group by status";
                    $query = $this->db->query($sql);

                    if($cnt > 0) {
                        foreach($query->result() as $one) {
                            switch ($one->status) {
                                case 3:
                                    $res['firstfail'] = $one->count;
                                    break;
                                case 6:
                                    $res['lastfail'] = $one->count;
                                    break;
                                case 7:
                                    $res['suc'] = $one->count;
                                    break;
                            }
                            $res['all'] += $one->count;
                        }
                    }

                    $res['res'] = 200;
                    echo json_encode($res);
                    return;
                }
            }
        }

        $res = array('res'=>500, 'reason'=>'Wrong param!');
        echo json_encode($res);
    }

}
