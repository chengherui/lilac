<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testget extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if(is_array($_GET) && count($_GET) > 0) {
            if(isset($_GET["name"])) {
                $name = $_GET["name"];
                echo '{res: 200, user: "'.$name.'", method: "get"}';
                return;
            }
        }

        echo '{res: 500, reason: "Wrong param!"}';

    }
}
