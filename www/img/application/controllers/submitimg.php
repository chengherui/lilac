<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submitimg extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('file');
    }

    public function index() {

        $originallength = $_SERVER['HTTP_CONTENT_LENGTH'];
        $data = file_get_contents('php://input', 'r');
        if(strlen($data) != $originallength) {
            echo '{res: 500, reason: Data is not write!}';
            return;
        }

        $filename = date("Ymd") . "/" . time() . ".jpg";
        if(!file_exists(date("Ymd"))) {
            mkdir(date("Ymd"));
        }
        write_file($filename, $data, 'w');

        $url = "http://123.57.215.151/img/" . $filename;

        if(!isset($_SERVER['HTTP_OID']) || !isset($_SERVER['HTTP_TYPE']) || !isset($_SERVER['HTTP_DETAIL'])) {
            $res = array('res'=>500, 'reason'=>'Wrong param!');
            echo json_encode($res);
        }
        $id = $_SERVER['HTTP_OID'];
        $type = $_SERVER['HTTP_TYPE'];
        $detail = $_SERVER['HTTP_DETAIL'];
        $remark = "";
        if(isset($_SERVER['HTTP_REMARK'])) {
            $remark =urldecode($_SERVER['HTTP_REMARK']);
        }
	echo $remark;

        $this->load->database('default');
        $sql = "insert into " . $type . " (`id`,`" . $detail . "`,`" . $detail . "info`) values ('" . $id . "','" . $url . "','" . $remark . "') ON DUPLICATE KEY UPDATE " . $detail . "='" . $url . "'," . $detail . "info='" . $remark . "'";
	echo $sql;
        $this->db->query($sql);
        if($type == "comments") {
            $sql = "update orders set status=1 where id='" . $id . "'"; 
            $this->db->query($sql);
        }

        $res = array('res'=>200);
        echo json_encode($res);
    }
}
