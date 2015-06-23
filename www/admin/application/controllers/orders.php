<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Orders extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database('default');
        $this->load->library('business');
    }

    public function index() {
        $this->business->isLogin(); 
        $this->business->isAuthed("orders"); 

        $results = array();

        $query = $this->business->queryOrders("99");
        $cnt = 0;
        $cnt = $query->num_rows;
        if($cnt >= 1) {
            foreach($query->result() as $one) {
                $data['orders'][] = array(0 => $one->id, 1 => $one->borrowername, 2 => $one->loanamount, 3 => $one->borrowerphone, 4 => $one->create_time, 5 => $one->info, 6 => $one->last_updated_time);
            }
        } else {
            $data['orders'] = array();
        }

        $query = $this->business->queryOrders("1");
        $cnt = 0;
        $cnt = $query->num_rows;
        if($cnt >= 1) {
            foreach($query->result() as $one) {
                $data['orders1'][] = array(0 => $one->id, 1 => $one->borrowername, 2 => $one->loanamount, 3 => $one->borrowerphone, 4 => $one->create_time, 5 => $one->info, 6 => $one->last_updated_time);
            }
        } else {
            $data['orders1'] = array();
        }


        $query = $this->business->queryOrders("2");
        $cnt = 0;
        $cnt = $query->num_rows;
        if($cnt >= 1) {
            foreach($query->result() as $one) {
                $data['orders2'][] = array(0 => $one->id, 1 => $one->borrowername, 2 => $one->loanamount, 3 => $one->borrowerphone, 4 => $one->create_time, 5 => $one->info, 6 => $one->last_updated_time);
            }
        } else {
            $data['orders2'] = array();
        }

        $query = $this->business->queryOrders("3");
        $cnt = 0;
        $cnt = $query->num_rows;
        if($cnt >= 1) {
            foreach($query->result() as $one) {
                $data['orders3'][] = array(0 => $one->id, 1 => $one->borrowername, 2 => $one->loanamount, 3 => $one->borrowerphone, 4 => $one->create_time, 5 => $one->info, 6 => $one->last_updated_time);
            }
        } else {
            $data['orders3'] = array();
        }

        $query = $this->business->queryOrders("4");
        $cnt = 0;
        $cnt = $query->num_rows;
        if($cnt >= 1) {
            foreach($query->result() as $one) {
                $data['orders4'][] = array(0 => $one->id, 1 => $one->borrowername, 2 => $one->loanamount, 3 => $one->borrowerphone, 4 => $one->create_time, 5 => $one->info, 6 => $one->last_updated_time);
            }
        } else {
            $data['orders4'] = array();
        }

        $query = $this->business->queryOrders("5");
        $cnt = 0;
        $cnt = $query->num_rows;
        if($cnt >= 1) {
            foreach($query->result() as $one) {
                $data['orders5'][] = array(0 => $one->id, 1 => $one->borrowername, 2 => $one->loanamount, 3 => $one->borrowerphone, 4 => $one->create_time, 5 => $one->info, 6 => $one->last_updated_time);
            }
        } else {
            $data['orders5'] = array();
        }

        $query = $this->business->queryOrders("6");
        $cnt = 0;
        $cnt = $query->num_rows;
        if($cnt >= 1) {
            foreach($query->result() as $one) {
                $data['orders6'][] = array(0 => $one->id, 1 => $one->borrowername, 2 => $one->loanamount, 3 => $one->borrowerphone, 4 => $one->create_time, 5 => $one->info, 6 => $one->last_updated_time);
            }
        } else {
            $data['orders6'] = array();
        }

        $query = $this->business->queryOrders("7");
        $cnt = 0;
        $cnt = $query->num_rows;
        if($cnt >= 1) {
            foreach($query->result() as $one) {
                $data['orders7'][] = array(0 => $one->id, 1 => $one->borrowername, 2 => $one->loanamount, 3 => $one->borrowerphone, 4 => $one->create_time, 5 => $one->info, 6 => $one->last_updated_time);
            }
        } else {
            $data['orders7'] = array();
        }

        $this->load->view('orders/orders.php', $data);
    }

}
