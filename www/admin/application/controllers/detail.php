<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('business');
    }

    public function index() {
        $this->business->isLogin(); 
        $this->business->isAuthed("detail"); 

        if(is_array($_GET) && count($_GET) > 0) {
            if(isset($_GET["id"])) {
                $this->load->database('default');
                $sql = "select orders.id,pid,sid,create_time,orders.last_updated_time,loanuse,repaysource,avgmonthbill,loanamount,loanmonths,creditoverview,borrowername,borrowerphone,borrowerage,borrowerid,borrowermarrage,borrowersex,borroweraddr,borrowerwork,coborrowername,coborrowerphone,coborrowerage,coborrowerid,coborrowerrelation,coborrowersex,coborroweraddr,guarantorname,guarantorphone,guarantorage,guarantorid,guarantorrelation,guarantorsex,guarantoraddr,nick,info,geoinfo from orders,user,statusinfo where orders.status=statusinfo.status and orders.sid=user.id and orders.id = '" . $_GET['id'] . "'";
                $query = $this->db->query($sql);
                $cnt = 0;
                $cnt = $query->num_rows;

                if($cnt == 1) {
                    foreach($query->result() as $one) {
                        $data['data'] = $one;
                        $data['house'] = null;
                        $data['car'] = null;
                        $data['other'] = null;
                        $data['comment'] = null;
                        $data['verifies'] = null;

                        $sql = "select * from houses where id='" . $_GET['id'] . "'";
                        $query = $this->db->query($sql);
                        $cnt = 0;
                        $cnt = $query->num_rows;
                        if($cnt == 1) {
                            foreach($query->result() as $one) {
                                $data['house'] = $one;
                            }
                        }

                        $sql = "select * from cars where id='" . $_GET['id'] . "'";
                        $query = $this->db->query($sql);
                        $cnt = 0;
                        $cnt = $query->num_rows;
                        if($cnt == 1) {
                            foreach($query->result() as $one) {
                                $data['car'] = $one;
                            }
                        }

                        $sql = "select * from others where id='" . $_GET['id'] . "'";
                        $query = $this->db->query($sql);
                        $cnt = 0;
                        $cnt = $query->num_rows;
                        if($cnt == 1) {
                            foreach($query->result() as $one) {
                                $data['other'] = $one;
                            }
                        }

                        $sql = "select * from comments where id='" . $_GET['id'] . "'";
                        $query = $this->db->query($sql);
                        $cnt = 0;
                        $cnt = $query->num_rows;
                        if($cnt == 1) {
                            foreach($query->result() as $one) {
                                $data['comment'] = $one;
                            }
                        }

                        $sql = "select * from news where oid='" . $_GET['id'] . "' order by create_time desc";
                        $query = $this->db->query($sql);
                        $cnt = 0;
                        $cnt = $query->num_rows;
                        if($cnt >= 1) {
                            $data['verifies'] = $query->result();
                        }

                        $this->load->view('/detail.php', $data);
                    }
                }
            }
        }
    }

}
