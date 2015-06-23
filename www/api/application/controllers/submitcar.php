<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submitcar extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $keys = array("id","carid","mileage","cartype","fueltype","carbrand","emissions","buytime","buyprice","assessedprice","assessedagency");

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["ts"]) && isset($_POST["tk"]) && isset($_POST["id"])) {
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];
                $id = $_POST["id"];

                if(md5($ts."123qwe!@#") == $tk) {
                    $sql1[] = "insert into cars (";
                    $sql2[] = ") values (";
                    $sql3[] = "";
                    $n = 0;
                    foreach($_POST as $k => $v) {
                        if(in_array($k, $keys)) {
                            if($n == 0) {
                                $sql1[] = "`" . $k . "`";
                                $sql2[] = "'" . $v . "'";
                                $sql3[] = "`" . $k . "`=" . "'" . $v . "'";
                            } else {
                                $sql1[] = ",`" . $k . "`";
                                $sql2[] = ",'" . $v . "'";
                                $sql3[] = ",`" . $k . "`=" . "'" . $v . "'";
                            }
                            $n++;
                        }
                    }
                    $sql = implode("", $sql1) . implode("", $sql2) . ") ON DUPLICATE KEY UPDATE " . implode("", $sql3);
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
