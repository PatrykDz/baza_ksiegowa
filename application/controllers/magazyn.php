<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Magazyn extends CI_Controller {

    function __construct(){

        parent::__construct();


    }



    function view(){


        if(!$this->session->userdata('logged_in')){

            redirect('login', 'refresh');
        }


        $data['magazyn'] = $this->db->get('magazyn')->result();


        $this->load->view('main_view');
        $this->load->view('magazyn_view',$data);
        $this->load->view('footer_view');

    }



    function add(){



        if(!$this->session->userdata('logged_in')){

            redirect('login', 'refresh');
        }

        if($_POST){

            $this->db->insert('magazyn',$_POST);

            redirect(site_url('magazyn/view'));

        }else{


            $this->load->view('main_view');
            $this->load->view('magazyn_add_view');
            $this->load->view('footer_view');


        }

    }





    function edit($id_towaru){



        if(!$this->session->userdata('logged_in')){

            redirect('login', 'refresh');
        }

        if($_POST){


            $this->db->where('id_towaru', $_POST['id_towaru']);
            $this->db->update('magazyn',$_POST);

            redirect(site_url('magazyn/view'));



        }else{

            $this->db->where('id_towaru',$id_towaru);
            $data['magazyn'] = $this->db->get('magazyn')->row();



            $this->load->view('main_view');
            $this->load->view('magazyn_edit_view',$data);

        }

    }





    function delete($id_towaru){



        if(!$this->session->userdata('logged_in')){

            redirect('login', 'refresh');
        }



        $this->db->where('id_towaru', $id_towaru);
        $this->db->delete('magazyn');

        //echo($id_transakcji);

        redirect(site_url(''));


    }



}