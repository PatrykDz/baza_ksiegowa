 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transakcje extends CI_Controller {


    function __construct(){

        parent::__construct();

        //$this->load->model("transakcjamodel");
    }


    public function index(){




       // $data['query'] = $this->transakcjamodel->get_last();

        $data['kontrachenci'] = $this->db->get('kontrachenci')->result();
        $data['transakcjex'] = $this->db->get('transakcje')->result();





        $data['transakcje'] = $this->transakcje_model->get_transakcje();





        $this->load->view('transakcje_view',$data);




    }



    function add(){


        if($_POST){


            $this->db->insert('transakcje',$_POST);

            redirect(site_url(''));


        }else{


        $this->load->view('main_view');
        $this->load->view('transakcje_add_view');

        }


    }



}