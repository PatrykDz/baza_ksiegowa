<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index(){

        echo "test And this fucking works";




        $this->load->model('transakcjamodel');

        $this->transakcjamodel->get_last();




    }


}