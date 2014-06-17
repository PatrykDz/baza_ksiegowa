<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include "PHPExcel.php";
include 'PHPExcel/Writer/Excel2007.php';

class Statystyki extends CI_Controller {

    function __construct(){

        parent::__construct();


    }


     function view(){


         if(!$this->session->userdata('logged_in')){

             redirect('login', 'refresh');
         }



         $data['transakcje'] = $this->transakcje_model->get_transakcje();

        $this->load->view('main_view');
        $this->load->view('statystyki_view',$data);



    }



    function excel_view($path){


        if(!$this->session->userdata('logged_in')){

            redirect('login', 'refresh');
        }

        $this->load->view('main_view');
        $this->load->view('statystyki_view');



        redirect(base_url('raporty/'.$path));

    }









    function excel_export(){


        if(!$this->session->userdata('logged_in')){

            redirect('login', 'refresh');
        }




        $data['kontrachenci'] = $this->db->get('kontrachenci')->result();
        $data['transakcje'] = $this->transakcje_model->get_transakcje();
        $data['magazyn'] = $this->db->get('magazyn')->result();




        $data['transakcje'] = array_reverse($data['transakcje']);


        // Create new PHPExcel object

        $row_counter = 1;


        $objPHPExcel = new PHPExcel();

        // Set properties

        $objPHPExcel->getProperties()->setCreator("Soma System Baza Księgowa");
        $objPHPExcel->getProperties()->setLastModifiedBy("Soma System");
        $objPHPExcel->getProperties()->setTitle("Soma System - ".date('j-n-Y'));
        $objPHPExcel->getProperties()->setSubject("Raport ".date('j-n-Y'));
        $objPHPExcel->getProperties()->setDescription("Raport transakcji, kontrachentów, i magazynu z dnia ".date('j-n-Y'));


        // Transakcje

        $objPHPExcel->setActiveSheetIndex(0);




        $objPHPExcel->getActiveSheet()->getStyle('A1:M1')->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFE8E5E5');

        $objPHPExcel->getActiveSheet()->getStyle('A1:M1')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);


        foreach(range('A','M') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }



        $objPHPExcel->getActiveSheet()->SetCellValue('A1',"ID");
        $objPHPExcel->getActiveSheet()->SetCellValue('B1',"Nazwa transakcji");
        $objPHPExcel->getActiveSheet()->SetCellValue('C1',"Opis");
        $objPHPExcel->getActiveSheet()->SetCellValue('D1',"Zakup netto");
        $objPHPExcel->getActiveSheet()->SetCellValue('E1',"Zakup brutto");
        $objPHPExcel->getActiveSheet()->SetCellValue('F1',"Data zakupu");
        $objPHPExcel->getActiveSheet()->SetCellValue('G1',"Sprzedaż netto");
        $objPHPExcel->getActiveSheet()->SetCellValue('H1',"Sprzedaż brutto");
        $objPHPExcel->getActiveSheet()->SetCellValue('I1',"Data sprzedaży");
        $objPHPExcel->getActiveSheet()->SetCellValue('J1',"Koszty allegro");
        $objPHPExcel->getActiveSheet()->SetCellValue('K1',"Koszty inne");
        $objPHPExcel->getActiveSheet()->SetCellValue('L1',"Klient");
        $objPHPExcel->getActiveSheet()->SetCellValue('M1',"Zysk");


    foreach($data['transakcje'] as $row) {

$row_counter++;

    //Obliczanie zysku
    $zyskstrata_raw=$row->sprzedaz_netto - $row->zakup_netto - $row->koszty_allegro - $row->koszty_inne;


    if($zyskstrata_raw<0){
        $zyskstrata=$zyskstrata_raw;
    }else{
        $zyskstrata=$zyskstrata_raw;
    }
/*
    if($zyskstrata_raw<0){
        $zyskstrata="<td class='danger'><strong><font color='red'>$zyskstrata_raw</font></strong></td>";
    }else{
        $zyskstrata="<td class='success'><strong><font color='green'>$zyskstrata_raw</font></strong></td>";
    }

*/


        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row_counter, $row->id_transakcji);
        $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row_counter, $row->nazwa_transakcji);
        $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row_counter, $row->opis_transakcji);
        $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row_counter, $row->zakup_netto);
        $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row_counter, $row->zakup_brutto);
        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row_counter, $row->data_zakupu);
        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row_counter, $row->sprzedaz_netto);
        $objPHPExcel->getActiveSheet()->SetCellValue('H'.$row_counter, $row->sprzedaz_brutto);
        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$row_counter, $row->data_sprzedazy);
        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$row_counter, $row->koszty_allegro);
        $objPHPExcel->getActiveSheet()->SetCellValue('K'.$row_counter, $row->koszty_inne);
        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$row_counter, $row->imie." ".$row->nazwisko);
        $objPHPExcel->getActiveSheet()->SetCellValue('M'.$row_counter, $zyskstrata);











 }







        // Rename sheet

        $objPHPExcel->getActiveSheet()->setTitle('Transakcje');





        //Kontrachenci


        $objPHPExcel->createSheet(NULL, 1);
        $objPHPExcel->setActiveSheetIndex(1);





        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFE8E5E5');

        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);


        foreach(range('A','F') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }



        $objPHPExcel->getActiveSheet()->SetCellValue('A1',"ID");
        $objPHPExcel->getActiveSheet()->SetCellValue('B1',"Imię");
        $objPHPExcel->getActiveSheet()->SetCellValue('C1',"Nazwisko");
        $objPHPExcel->getActiveSheet()->SetCellValue('D1',"E-Mail");
        $objPHPExcel->getActiveSheet()->SetCellValue('E1',"Nr tel");
        $objPHPExcel->getActiveSheet()->SetCellValue('F1',"Adres");


        $row_counter=1;

        foreach($data['kontrachenci'] as $row) {

            $row_counter++;


            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row_counter, $row->id_kontrachenta);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row_counter, $row->imie);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row_counter, $row->nazwisko);
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row_counter, $row->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row_counter, $row->nr_tel);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row_counter, $row->adres);

        }



        $objPHPExcel->getActiveSheet()->setTitle('Kontrachenci');




        //Magazyn


        $objPHPExcel->createSheet(NULL, 2);
        $objPHPExcel->setActiveSheetIndex(2);



        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFE8E5E5');

        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THICK);


        foreach(range('A','C') as $columnID) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }



        $objPHPExcel->getActiveSheet()->SetCellValue('A1',"ID");
        $objPHPExcel->getActiveSheet()->SetCellValue('B1',"Nazwa");
        $objPHPExcel->getActiveSheet()->SetCellValue('C1',"Cena netto");



        $row_counter=1;

        foreach($data['magazyn'] as $row) {

            $row_counter++;


            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row_counter, $row->id_towaru);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row_counter, $row->nazwa);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row_counter, $row->cena_netto);


        }


        $objPHPExcel->getActiveSheet()->setTitle('Magazyn');














        // Save Excel 2003 file

        $filename = date('j-n-Y').'.xls';

        $objWriter        = new PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter->save('raporty/'.$filename);






        redirect(site_url('/statystyki/excel_view').'/'.$filename);


    }



}