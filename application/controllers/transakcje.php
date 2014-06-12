 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transakcje extends CI_Controller {


    function __construct(){

        parent::__construct();

        //$this->load->model("transakcjamodel");
    }


    public function index(){


        echo "Transakcje";


       // $data['query'] = $this->transakcjamodel->get_last();

        $data['kontrachenci'] = $this->db->get('kontrachenci')->result();
        $data['sprzedaze'] = $this->db->get('sprzedaze')->result();





        $this->load->view('transakcje_view',$data);




    }

}