<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {


    function __construct(){

        parent::__construct();


        //$this->load->model("transakcjamodel");
    }




    public function index(){


        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            //$data['username'] = $session_data['username'];




            $data['kontrachenci'] = $this->db->get('kontrachenci')->result();
            $data['transakcjex'] = $this->db->get('transakcje')->result();



            $data['transakcje'] = $this->transakcje_model->get_transakcje();



            $data['current_view']="transakcje_view";


            $this->load->view('main_view');
            $this->load->view('transakcje_view',$data);
            $this->load->view('footer_view');

        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }


    }







}