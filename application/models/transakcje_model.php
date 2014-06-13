<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transakcje_model extends CI_Model {


    function __construct()
    {
    // Call the Model constructor
    parent::__construct();
    }


    public function get_transakcje(){


/*
        $this->db->select('
                        transakcje.id_transakcji,
                        transakcje.nazwa_transakcji,
                        transakcje.opis_transakcji,
                        transakcje.zakup_netto,
                        transakcje.zakup_brutto,
                        transakcje.data_zakupu,
                        transakcje.sprzedaz_netto,
                        transakcje.sprzedaz_brutto,
                        transakcje.data_sprzedazy,
                        transakcje.koszty_allegro,
                        transakcje.koszty_inne,
                        transakcje.kontrachenci_id_kontrachenta

                        kontrachenci.id_kontrachenta,
                        kontrachenci.imie,
                        kontrachenci.nazwisko,
                        kontrachenci.email,
                        kontrachenci.nr_tel,
                        kontrachenci.adres

        ');

        */

        $this->db->from('transakcje');
        $this->db->join('kontrachenci', 'transakcje.kontrachenci_id_kontrachenta = kontrachenci.id_kontrachenta');

        $query = $this->db->get();


        return $query->result();



        }







}

   ?>