<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.06.14
 * Time: 22:05
 */

class transakcjamodel extends CI_Model{


    function __construct(){

        parent ::__construct();
    }


    function get_last(){

        $query = $this->db->get('kontrachenci');


        return $query->result();

    }



}