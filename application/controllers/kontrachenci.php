<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontrachenci extends CI_Controller {


    function __construct(){

        parent::__construct();


    }



    function edit($id_kontrachenta){



        if($_POST){


            $this->db->where('id_kontrachenta', $_POST['id_kontrachenta']);
            $this->db->update('kontrachenci',$_POST);

            redirect(site_url('kontrachenci/view'));



        }else{

        $this->db->where('id_kontrachenta',$id_kontrachenta);
        $data['kontrachent'] = $this->db->get('kontrachenci')->row();



        $this->load->view('main_view');
        $this->load->view('kontrachenci_edit_view',$data);

        }

    }




    function add(){


        if($_POST){

            $this->db->insert('kontrachenci',$_POST);

            redirect(site_url('kontrachenci/view'));

        }else{


        $this->load->view('main_view');
        $this->load->view('kontrachenci_add_view');
        $this->load->view('footer_view');


        }

   }

    function view(){

    $data['kontrachenci'] = $this->db->get('kontrachenci')->result();


    $this->load->view('main_view');
    $this->load->view('kontrachenci_view',$data);
    $this->load->view('footer_view');

}





    function delete($id_kontrachenta){

/*
            $this->db->where('id_kontrachenta', $id_kontrachenta);
            $this->db->delete('kontrachenci');

            echo("xxx");
            //redirect(site_url('kontrachenci/view'));

*/



    }


}