<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testpost extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_POST) && count($_POST) > 0) {
            if(isset($_POST["name"])) {
                $name = $_POST["name"];
                log_message('error', 'chengherui');
                echo '{res: 200, user: "'.$name.'", method: "post"}';
                return;
            }
        }

                log_message('error', 'chengherui');
        echo '{res: 500, reason: "Wrong param!"}';
    }
}
