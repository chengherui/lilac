<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submitbasic extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $keys = array("pid","sid","loanuse","repaysource","avgmonthbill","loanamount","loanmonths","creditoverview","borrowername","borrowerphone","borrowerage","borrowerid" ,"borrowermarrage","borrowersex","borroweraddr","borrowerwork","coborrowername","coborrowerphone","coborrowerage","coborrowerid","coborrowerrelation","coborrowersex","coborroweraddr","guarantorname","guarantorphone","guarantorage","guarantorid","guarantorrelation","guarantorsex","guarantoraddr");

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["ts"]) && isset($_POST["tk"]) && isset($_POST["pid"]) && isset($_POST["sid"])) {
                $ts = $_POST["ts"];
                $tk = $_POST["tk"];

                $this->load->database('default');
                if(md5($ts."123qwe!@#") == $tk) {
                    if(isset($_POST["id"]) && $_POST["id"] != "") {
                        $id = $_POST["id"];
                        $sql3 = "select status from orders where id=" . $id;
                        $query = $this->db->query($sql3);
                        $cnt = $query->num_rows;
                        $sql[] = "";
                        if($cnt == 1) {
                            foreach($query->result() as $one) {
                                $status = $one->status;
                                if($status == 2) {
                                    $sql[] = " `status`='1'";
                                } else {
                                    $sql[] = " `status`='4'";
                                }
                            }
                        } else {
                            $res = array('res'=>500, 'reason'=>'Wrong param!');
                            echo json_encode($res);
                        }

                        foreach($_POST as $k => $v) {
                            if(in_array($k, $keys)) {
                                 $sql[] = ",`" . $k . "`='" . $v . "'";
                            }
                        }
                        $sql2 = "update orders set " . implode("", $sql) . " where id=" . $_POST["id"];
                        $query = $this->db->query($sql2);
                        $res = array('res'=>200,'id'=>$id);
                        echo json_encode($res);
                        return;
                    }

                    $sql1[] = "insert into orders (";
                    $sql2[] = ") values (";
                    foreach($_POST as $k => $v) {
                        if(in_array($k, $keys)) {
                            $sql1[] = "`" . $k . "`,";
                            $sql2[] = "'" . $v . "',";
                        }
                    }
                    $sql1[] = "`create_time`";
                    $sql2[] = "null)";
                    $sql = implode("", $sql1) . implode("", $sql2);
                    $this->load->database('default');
                    $query = $this->db->query($sql);

                    $sql = "select max(id) as mid from orders limit 1";
                    $query = $this->db->query($sql);
                    $cnt = $query->num_rows;
                    if($cnt == 1) {
                        foreach($query->result() as $one) {
                            $res = array('res'=>200,'id'=>$one->mid);
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
